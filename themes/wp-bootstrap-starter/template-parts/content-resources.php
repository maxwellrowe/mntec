<?php
/**
 * Template part for displaying resources
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		
		<?php // Get the Resources by Custom Field
			$posts_per_page = -1;
			$order_of_posts = 'DESC';
			$order_posts_by = 'date';
			// args
			$args = array(
				'posts_per_page'	=> $posts_per_page,
				'post_type'			=> 'resource',
				'orderby'			=> $order_posts_by,
				'order'				=> $order_of_posts,
			);
			
			$the_query = new WP_Query( $args );
		?>
		
		<?php
			if( $the_query->have_posts() ):
			$counter = 0;
			while( $the_query->have_posts() ) : $the_query->the_post();
				if ($counter % 4 == 0) :
					echo $counter > 0 ? "</div>" : ""; // close div if it's not the first
					echo "<div class='row pt-4'>";
				endif
		?>
				
				<?php get_template_part( 'template-parts/resource', 'card' ); ?>
				<?php $counter++; ?>
				
			<?php endwhile; ?>
			
		<?php endif; ?>
				
		<?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>
		
		
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wp-bootstrap-starter' ),
				'after'  => '</div>',
			) );
		?>
		
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'wp-bootstrap-starter' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->