// Custom Scripts for MNT-EC
/* Fade in body */
jQuery( window ).load(function() {
    removeFadeOut();
});

jQuery(document).ready(function(){
	jQuery('[data-toggle="tooltip"]').tooltip()
});

function removeFadeOut() {
	jQuery('body').removeClass('fade-out');
}

// Smooth Scroll for Anchor Links
/*jQuery(document).ready(function(){

	jQuery('a[href*="#"]')
	.not('[href="#"]')
	.not('[href="#0"]')
	.click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {

      var target = jQuery(this.hash);
      target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
      if (target.length) {
	    if (jQuery(window).width() < 768) {
	        jQuery('html,body').animate({
	          scrollTop: target.offset().top -0
	        }, 500);
	    } else {
		    jQuery('html,body').animate({
	          scrollTop: target.offset().top -120
	        }, 500);
	    }
        return false;
      }
    }
  });
});*/

// Cards Match Height
// Cards Match Height
jQuery(function($) {
	$('.card-match-height').matchHeight({
		byRow: true
	});

	$('.mntec-posts-carousel .carousel-item').matchHeight({
		byRow: true
	});
});

// Recalculate after everything finishes loading
jQuery(window).on('load', function() {
	jQuery.fn.matchHeight._update();

	setTimeout(function() {
		jQuery.fn.matchHeight._update();
	}, 300);
});

// Latest Carousel
jQuery(document).ready(function() {
	jQuery('.latest-slider').each(function() {

		var swiper = new Swiper(this, {
			loop: false,
			speed: 500,
			slidesPerView: 1,
			zoom: true,
			spaceBetween: 20,
			breakpoints: {
				500: {
					slidesPerView: 1,
				},
				600: {
					slidesPerView: 2,
				},
				1200: {
					slidesPerView: 4,
				},
			},
			watchOverflow: true,
			autoplay: {
				delay: 4000,
				pauseOnMouseEnter: true,
			},
			scrollbar: {
				el: ".swiper-scrollbar",
				draggable: true
			},
			navigation: {
				nextEl: ".swiper-button-next",
				prevEl: ".swiper-button-prev",
			}
		});
	});
});

// Filtering of INternships and Scholarships
jQuery(document).ready(function () {
	jQuery('.inter-schol-filters .form-check-input').on('change', function () {
		// Get all checked checkbox values
		let selectedFilters = jQuery('.inter-schol-filters .form-check-input:checked').map(function () {
			return this.value;
		}).get();

		// Hide all `.card` elements with a fade-out effect
		jQuery('.inter-schol-card-group .card').fadeOut(200, function() {
			if (selectedFilters.length > 0) {
				// Build a selector for cards that match all selected filters
				let filterSelector = selectedFilters.map(function(filter) {
					return '.' + filter;
				}).join('');

				// Show only `.card` elements that match all selected filters with fade-in
				jQuery('.inter-schol-card-group .card' + filterSelector).fadeIn(200);
			} else {
				// If no filters are selected, show all `.card` elements with fade-in
				jQuery('.inter-schol-card-group .card').fadeIn(200);
			}
		});
	});
});