<?php 
// ACF Options Page
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Site Options',
		'menu_title'	=> 'Site Options',
		'menu_slug' 	=> 'site-options',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

// Gravity Forms Button add Bootstrap Class
add_filter("gform_submit_button", "form_submit_button", 10, 2);
function form_submit_button($button, $form){
    return "<button class='button btn btn-secondary' id='gform_submit_button_{$form["id"]}'><span>Submit</span></button>";
}

// Add Body Class if section heading visible or certain type of post
add_filter( 'body_class','mntec_body_classes' );
function mntec_body_classes($classes) {
	if(is_page()) {
		if(!get_field('hide_section_title')) {
			// Get the TOP parent page ID
			global $post;
			if ($post->post_parent)	{
				$ancestors=get_post_ancestors($post->ID);
				$root=count($ancestors)-1;
				$parent = $ancestors[$root];
			} else {
				$parent = $post->ID;
			}
			// Check if has sub navigation for page or top parent page
			if(get_field('select_sub_navigation', $parent)) {
				$classes[] = 'section-heading-visible';
			} elseif (get_field('select_sub_navigation')) {
				$classes[] = 'section-heading-visible';
			}
		}
	}
	if(is_singular('resource') || is_singular('this-week-in-small') || is_singular('post') || is_singular('poster') || is_singular('tribe_events') || is_singular('journal') || is_tax('issue')) {
		$classes[] = 'section-heading-visible';
	}
	
	// Return any body classes
	return $classes;
}

// Set up Image Sizes
function mntec_setup_theme() {
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'card', 600, 450, true );
	add_image_size( 'resource_feat', 700, 400, true );
	add_image_size( 'partner_feat_small', 150, 75, false);
	add_image_size( 'partner_feat', 300, 300, false);
	add_image_size( 'partner_feat_large', 700, 300, false);
	add_image_size( 'newsletter_feed', 100, 100, true);
}
add_action( 'after_setup_theme', 'mntec_setup_theme' );

/*
 * This changes the event link to the event website URL if that is set.
 * NOTE: Comment out the add_filter() line to disable this function.
 */
function tribe_set_link_website ( $link, $post_id ) {
	$website_url = tribe_get_event_website_url( $postId );
	// Only swaps link if set
	if ( !empty( $website_url ) ) {
		$link = $website_url;
	}
	return $link;
}
add_filter( 'tribe_get_event_link', 'tribe_set_link_website', 10, 2 );

// Exclude Events post type from permalink rewrite
add_filter(  'cptp_is_rewrite_supported', function ( $support , $post_type ) {
	if ( 'tribe_events' === $post_type ) {
		return false;
	}
	return $support;
}, 10, 2);

// Query Media
function query_media() {

	$media_args = array (
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'post_status'    => 'inherit',
		'posts_per_page' => -1,
		'orderby' => 'title',
		'order' => 'ASC',
	);
	ob_start();
		
		$media_query = new WP_Query ( $media_args );
		if ( $media_query->have_posts() ) : 
			?>
			<div class="table-responsive">
				<table id="mediatable" class="table table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th>Image</th>
							<th>URL</th>
							<th>Title</th>
							<th>Alt Text</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					while($media_query->have_posts()) : $media_query->the_post();
					?>
						<?php // vars
							$image = wp_get_attachment_image_src($post->ID, 'thumbnail');
							$id = get_the_ID();
							$alt = get_post_meta($id, '_wp_attachment_image_alt', TRUE);
							$post_meta = get_post_meta($id);
						?>
						<tr>
							<td><?php echo $id; ?></td>
							<td>
								<a href="<?php echo wp_get_attachment_url($post->ID); ?>" target="_blank">
									<img src="<?php echo $image[0] ?>" alt="" />
								</a>
							</td>
							<td><?php echo wp_get_attachment_url($post->ID); ?></td>
							<td><?php the_title(); ?></td>
							<td>
								<?php echo $alt; ?>
							</td>
						</tr>
					<?php
					endwhile;
					?>
					</tbody>
				</table>
			</div>
		<?php
		endif;
		
	$all_media = ob_get_clean();
	return $all_media;
}
add_shortcode('all_media', 'query_media');