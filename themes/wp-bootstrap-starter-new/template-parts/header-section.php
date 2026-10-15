<?php 
	// Get the TOP parent page ID
	if ($post->post_parent)	{
		$ancestors=get_post_ancestors($post->ID);
		$root=count($ancestors)-1;
		$parent = $ancestors[$root];
		$top_level_parent = false;
	} else {
		$parent = $post->ID;
		$top_level_parent = true;
	}
?>
<?php if(get_field('custom_section_color', $parent)) { ?>
<style>
	body.section-heading-visible #content {
		border-color: <?php the_field('custom_section_color', $parent); ?> !important;
	}
	body.section-heading-visible .section-heading {
		background-color: <?php the_field('custom_section_color', $parent); ?> !important;
	}
	body.section-heading-visible .section-heading-wrapper {
		background-color: <?php the_field('custom_section_color', $parent); ?> !important;
	}
	@media (min-width: 992px) {
		body.section-heading-visible .section-heading-wrapper {
			background-color: none !important;
		}
	}
</style>
<?php } ?>
<?php if(!get_field('hide_section_title')) { ?>
	
	<?php if(get_field('select_sub_navigation', $parent)) { ?>
	<!-- TO DO: Check if need to verify the current post does not have a menu? -->
		
		<?php if($top_level_parent == true) { ?>
			<div class="d-flex align-items-center section-heading-wrapper">
				<h1 class="section-heading p-4 p-lg-0 m-0 flex-grow-1">
					<span class="section-header-text"><?php echo get_the_title($parent); ?></span>
				</h1>
				
				<button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#subnav-bar" aria-controls="" aria-expanded="false" aria-label="Toggle navigation">
	                <span class="sr-only">Show/ Hide Menu</span><span class="fal fa-bars"></span>
	            </button>
			</div>
		<?php } else { ?>
			<div class="d-flex align-items-center section-heading-wrapper">
				<div class="section-heading p-4 p-lg-0 m-0 flex-grow-1">
					<a href="<?php echo get_permalink($parent); ?>">
						<span class="section-header-text"><?php echo get_the_title($parent); ?></span>
					</a>
				</div>
				
				<button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#subnav-bar" aria-controls="" aria-expanded="false" aria-label="Toggle navigation">
	                <span class="sr-only">Show/ Hide Menu</span><span class="fal fa-bars"></span>
	            </button>
			</div>
			
		<?php } ?>
		
	<?php } elseif(is_singular('resource')) { ?>
		<div class="d-flex align-items-center section-heading-wrapper">
			<div class="section-heading p-4 p-lg-0 m-0 flex-grow-1">
				<a href="<?php the_field('resource_landing_page','option'); ?>">
					<span class="section-header-text">Resources</span>
				</a>
			</div>
			
			<button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#subnav-bar" aria-controls="" aria-expanded="false" aria-label="Toggle navigation">
				<span class="sr-only">Show/ Hide Menu</span><span class="fal fa-bars"></span>
			</button>
		</div>
	<?php } elseif(is_singular('poster')) { ?>
		<div class="d-flex align-items-center section-heading-wrapper">
			<div class="section-heading p-4 p-lg-0 m-0 flex-grow-1">
				<a href="<?php the_field('poster_landing_page','option'); ?>">
					<span class="section-header-text">Posters</span>
				</a>
			</div>
			
			<button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#subnav-bar" aria-controls="" aria-expanded="false" aria-label="Toggle navigation">
				<span class="sr-only">Show/ Hide Menu</span><span class="fal fa-bars"></span>
			</button>
		</div>
	<?php } elseif(is_singular('tribe_events')) { ?>
		<div class="d-flex align-items-center section-heading-wrapper">
			<div class="section-heading p-4 p-lg-0 m-0 flex-grow-1">
				<a href="<?php the_field('calendar_landing_page','option'); ?>">
					<span class="section-header-text">Calendar</span>
				</a>
			</div>
			
			<button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#subnav-bar" aria-controls="" aria-expanded="false" aria-label="Toggle navigation">
				<span class="sr-only">Show/ Hide Menu</span><span class="fal fa-bars"></span>
			</button>
		</div>
	<?php } elseif(is_singular('post')) { ?>
		<div class="d-flex align-items-center section-heading-wrapper">
			<div class="section-heading p-4 p-lg-0 m-0 flex-grow-1">
				<a href="<?php the_field('news_updates_landing_page','option'); ?>">
					<span class="section-header-text">Think Small</span>
				</a>
			</div>
			
			<button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#subnav-bar" aria-controls="" aria-expanded="false" aria-label="Toggle navigation">
				<span class="sr-only">Show/ Hide Menu</span><span class="fal fa-bars"></span>
			</button>
		</div>
	<?php } elseif(is_singular('this-week-in-small')) { ?>
		<div class="d-flex align-items-center section-heading-wrapper">
			<div class="section-heading p-4 p-lg-0 m-0 flex-grow-1">
				<a href="<?php the_field('this_week_in_small_landing_page','option'); ?>">
					<span class="section-header-text">This Week in Small</span>
				</a>
			</div>
			
			<button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#subnav-bar" aria-controls="" aria-expanded="false" aria-label="Toggle navigation">
				<span class="sr-only">Show/ Hide Menu</span><span class="fal fa-bars"></span>
			</button>
		</div>
	<?php } elseif(is_singular('journal') || is_tax('issue')) { ?>
		<div class="d-flex align-items-center section-heading-wrapper">
			<div class="section-heading p-4 p-lg-0 m-0 flex-grow-1">
				<a href="<?php the_field('journal_landing_page_url','option'); ?>">
					<span class="section-header-text"><?php the_field('journal_name','option'); ?></span>
				</a>
			</div>
			
			<button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#subnav-bar" aria-controls="" aria-expanded="false" aria-label="Toggle navigation">
				<span class="sr-only">Show/ Hide Menu</span><span class="fal fa-bars"></span>
			</button>
		</div>
	<?php } ?>
	
<?php } ?>