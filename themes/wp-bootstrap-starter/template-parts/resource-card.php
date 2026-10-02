<?php // variables
	$resource_category_list= get_the_terms( $post->ID, 'resource_category' );
	$resource_categories = join(', ', wp_list_pluck($resource_category_list, 'name'));
	$audience_terms = get_the_terms($post->ID,'audience');
	$audience_terms_classes = join(' ', wp_list_pluck($audience_terms, 'slug'));
?>
<div class="col-sm-12 col-md-3">
	<div class="card rounded-0 border-info resource-card card-match-height <?php echo $audience_terms_classes; ?>">
		<?php if ( has_post_thumbnail() ) { ?>
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('resource_feat', ['class' => 'card-img-top']); ?></a>
		<?php } ?>
		<div class="card-body">
			<?php if($resource_categories) { ?>
				<span class="card-resource-category"><?php echo $resource_categories; ?></span>
			<?php } ?>
			<h2 class="h4"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php
				$modified_date = get_the_modified_date('Y-m-d');
				$published_date = get_the_date('Y-m-d');
				if($modified_date >= $published_date) {
			?>
				<span class="card-updated-date">Updated: <?php the_modified_date('m/d/Y'); ?></span>
			<?php		
				} else {
			?>
				<span class="card-updated-date"><?php the_date('m/d/Y'); ?></span>
			<?php		
				}
			?>
			
		</div>
		<div class="card-footer bg-white border-0">
			<?php 
				if(!empty($audience_terms)) {
					foreach($audience_terms as $audience_term) {
						$audience_term_id = $audience_term->term_id;
						$audience_term_name = $audience_term->name;
						$audience_term_slug = $audience_term->slug;
						$audience_color = get_field('color','term_' . $audience_term_id); 
						$audience_link = get_field('resources_landing_page','term_' . $audience_term_id); ?>
						<a href="<?php echo $audience_link ?>" class="event-card-audience-color" data-toggle="tooltip" data-placement="top" title="<?php echo $audience_term_name ?>" style="background-color: <?php echo $audience_color ?>;"></a>
					<?php }
				}
			?>
		</div>
	</div>
</div>