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
	<?php if ( is_singular(array( 'post', 'grant', 'scholarship', 'research-opportunity', 'journal' )) ) { ?>
		<div class="single-post-title">
			<h1><?php the_title(); ?></h1>
		</div>
	<?php } ?>
	<header class="entry-header">
		<?php
		if ( is_single() ) :

		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( get_field('pdf') || get_field('pdf_as_url')) { ?>
			<div class="mntec-section-title mntec-section-title-font-size-small mntec-section-title-size-full-width text-left text-left mntec-section-title-post-meta">
				<span style="display:block; position: relative; color: #24292e; z-index: 2;"><span style="background-color: #ffffff; padding-right: .3rem;">
					<?php if(get_field('pdf_as_url')) { ?>
						<?php $pdf_url = get_field('pdf_as_url'); ?>
						<a href="<?php echo $pdf_url; ?>" class="btn btn-primary" target="_blank">Download PDF</a>
					<?php } else { ?>
						<a href="<?php the_field('pdf'); ?>" class="btn btn-primary" target="_blank">Download PDF</a>
					<?php } ?>
				</span></span>
				<span class="mntec-section-title-border" style="border-color: #071711"></span>
			</div>
		<?php } ?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php if(get_field('authors')) { ?>
			<div class="journal-authors">
				<?php if( have_rows('authors') ):
					while( have_rows('authors') ) : the_row(); ?>

						<p>
							<span class="text-uppercase"><?php the_sub_field('author_name'); ?></span>
							<?php if(get_sub_field('author_institution')) { ?><br /><small><em><?php the_sub_field('author_institution'); ?></em></small><?php } ?>
							<?php if(get_sub_field('author_email_address')) { ?><br /><small><a href="mailto:<?php the_sub_field('author_email_address'); ?>"><?php the_sub_field('author_email_address'); ?></a></small><?php } ?>
						</p>

					<?php endwhile;
				else :
				endif;
				?>
			</div>
		<?php } ?>
		<?php if(get_field('abstract')) { ?>
			<div class="journal-abstract border-top border-bottom my-4 py-2">
				<h2>Abstract</h2>
				<?php the_field('abstract'); ?>
			</div>
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
		<?php if(get_field('references')) { ?>
			<div class="journal-references pt-4 mt-4 border-top">
				<?php the_field('references'); ?>
			</div>
		<?php } ?>

		<?php if(get_field('doi_number')) { ?>
			<div class="journal-doi-number border-top pt-3">
				DOI: <a href="<?php the_field('doi_url'); ?>" target="_blank"><strong><?php the_field('doi_number'); ?></strong></a>
			</div>
		<?php } ?>
	</div><!-- .entry-content -->
	<?php if(get_field('newsletter_link')) { ?>
		<div class="text-center">
			<a href="<?php the_field('newsletter_link'); ?>" class="btn btn-primary" target="_blank">View Newsletter</a>

			<iframe src="<?php the_field('newsletter_link'); ?>" name="newsletter" scrolling="Yes" height="800px" width="100%" class="my-4" style="border: none;"></iframe>
		</div>
	<?php } ?>
	<footer class="entry-footer">
		<?php wp_bootstrap_starter_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
