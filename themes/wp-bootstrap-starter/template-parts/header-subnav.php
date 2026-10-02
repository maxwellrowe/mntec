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

<?php if(get_field('select_sub_navigation')) { ?>

	<div id="subnav-bar" class="collapse d-lg-block">
		<nav class="navbar navbar-dark bg-dark navbar-expand-lg px-4" <?php if(get_field('custom_section_color', $parent)) { ?>style="background-color: <?php the_field('custom_section_color', $parent); ?> !important;"<?php } ?>>
			<?php
				$subnav_menu_id = get_field('select_sub_navigation', $parent);
	            wp_nav_menu(array(
		            'menu'			  => $subnav_menu_id,
		            'container'       => 'ul',
		            'container_id'    => 'sub-nav',
		            'container_class' => 'collapse navbar-collapse',
		            'menu_id'         => false,
		            'menu_class'      => 'navbar-nav mr-auto',
		            'depth'           => 3,
		            'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
		            'walker'          => new wp_bootstrap_navwalker()
	            ));
	        ?>
	        <ul class="navbar-nav ml-auto d-none d-lg-block d-xl-block">
				<li class="nav-item">
					<a class="nav-link subnav-search" data-toggle="modal" data-target="#site-search"><span class="fal fa-search"></span> <span class="sr-only">Search</span></a>
				</li>
			</ul>
		</nav>
	</div>
	<?php if(!get_field('hide_page_title')) { ?>
		<?php if($top_level_parent == false) { ?>
			<div id="subnav-bar-title-wrapper">
				<h1 class="subnav-bar-title px-4"><?php the_title(); ?></h1>
			</div>
		<?php } ?>
	<?php } ?>

<?php } elseif(get_field('select_sub_navigation', $parent)) { ?>
	
	<div id="subnav-bar" class="collapse d-lg-block">
		<nav class="navbar navbar-dark bg-dark navbar-expand-lg px-4 hadf" <?php if(get_field('custom_section_color', $parent)) { ?>style="background-color: <?php the_field('custom_section_color', $parent); ?> !important;"<?php } ?>>
			<?php
				$subnav_menu_id = get_field('select_sub_navigation', $parent);
	            wp_nav_menu(array(
		            'menu'			  => $subnav_menu_id,
		            'container'       => 'ul',
		            'container_id'    => 'sub-nav',
		            'container_class' => 'collapse navbar-collapse',
		            'menu_id'         => false,
		            'menu_class'      => 'navbar-nav mr-auto',
		            'depth'           => 3,
		            'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
		            'walker'          => new wp_bootstrap_navwalker()
	            ));
	        ?>
	        <ul class="navbar-nav ml-auto d-none d-lg-block d-xl-block">
				<li class="nav-item">
					<a class="nav-link subnav-search" data-toggle="modal" data-target="#site-search"><span class="fal fa-search"></span> <span class="sr-only">Search</span></a>
				</li>
			</ul>
		</nav>
	</div>
	<?php if(!get_field('hide_page_title')) { ?>
		<?php if($top_level_parent == false) { ?>
			<div id="subnav-bar-title-wrapper">
				<h1 class="subnav-bar-title px-4"><?php the_title(); ?></h1>
			</div>
		<?php } ?>
	<?php } ?>
	
<?php } elseif(is_singular('resource')) { ?>
	<div id="subnav-bar" class="collapse d-lg-block">
		<nav class="navbar navbar-dark bg-dark navbar-expand-lg px-4 hadf">
			<?php
				$subnav_menu_id = get_field('resource_navigation', 'option');
				wp_nav_menu(array(
					'menu'			  => $subnav_menu_id,
					'container'       => 'ul',
					'container_id'    => 'sub-nav',
					'container_class' => 'collapse navbar-collapse',
					'menu_id'         => false,
					'menu_class'      => 'navbar-nav mr-auto',
					'depth'           => 3,
					'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
					'walker'          => new wp_bootstrap_navwalker()
				));
			?>
			<ul class="navbar-nav ml-auto d-none d-lg-block d-xl-block">
				<li class="nav-item">
					<a class="nav-link subnav-search" data-toggle="modal" data-target="#site-search"><span class="fal fa-search"></span> <span class="sr-only">Search</span></a>
				</li>
			</ul>
		</nav>
	</div>
	<div id="subnav-bar-title-wrapper">
		<h1 class="subnav-bar-title px-4"><?php the_title(); ?></h1>
	</div>
	
<?php } elseif(is_singular('poster')) { ?>
	<div id="subnav-bar" class="collapse d-lg-block">
		<nav class="navbar navbar-dark bg-dark navbar-expand-lg px-4 hadf">
			<?php
				$subnav_menu_id = get_field('poster_navigation', 'option');
				wp_nav_menu(array(
					'menu'			  => $subnav_menu_id,
					'container'       => 'ul',
					'container_id'    => 'sub-nav',
					'container_class' => 'collapse navbar-collapse',
					'menu_id'         => false,
					'menu_class'      => 'navbar-nav mr-auto',
					'depth'           => 3,
					'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
					'walker'          => new wp_bootstrap_navwalker()
				));
			?>
			<ul class="navbar-nav ml-auto d-none d-lg-block d-xl-block">
				<li class="nav-item">
					<a class="nav-link subnav-search" data-toggle="modal" data-target="#site-search"><span class="fal fa-search"></span> <span class="sr-only">Search</span></a>
				</li>
			</ul>
		</nav>
	</div>
	
<?php } elseif(is_singular('post') || is_singular('this-week-in-small')) { ?>
	<div id="subnav-bar" class="collapse d-lg-block">
		<nav class="navbar navbar-dark bg-dark navbar-expand-lg px-4 hadf">
			<?php
				$subnav_menu_id = get_field('news_and_updates_navigation', 'option');
				wp_nav_menu(array(
					'menu'			  => $subnav_menu_id,
					'container'       => 'ul',
					'container_id'    => 'sub-nav',
					'container_class' => 'collapse navbar-collapse',
					'menu_id'         => false,
					'menu_class'      => 'navbar-nav mr-auto',
					'depth'           => 3,
					'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
					'walker'          => new wp_bootstrap_navwalker()
				));
			?>
			<ul class="navbar-nav ml-auto d-none d-lg-block d-xl-block">
				<li class="nav-item">
					<a class="nav-link subnav-search" data-toggle="modal" data-target="#site-search"><span class="fal fa-search"></span> <span class="sr-only">Search</span></a>
				</li>
			</ul>
		</nav>
	</div>
	
<?php } elseif(is_singular('journal')) { ?>
	<div id="subnav-bar" class="collapse d-lg-block">
		<nav class="navbar navbar-dark bg-dark navbar-expand-lg px-4 hadf" style="background-color: <?php the_field('journal_brand_color','option'); ?> !important;">
			<ul id="menu-news-updates-menu" class="navbar-nav mr-auto">
				<?php $jate_terms = get_the_terms($post->ID,'jate'); ?>
				<?php 
					if(!empty($jate_terms)) {
						foreach($jate_terms as $jate_term) {
							$jate_term_id = $jate_term->term_id;
							$jate_term_name = $jate_term->name;
							$jate_term_link = get_term_link($jate_term_id, 'jate'); ?>
							<li class="menu-item menu-item-type-post_type menu-item-object-page nav-item"><a title="<?php echo $jate_term_name; ?>" href="<?php echo $jate_term_link; ?>" class="nav-link"><?php echo $jate_term_name; ?></a></li>
						<?php }
					}
				?>
			</ul>
			<ul class="navbar-nav ml-auto d-none d-lg-block d-xl-block">
				<li class="nav-item">
					<a class="nav-link subnav-search" data-toggle="modal" data-target="#site-search"><span class="fal fa-search"></span> <span class="sr-only">Search</span></a>
				</li>
			</ul>
		</nav>
	</div>
<?php } elseif(is_tax('jate')) { ?>
	<div id="subnav-bar" class="collapse d-lg-block">
		<nav class="navbar navbar-dark bg-dark navbar-expand-lg px-4 hadf" style="background-color: <?php the_field('journal_brand_color','option'); ?> !important;">
			<?php
				$subnav_menu_id = get_field('resource_navigation', 'option');
				wp_nav_menu(array(
					'menu'			  => '100032',
					'container'       => 'ul',
					'container_id'    => 'sub-nav',
					'container_class' => 'collapse navbar-collapse',
					'menu_id'         => false,
					'menu_class'      => 'navbar-nav mr-auto',
					'depth'           => 3,
					'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
					'walker'          => new wp_bootstrap_navwalker()
				));
			?>
			<ul class="navbar-nav ml-auto d-none d-lg-block d-xl-block">
				<li class="nav-item">
					<a class="nav-link subnav-search" data-toggle="modal" data-target="#site-search"><span class="fal fa-search"></span> <span class="sr-only">Search</span></a>
				</li>
			</ul>
		</nav>
	</div>
	<div id="subnav-bar-title-wrapper">
		<h1 class="subnav-bar-title px-4"><?php single_term_title(); ?></h1>
	</div>
<?php } elseif(is_singular('tribe_events')) { ?>
	<div id="subnav-bar" class="collapse d-lg-block">
		<nav class="navbar navbar-dark bg-dark navbar-expand-lg px-4 hadf">
			<?php
				$subnav_menu_id = get_field('calendar_menu', 'option');
				wp_nav_menu(array(
					'menu'			  => $subnav_menu_id,
					'container'       => 'ul',
					'container_id'    => 'sub-nav',
					'container_class' => 'collapse navbar-collapse',
					'menu_id'         => false,
					'menu_class'      => 'navbar-nav mr-auto',
					'depth'           => 3,
					'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
					'walker'          => new wp_bootstrap_navwalker()
				));
			?>
			<ul class="navbar-nav ml-auto d-none d-lg-block d-xl-block">
				<li class="nav-item">
					<a class="nav-link subnav-search" data-toggle="modal" data-target="#site-search"><span class="fal fa-search"></span> <span class="sr-only">Search</span></a>
				</li>
			</ul>
		</nav>
	</div>

<?php } elseif(is_singular(array( 'grant', 'scholarship', 'research-opportunity', 'opportunity' )) ) { ?>

	<div id="subnav-bar" class="collapse d-lg-block">
		<nav class="navbar navbar-dark bg-dark navbar-expand-lg px-4 hadf">
			<ul class="navbar-nav ml-auto d-none d-lg-block d-xl-block">
				<li class="nav-item">
					<a class="nav-link subnav-search" data-toggle="modal" data-target="#site-search"><span class="fal fa-search"></span> <span class="sr-only">Search</span></a>
				</li>
			</ul>
		</nav>
	</div>	
	
<?php } else { ?>
	<?php if($top_level_parent == true) { ?>
		<?php if(!get_field('hide_page_title')) { ?>

			<div id="subnav-bar" class="no-subnav-menu">
				<nav class="navbar navbar-dark bg-dark justify-content-betweeen px-4 py-4 py-lg-2" <?php if(get_field('custom_section_color', $parent)) { ?>style="background-color: <?php the_field('custom_section_color', $parent); ?> !important;"<?php } ?>>
					<?php if(is_search()) { ?>
						<h1 class="subnav-bar-title navbar-brand p-0 m-0"><?php printf( esc_html__( 'Search Results for: %s', 'wp-bootstrap-starter' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
					<?php } else if(is_tax()) { ?>
						<h1 class="subnav-bar-title navbar-brand p-0 m-0"><?php single_term_title(); ?></h1>
					<?php } else if(is_archive()) { ?>
						<h1 class="subnav-bar-title navbar-brand p-0 m-0"><?php the_archive_title(); ?></h1>
					<?php } else { ?>
						<h1 class="subnav-bar-title navbar-brand p-0 m-0"><?php the_title(); ?></h1>
					<?php } ?>
					<ul class="navbar-nav ml-auto d-none d-lg-block d-xl-block">
						<li class="nav-item">
							<a class="nav-link subnav-search" data-toggle="modal" data-target="#site-search"><span class="fal fa-search"></span> <span class="sr-only">Search</span></a>
						</li>
					</ul>
				</nav>
			</div>
			
		<?php } ?>
	<?php } ?>
<?php } ?>