<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

	<div class="container">
		<div class="row">
			<section id="primary" class="content-area col-sm-12 col-lg-12 p-3 px-lg-0">
				<div id="main" class="site-main" role="main">
					<div class="mb-4">
						<?php get_search_form(); ?>
					</div>
		
				<?php
				if ( have_posts() ) : ?>
					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();
		
						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'template-parts/content', 'search' );
		
					endwhile;
		
					the_posts_navigation();
		
				else :
		
					get_template_part( 'template-parts/content', 'none' );
		
				endif; ?>
		
				</div><!-- #main -->
			</section><!-- #primary -->
		</div>
	</div>

<?php
get_footer();
