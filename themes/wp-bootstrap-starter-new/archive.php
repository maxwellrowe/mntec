<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

	<section id="primary" class="content-area col-sm-12 col-lg-12 px-4">
		<div id="main" class="site-main" role="main">
		<?php if(is_tax('jate')) { ?>
			<div class="container pb-4">
				<div class="pb-4 mb-4 border-bottom">
					<img src="https://micronanoeducation.org/wp-content/uploads/2022/01/JATE_Logo.png" alt="Journal of Advanced Technology Education" />
				</div>
				<div class="list-group posts-list-group events-list-group journal-list-group">
		<?php } ?>
		<?php
		if ( have_posts() ) : ?>
		
			

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
			
				if(is_tax('audience') || is_tax('resource_category') || is_tax('resource_type') || is_tax('grade_level')) {
					if ($counter % 4 == 0) :
						echo $counter > 0 ? "</div>" : ""; // close div if it's not the first
						echo "<div class='row pt-4'>";
					endif ?>
					<?php get_template_part( 'template-parts/resource', 'card' ); ?>
					<?php $counter++; ?>
				<?php } else if(is_tax('jate')) { ?>
				
					<?php get_template_part( 'template-parts/journal', 'archive'); ?>
				
				<?php } else {
					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
				}

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
		
		<?php if(is_tax('jate')) { ?>
				</div>
			</div>
		<?php } ?>

		</div><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
