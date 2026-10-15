<?php if ( has_post_thumbnail() ) { ?>
	<a class="list-group-item list-group-item-action text-dark rounded-0 d-flex align-items-center list-group-item-had-image" href="<?php the_permalink(); ?>">
		<?php the_post_thumbnail($settings->mntec_posts_thumbnail_size, ['class' => 'mr-4 posts-list-group-image']); ?>
<?php } else { ?>
	<a class="list-group-item list-group-item-action text-dark border-dark rounded-0" href="<?php the_permalink(); ?>">
<?php } ?>
		<div>
			<h2 class="h4 mb-0"><?php the_title(); ?></h2>
			<div class="journal-authors text-uppercase">
				<?php $authors = array(); ?>
				<?php if( have_rows('authors') ):
					while( have_rows('authors') ) : the_row();
						$author = get_sub_field('author_name');
						array_push($authors, $author);
					endwhile;
				else :
				endif;

				$authors_list = implode(', ', $authors);
				print_r($authors_list);
				?>
			</div>
			<div class="journal-publish-date">
				Published: <?php echo get_the_date( 'F j, Y' ); ?>
			</div>
		</div>
	</a>