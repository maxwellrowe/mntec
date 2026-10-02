"""Upload tracked themes to an existing remote wp-content directory over SFTP."""

import os
from pathlib import Path
import posixpath
import stat
import subprocess
import tempfile

import paramiko


def main():
    required = (
        "SFTP_HOST", "SFTP_USERNAME", "SFTP_PASSWORD",
        "SFTP_REMOTE_PATH", "SFTP_KNOWN_HOSTS",
    )
    missing = [name for name in required if not os.environ.get(name)]
    if missing:
        raise SystemExit("Missing GitHub secrets: " + ", ".join(missing))

    port = int(os.environ.get("SFTP_PORT") or "22")
    remote_root = os.environ["SFTP_REMOTE_PATH"]
    if not remote_root.startswith("/") or posixpath.normpath(remote_root) == "/":
        raise SystemExit("SFTP_REMOTE_PATH must be an absolute path to wp-content, not /.")

    files = subprocess.check_output(["git", "ls-files", "-z", "--", "themes/"])
    paths = [Path(os.fsdecode(name)) for name in files.split(b"\0") if name]
    if not paths or any(path.is_symlink() or not path.is_file() for path in paths):
        raise SystemExit("Expected regular tracked theme files; missing files and symlinks are unsupported.")

    with tempfile.TemporaryDirectory() as temporary, paramiko.SSHClient() as client:
        known_hosts = Path(temporary) / "known_hosts"
        known_hosts.write_text(os.environ["SFTP_KNOWN_HOSTS"] + "\n")
        client.load_host_keys(str(known_hosts))
        client.set_missing_host_key_policy(paramiko.RejectPolicy())
        client.connect(
            hostname=os.environ["SFTP_HOST"], port=port,
            username=os.environ["SFTP_USERNAME"], password=os.environ["SFTP_PASSWORD"],
            look_for_keys=False, allow_agent=False,
            timeout=30, banner_timeout=30, auth_timeout=30,
        )
        with client.open_sftp() as sftp:
            sftp.get_channel().settimeout(60)
            sftp.chdir(remote_root)  # Fail if the configured destination does not exist.
            directories = set()
            for path in paths:
                for parent in reversed(path.parents):
                    directory = parent.as_posix()
                    if directory == "." or directory in directories:
                        continue
                    try:
                        attributes = sftp.stat(directory)
                    except FileNotFoundError:
                        sftp.mkdir(directory)
                    else:
                        if not stat.S_ISDIR(attributes.st_mode):
                            raise RuntimeError(f"Remote destination is not a directory: {directory}")
                    directories.add(directory)
                sftp.put(str(path), path.as_posix(), confirm=True)
                print(f"Uploaded {path}")
    print(f"Deployment complete: {len(paths)} theme files uploaded.")


if __name__ == "__main__":
    main()
