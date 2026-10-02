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
	<div class="modal-dialog" role="document">
    	<div class="modal-content">
	    	<div class="modal-header">
		    	<h5 class="modal-title sr-only" id="site-search-label">Search Website</h5>
		    	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
	    	</div>
	    	<div class="modal-body">
		    	<?php echo do_shortcode('[wd_asp id=1002]'); ?>
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