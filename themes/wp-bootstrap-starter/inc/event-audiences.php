<?php
/**
 * Shared audience labels for The Events Calendar views.
 */

function mntec_event_audiences_html( $event_id ) {
    $terms = get_the_terms( $event_id, 'audience' );
    if ( empty( $terms ) || is_wp_error( $terms ) ) {
        return '';
    }

    $html = '<div class="mntec-event-audiences" role="group" aria-label="' . esc_attr__( 'Event audiences', 'wp-bootstrap-starter' ) . '">';
    foreach ( $terms as $term ) {
        $color = function_exists( 'get_field' ) ? get_field( 'color', 'term_' . $term->term_id ) : '';
        $link = function_exists( 'get_field' ) ? get_field( 'audience_landing_page', 'term_' . $term->term_id ) : '';
        $color = is_string( $color ) ? sanitize_hex_color( $color ) : '';
        // Support both ACF URL and Link field return formats.
        $link = is_array( $link ) && isset( $link['url'] ) ? $link['url'] : $link;
        $url = is_string( $link ) ? esc_url( $link ) : '';
        $label = '<span class="mntec-event-audience__dot" aria-hidden="true"' . ( $color ? ' style="background-color: ' . esc_attr( $color ) . ';"' : '' ) . '></span>';
        $label .= '<span>' . esc_html( $term->name ) . '</span>';
        $html .= $url
            ? '<a class="mntec-event-audience" href="' . $url . '">' . $label . '</a>'
            : '<span class="mntec-event-audience">' . $label . '</span>';
    }

    return $html . '</div>';
}

/**
 * Render inside each list event, including shortcode and AJAX-loaded results.
 */
function mntec_list_event_audiences( $html, $file, $name, $template ) {
    $event = $template->get( 'event' );
    if ( is_object( $event ) && ! empty( $event->ID ) ) {
        $html .= mntec_event_audiences_html( $event->ID );
    }
    return $html;
}
add_filter( 'tribe_template_after_include_html:events/v2/list/event/title', 'mntec_list_event_audiences', 10, 4 );
