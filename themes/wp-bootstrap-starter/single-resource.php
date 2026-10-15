<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

	<section id="primary" class="content-area col-sm-12">
		<div id="main" class="site-main" role="main">
			
		<?php
		while ( have_posts() ) : the_post(); ?>
		
			<div class="container ml-0">
				<div class="row">
					<div class="col-sm-3">
						<?php if ( has_post_thumbnail() ) { ?>
							<?php the_post_thumbnail('resource_feat', ['class' => 'mb-4']); ?>
						<?php } ?>
						<?php if( have_rows('resource_files') ): ?>
							<h2 class="h5">Resource Files &amp; Links</h2>
							<div class="list-group rounded-0">
								<?php while( have_rows('resource_files') ) : the_row(); ?>
									<li class="list-group-item">
										<?php if(get_sub_field('file_upload')) { ?>
											<a href="<?php the_sub_field('file_upload'); ?>" target="_blank"><span class="fal fa-download"></span> <strong><?php the_sub_field('file_name'); ?></strong></a>
										<?php } else { ?>
											<a href="<?php the_sub_field('link_to_external_file'); ?>" target="_blank"><span class="fal fa-link"></span> <strong><?php the_sub_field('file_name'); ?></strong></a>
										<?php } ?>
									</li>
								<?php endwhile; ?>
							</div>
						<?php else :
							// Nothing!
							endif;
						?>
						
						<div class="card-light">
							<div class="card-body">
								<?php the_date('m/d/Y'); ?>
							</div>
						</div>
					</div>
					<div class="col-sm-9">
						<div class="lead"><?php the_field('resource_introduction_and_summary'); ?></div>
						
						<?php // If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif; ?>
					</div>
				</div>
			</div>
			
			
			<?php the_post_navigation(); ?>

		<?php 
		endwhile; // End of the loop.
		?>
		
			<hr class="border-dark my-4">
			
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h2>Related Resources</h2>
					</div>
				</div>
			</div>

		</div><!-- #main -->
	</section><!-- #primary -->
		
	

<?php
get_footer();
