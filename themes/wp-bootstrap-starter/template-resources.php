<?php
/**
* Template Name: Resources Template
 */

get_header(); ?>

	<section id="primary" class="content-area col-sm-12 col-lg-12 <?php if(get_field('page_padding_margin')) { ?>px-4<?php } else { ?>p-0<?php } ?>">
		<div id="main" class="site-main" role="main">
			<div class="row">
				<div class="col-sm-12 col-md-4">
					<?php // Ajax Search Implementation
						echo do_shortcode('[wd_asp id=1]');
					?>
				</div>
			</div>

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'resources' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
		</div><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();