<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label class="search-form-label">
        <span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'wp-bootstrap-starter' ); ?></span>
        <input type="search" class="search-field form-control" placeholder="<?php echo esc_attr_x( 'Search the site…', 'placeholder', 'wp-bootstrap-starter' ); ?>" value="<?php echo get_search_query(); ?>" name="s">
    </label>
    <input type="submit" class="search-submit btn btn-primary" value="<?php echo esc_attr_x( 'Search', 'submit button', 'wp-bootstrap-starter' ); ?>">
</form>
