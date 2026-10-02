<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

$result_type = get_post_type_object( get_post_type() );
$result_title = get_the_title();
$result_excerpt = wp_trim_words( wp_strip_all_tags( strip_shortcodes( get_the_excerpt() ) ), 35, '…' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'search-result' ); ?>>
	<header class="entry-header">
		<div class="search-result-meta">
			<?php if ( $result_type ) : ?>
				<span class="search-result-type"><?php echo esc_html( $result_type->labels->singular_name ); ?></span>
			<?php endif; ?>
			<?php if ( 'post' === get_post_type() ) : ?>
				<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
			<?php endif; ?>
		</div>
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo esc_html( $result_title ? $result_title : __( 'Untitled', 'wp-bootstrap-starter' ) ); ?></a></h2>
	</header><!-- .entry-header -->

	<?php if ( $result_excerpt ) : ?>
		<div class="entry-summary"><p><?php echo esc_html( $result_excerpt ); ?></p></div>
	<?php endif; ?>
</article><!-- #post-## -->
