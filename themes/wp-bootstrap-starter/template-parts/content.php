<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( is_singular(array( 'post', 'grant', 'scholarship', 'this-week-in-small', 'research-opportunity', 'journal', 'poster', 'opportunity' )) ) { ?>
		<div class="single-post-title">
			<h1><?php the_title(); ?></h1>
		</div>
	<?php } ?>
	<?php if( is_singular(array('opportunity'))) { ?>
	<?php
		// vars for terms assigned to post
		$types = get_the_terms(get_the_ID(), 'opportunity_type'); 
		$statuses = get_the_terms(get_the_ID(), 'opportunity_status');
		
	?>
		<div class="inter-schol-single-details d-flex justify-content-start align-items-center border-top border-bottom py-3 mb-4">
			<?php if($types) { ?>
				<div class="inter-schol-labels mr-3">
					<?php foreach($types as $type) { ?>
						<span class="badge badge-light"><?php echo esc_html($type->name); ?></span>
					<?php } ?>
				</div>
			<?php } ?>
			<?php if($statuses) { ?>
				<div class="inter-school-status d-flex align-items-center justify-content-start mr-3">
					<?php foreach($statuses as $status) { ?>
						<?php if($status->name) { ?>
							<span class="inter-school-status-color <?php echo esc_html($status->slug); ?>"></span>
							<span><?php echo esc_html($status->name); ?></span>
						<?php } ?>
					<?php } ?>
				</div>
			<?php } ?>	
			<div class="inter-school-updated mb-0">
				<?php
					if (get_the_modified_time() != get_the_time()) {
						echo 'Updated ' . get_the_modified_time('m/j/Y');
					} else { 
						echo 'Published ' . get_the_time('m/j/Y');
					}
				?>
			</div>
		</div>
	<?php } ?>
	<header class="entry-header">
		<?php
		if ( is_single() ) :
			
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( is_singular(array( 'post', 'grant', 'scholarship', 'research-opportunity', 'this-week-in-small', 'poster' )) ) { ?>
			<div class="mntec-section-title mntec-section-title-font-size-small mntec-section-title-size-full-width text-left text-left mntec-section-title-post-meta">
				<span style="display:block; position: relative; color: #24292e; z-index: 2;"><span style="background-color: #ffffff; padding-right: .3rem;">
					<?php $audience_terms = get_the_terms($post->ID,'audience'); ?>
					<?php 
						if(!empty($audience_terms)) {
							foreach($audience_terms as $audience_term) {
								$audience_term_id = $audience_term->term_id;
								$audience_term_name = $audience_term->name;
								$audience_color = get_field('color','term_' . $audience_term_id); 
								$audience_link = get_field('audience_landing_page','term_' . $audience_term_id); ?>
								<a href="<?php echo $audience_link ?>" class="event-card-audience-color" data-toggle="tooltip" data-placement="top" title="<?php echo $audience_term_name ?>" style="background-color: <?php echo $audience_color ?>;"><span class="sr-only"><?php echo $audience_term_name ?></span></a>
							<?php }
						}
					?>
					<?php if (is_singular('poster')) { ?>
						<?php if(get_field('poster_author')) { ?>
							<span class="mr-2">By: <?php the_field('poster_author'); ?></span>
						<?php } ?>
						<?php if(get_field('poster_pdf')) { ?>
							<a href="<?php the_field('poster_pdf'); ?>" class="font-weight-bold">Download PDF</a>
						<?php } ?>
					<?php }  else { ?>
						<?php wp_bootstrap_starter_posted_on(); ?>
					<?php } ?>
				</span></span>
				<span class="mntec-section-title-border" style="border-color: #071711"></span>
			</div>
		<?php } ?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php if ( is_singular('poster')) { ?>
			<a href="#" data-toggle="modal" data-target="#mntec-poster-modal">
				<?php the_post_thumbnail('large'); ?>
			</a>
			<div class="modal fade" id="mntec-poster-modal" tabindex="-1" role="dialog" aria-labelledby="mntec-post-modal-title" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-lg" style="max-width: 90%;" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h2 class="modal-title h5 sr-only" id="mntec-post-modal-title"><?php the_title(); ?></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<?php the_post_thumbnail('full'); ?>
						</div>
					</div>
				</div>
			</div>
			<?php if(get_field('poster_abstract')) { ?>
				<div class="mt-4 py-4 border-top">
					<?php the_field('poster_abstract'); ?>
				</div>
			<?php } ?>
		<?php } ?>
		<?php
        if ( is_single() ) :
			the_content();
			
        else :
            the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'wp-bootstrap-starter' ) );
        endif;

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wp-bootstrap-starter' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php if(get_field('newsletter_link')) { ?>
		<div class="text-center">
			<a href="<?php the_field('newsletter_link'); ?>" class="btn btn-primary" target="_blank">View Newsletter</a>
		
			<iframe src="<?php the_field('newsletter_link'); ?>" name="newsletter" scrolling="Yes" height="800px" width="100%" class="my-4" style="border: none;"></iframe>
		</div>
	<?php } ?>
	<footer class="entry-footer pt-3">
		<?php wp_bootstrap_starter_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
