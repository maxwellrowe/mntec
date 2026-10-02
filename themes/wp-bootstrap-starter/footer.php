<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?>
			<?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
				</div><!-- .row -->
				<?php get_template_part( 'template-parts/footer','template' ); ?>
			<?php endif; ?>
			</div><!-- .row -->
		</div><!-- .container-fluid-->
	</div><!-- #content-wrapper -->
</div><!-- #page -->

<!-- Search Modal -->
<div class="modal fade" id="site-search" tabindex="-1" role="dialog" aria-labelledby="site-search-label" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
    	<div class="modal-content">
	    	<div class="modal-header">
			<h2 class="modal-title h5" id="site-search-label"><?php esc_html_e( 'Search MNT-EC', 'wp-bootstrap-starter' ); ?></h2>
		    	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
	    	</div>
	    	<div class="modal-body">
			<?php get_search_form(); ?>
	    	</div>
    	</div>
	</div>
</div>

<?php wp_footer(); ?>

<script>
// Datatables
jQuery(document).ready( function () {
	jQuery('#mediatable').DataTable({
		dom: 'Blfrtip',
		"paging": false,
		buttons: [
			'csv', 'excel'
		]
	});
	console.log('happpy');
} );
</script>
</body>
</html>
