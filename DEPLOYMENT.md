# SFTP deployment

The `Deploy themes via SFTP` workflow uploads tracked `themes/` files on pushes
to `main` that change themes or deployment code. It also supports manual runs
from GitHub's **Actions** tab (select `main`). PHP syntax is checked first.

## GitHub setup

1. Open this repository's **Settings → Environments** and create `production`.
2. Add the following **Environment secrets** to `production`:

   | Secret | Value |
   | --- | --- |
   | `SFTP_HOST` | Hostname only, such as `sftp.example.com` |
   | `SFTP_PORT` | Optional; defaults to `22` |
   | `SFTP_USERNAME` | Hosting account's SFTP username |
   | `SFTP_PASSWORD` | Hosting account's SFTP password |
   | `SFTP_REMOTE_PATH` | Existing absolute path to **wp-content**, as visible in SFTP, such as `/public_html/wp-content` |
   | `SFTP_KNOWN_HOSTS` | Verified OpenSSH known_hosts entry for the server (see below) |

3. Commit and push the workflow, deployment script, and desired theme changes
   to `main`. This starts deployment automatically. To retry after configuring
   secrets, use **Actions → Deploy themes via SFTP → Run workflow**.

The mapping is `themes/wp-bootstrap-starter/...` →
`SFTP_REMOTE_PATH/themes/wp-bootstrap-starter/...`. Do not set the remote path
to the theme directory itself. For jailed SFTP accounts, use the path shown by
your SFTP client, which may differ from the hosting control panel's path.

## Server host key

Ask the host for its SSH host key or verify a scanned key's fingerprint against
the fingerprint supplied by the host through its control panel or support.
For example, on your own computer:

```sh
ssh-keyscan -p 22 sftp.example.com > sftp-known-hosts
ssh-keygen -lf sftp-known-hosts
```

After verifying the fingerprint, copy the contents of `sftp-known-hosts` into
`SFTP_KNOWN_HOSTS`. Use the actual host and port; nonstandard ports use
`[hostname]:port` in known_hosts entries. The workflow rejects unknown or changed
host keys. Never commit the password to the repository.

## Deployment behavior

- Uploads all tracked theme files each time and overwrites matching remote files.
- Does not delete remote files. Remove obsolete files manually when necessary.
- Does not upload plugins, uploads, WordPress core, database content, or secrets.
- Serializes deployments so uploads do not overlap.
- Uploads files in place; a deployment is not atomic and a failed run may have
  uploaded some files. Fix the reported error and rerun to finish the upload.
- Requires SFTP access only, with write access to the destination; no remote
  shell access is required. Hosting firewalls must allow the GitHub runner.

Reference: [GitHub environment configuration](https://docs.github.com/en/actions/how-tos/deploy/configure-and-manage-deployments/manage-environments).
