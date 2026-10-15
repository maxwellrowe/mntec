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
				<div id="main" class="site-main search-results-content" role="main">
					<header class="search-results-header">
						<h1><?php esc_html_e( 'Search results', 'wp-bootstrap-starter' ); ?></h1>
						<p class="search-results-count">
							<?php
							global $wp_query;
							printf(
								/* translators: 1: number of results, 2: search query. */
								esc_html( _n( '%1$s result for “%2$s”', '%1$s results for “%2$s”', $wp_query->found_posts, 'wp-bootstrap-starter' ) ),
								esc_html( number_format_i18n( $wp_query->found_posts ) ),
								esc_html( get_search_query( false ) )
							);
							?>
						</p>
					</header>
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
