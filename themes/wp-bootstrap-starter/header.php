<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="ahrefs-site-verification" content="006a613fa9d6110372a9a1b5e19098a77a0a19c4a3e9af4e47bb876449394697">
    <link rel="profile" href="http://gmpg.org/xfn/11">
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-SYPTF4PKTR"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
	
		gtag('config', 'G-SYPTF4PKTR');
	</script>
	
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!--Fade out page before load-->
<script>//
	//document.body.className += ' fade-out';
</script>
<div id="page-loader"></div>
<?php 

    // WordPress 5.2 wp_body_open implementation
    if ( function_exists( 'wp_body_open' ) ) {
        wp_body_open();
    } else {
        do_action( 'wp_body_open' );
    }

?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wp-bootstrap-starter' ); ?></a>
    <?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
    <div class="row no-gutters">
		<header id="masthead" class="site-header col-md-12 col-lg-2 col-sm-12 p-0" role="banner">
	        <div class="container-fluid py-4 px-md-4 px-lg-4">
		        <div class="d-flex align-items-center" id="mntec-logo">
			        <div class="flex-grow-1">
				        <?php if ( get_theme_mod( 'wp_bootstrap_starter_logo' ) ): ?>
		                    <a href="<?php echo esc_url( home_url( '/' )); ?>">
		                        <img src="<?php echo esc_url(get_theme_mod( 'wp_bootstrap_starter_logo' )); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
		                    </a>
		                <?php else : ?>
		                    <a class="site-title" href="<?php echo esc_url( home_url( '/' )); ?>"><?php esc_url(bloginfo('name')); ?></a>
		                <?php endif; ?>
			        </div>
			        <div class="pl-4 pr-2 d-lg-none">
				        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navigation-menus" aria-controls="main-navigation-menus" aria-expanded="false" aria-label="Toggle navigation">
			                <span class="sr-only">Show/ Hide Menu</span><span class="fal fa-bars"></span>
			            </button>
			        </div>
			        <div class="pl-2 d-lg-none">
				        <a class="nav-link subnav-search px-0" data-toggle="modal" data-target="#site-search"><span class="fal fa-search"></span> <span class="sr-only">Search</span></a>
			        </div>
		        </div>
	        </div><!-- .container-fluid-->
	        <div class="collapse d-lg-block" id="main-navigation-menus">
	            <div class="container-fluid py-2 px-4 border-bottom border-light"> 
		            <?php
			            wp_nav_menu(array(
				            'theme_location'    => 'primary',
				            'container'       => 'ul',
				            'container_id'    => 'main-nav',
				            'container_class' => 'nav flex-column',
				            'menu_id'         => 'menu-primary-menu',
				            'mntec_collapsible' => true,
				            'menu_class'      => 'navbar-nav',
				            'depth'           => 3,
				            'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
				            'walker'          => new wp_bootstrap_navwalker()
			            ));
		            ?>
		        </div><!-- .container-fluid-->
		        
		        <div class="container-fluid p-4"> 
		            <?php
			            wp_nav_menu(array(
				            'theme_location'    => 'secondary',
				            'container'       => 'ul',
				            'container_id'    => 'secondary-nav',
				            'container_class' => 'nav flex-column',
				            'menu_id'         => 'menu-secondary-menu',
				            'mntec_collapsible' => true,
				            'menu_class'      => 'navbar-nav',
				            'depth'           => 3,
				            'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
				            'walker'          => new wp_bootstrap_navwalker()
			            ));
		            ?>
		            
		            <ul class="list-inline mt-4">
		            
			        <?php 
				        if( have_rows('social_media_links','option') ):
				        while( have_rows('social_media_links','option') ) : the_row();
				    ?>
				    	<li class="list-inline-item"><a href="<?php the_sub_field('social_link','option'); ?>" target="_blank"><span class="<?php the_sub_field('social_icon','option'); ?>"></span><span class="sr-only"><?php the_sub_field('social_icon','option'); ?></span></a></li>
				    <?php 
					    endwhile;
					    endif;
					?>
					
		            </ul>
		            
		            <div id="mntec-sponsor-logos">
			            <ul class="list-inline">
				            <li class="list-inline-item"><a href="<?php the_field('pcc_url','option'); ?>" target="_blank"><img src="<?php the_field('pcc_logo','option'); ?>" alt="Pasadena City College" /></a></li>
				            <li class="list-inline-item"><a href="<?php the_field('nsf_url','option'); ?>" target="_blank"><img src="<?php the_field('nsf_logo','option'); ?>" alt="NSF" /></a></li>
			            </ul>
		            </div>
				    
		        </div><!-- .container-fluid-->
	        </div><!-- #main-navigation-menus-->
		</header><!-- #masthead -->

		<div id="content" class="col-md-12 col-lg-10 offset-lg-2 col-sm-12 site-content" <?php if(is_singular('journal') || is_tax('issue')) { ?>style="border-color: <?php the_field('journal_brand_color','option'); ?> !important;"<?php } ?>>
			
			<?php 
				if(is_page() || is_single() || is_tax('issue')) {
					get_template_part( 'template-parts/header', 'section' );
				}
			?>
			
			<div id="content-wrapper">
				
				<?php get_template_part( 'template-parts/header', 'subnav' ); ?>
			
				<div class="container-fluid container-fluid-main-content <?php if(get_field('disable_top_padding_on_page')) { ?>container-fluid-no-padding-top<?php } ?>">
					<div class="row">
			            <?php endif; ?>