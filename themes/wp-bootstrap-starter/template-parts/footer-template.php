<?php if(get_field('pre_footer', 'option')) { ?>	
	<div class="row pre-footer">
		<?php echo get_field('pre_footer', 'option'); ?>
	</div>
<?php } ?>
	
<footer id="colophon" class="row site-footer py-4 px-2 <?php echo wp_bootstrap_starter_bg_class(); ?>" role="contentinfo">
	<div class="container">
		<div class="row">
			<div class="col-sm-12" id="top-footer">
				<div class="row">
					<div class="col-sm-6 col-md-3 pb-4">
						<span class="h6 text-uppercase font-weight-light"><?php the_field('audience_navigation_title','option'); ?></span>
						<?php
				            wp_nav_menu(array(
					            'theme_location'    => 'footer_audience',
					            'container'       => 'ul',
					            'container_id'    => 'footer-audience-nav',
					            'container_class' => 'nav flex-column',
					            'menu_id'         => false,
					            'menu_class'      => 'navbar-nav',
					            'depth'           => 3,
					            'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
					            'walker'          => new wp_bootstrap_navwalker()
				            ));
			            ?>
					</div>
					<div class="col-sm-6 col-md-3 pb-4">
						<span class="h6 text-uppercase font-weight-light"><?php the_field('quicklinks_title','option'); ?></span>
						<?php
				            wp_nav_menu(array(
					            'theme_location'    => 'footer_quicklinks',
					            'container'       => 'ul',
					            'container_id'    => 'footer-quicklinks-nav',
					            'container_class' => 'nav flex-column',
					            'menu_id'         => false,
					            'menu_class'      => 'navbar-nav',
					            'depth'           => 3,
					            'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
					            'walker'          => new wp_bootstrap_navwalker()
				            ));
			            ?>
					</div>
					<div class="col-sm-6 col-md-3 pb-4" id="footer-sign-up">
						<?php if(get_field('email_sign_up','option')) { ?>
							<span class="h6 text-uppercase font-weight-light"><?php the_field('email_sign_up_title','option'); ?></span>
							<?php the_field('email_sign_up','option'); ?>
						<?php } ?>
					</div>
					<div class="col-sm-6 col-md-3 pb-4">
						<img src="<?php the_field('nsf_logo','option'); ?>" class="mb-2" alt="NSF Logo" />
						<?php the_field('footer_nsf_disclaimer','option'); ?>
					</div>
				</div>
			</div>
			<div class="col-sm-12 pt-4 mt-4" id="bottom-footer">
				<div class="row">
					<div class="col-sm-12 col-md-6">
						&copy; <?php echo date('Y'); ?> <?php echo '<a href="'.home_url().'">'.get_bloginfo('name').'</a>'; ?>
					</div>
					<div class="col-sm-12 col-md-6 text-md-right text-lg-right">
						<a href="<?php the_field('sitemap_link','option'); ?>">Sitemap</a> &nbsp; <?php if(get_field('office_365_login_link','option')) { ?><a href="<?php the_field('office_365_login_link','option'); ?>">Log In</a><?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>