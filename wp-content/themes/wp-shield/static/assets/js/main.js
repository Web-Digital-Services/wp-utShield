jQuery(function ($) {

const $window = $(window);
const $document = $(document);
const $body = $('body');

/**
 * Custom Cursor.
 */

var standardCursor = document.querySelector(".standard-cursor");
var videoCursor = document.querySelector(".video-cursor");
var sliderCursor = document.querySelector(".slider-cursor");
var sliderPrev = document.querySelector(".controls-prev");
var sliderNext = document.querySelector(".controls-next");

window.addEventListener("mousemove", cursor);

function cursor(e) {
  standardCursor.style.top = e.clientY + "px";
  standardCursor.style.left = e.clientX + "px";
  videoCursor.style.top = e.clientY + "px";
  videoCursor.style.left = e.clientX + "px";
  sliderCursor.style.top = e.clientY + "px";
  sliderCursor.style.left = e.clientX + "px";
}

$(".video-cursor-hover").each(function () {
  var videoLink = this;

  videoLink.addEventListener("mouseover", () => {
    document.body.classList.add("video-cursor-hover--on");
  });
  videoLink.addEventListener("mouseleave", () => {
    document.body.classList.remove("video-cursor-hover--on");
  });
});

if ( null !== sliderPrev ) {
  sliderPrev.addEventListener("mouseover", () => {
    document.body.classList.add("slider-cursor-hover--on");
    document.body.classList.add("slider-cursor-prev");
  });
  sliderPrev.addEventListener("mouseleave", () => {
    document.body.classList.remove("slider-cursor-hover--on");
    document.body.classList.remove("slider-cursor-prev");
  });
}

if ( null !== sliderNext ) {
  sliderNext.addEventListener("mouseover", () => {
    document.body.classList.add("slider-cursor-hover--on");
  });
  sliderNext.addEventListener("mouseleave", () => {
    document.body.classList.remove("slider-cursor-hover--on");
  });
}


/**
 * Slider testimonials.
 */
if (document.querySelectorAll('.js-slider-testimonials').length > 0) {
  $('.slider-testimonials-slider').slick({
    autoplay: true,
    autoplaySpeed: 10000,
    fade: true,
    arrows: false,
    dots: true,
    customPaging : function(slider, i) { 
      return '<button type="button"><svg class="circle" width="22" height="22" fill="none" xmlns="http://www.w3.org/2000/svg"><circle class="outer-circle" cx="11" cy="11" r="10" stroke="#FFFFFF" stroke-width="2"/><circle class="outer-circle-grow" cx="11" cy="11" r="10" stroke="#FFFFFF" stroke-width="2"/><circle class="inner-circle" cx="11" cy="11" r="4" fill="#FFFFFF"/></svg></button>';
    },
  });
  
//  const sliderTestimonial = tns({
//    container: ".js-slider-testimonials",
//    mode: "gallery",
//    controlsContainer: ".slider-controls",
//    navContainer: ".testimonial-slider-nav",
//    autoplay: true,
//    autoplayButtonOutput: false,
//    autoplayTimeout: 10000,
//    speed: 500
//  });
}


/**
 * Slider news.
 */

if (document.querySelectorAll('.js-slider-news').length > 0) {
  $('.slider-news-slider').slick({
    infinite: false,
    arrows: true,
    arrowsPlacement: 'beforeSlides',
    prevArrow: '<button type="button" class="nav-arrow prev">'
               + '  <span aria-hidden="true"><img src="../assets/img/svg/ico-arrow-left.svg" alt="Arrow icon"></span>'
               + '  <span class="sr-only">Previous slide</span>'
               + '</button>',
    nextArrow: '<button type="button" class="nav-arrow next">'
               + '  <span aria-hidden="true"><img src="../assets/img/svg/ico-arrow-right.svg" alt="Arrow icon"></span>'
               + '  <span class="sr-only">Next slide</span>'
               + '</button>',
    slidesToShow: 3,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint: 700,
        settings: {
          slidesToShow: 1.5
        }
      },
      {
        breakpoint: 500,
        settings: {
          slidesToShow: 1
        }
      }
    ]  
  });
}


/**
 * Slider callout.
 */
  
if (document.querySelectorAll('.js-slider-callout').length > 0) {
  $('.callout-slider').slick({
    autoplay: true,
    autoplaySpeed: 10000,
    arrows: false,
    dots: true,
    customPaging : function(slider, i) { 
      return '<button type="button"><svg class="circle" width="22" height="22" fill="none" xmlns="http://www.w3.org/2000/svg"><circle class="outer-circle" cx="11" cy="11" r="10" stroke="#FFFFFF" stroke-width="2"/><circle class="outer-circle-grow" cx="11" cy="11" r="10" stroke="#FFFFFF" stroke-width="2"/><circle class="inner-circle" cx="11" cy="11" r="4" fill="#FFFFFF"/></svg></button>';
    },
  });
}


/**
 * Mobile placeholder text.
 */

$(window).on('load resize', function () {  
  if ($(window).width() < 700) {
    $(".js-find").attr("placeholder", "Browse all Providers");
    } else {
    $(".js-find").attr("placeholder", "Browse Providers by name, specialty or location");
  }
});


/**
 * Accordion.
 * @param  {obj}
 * @return {void}
 */
const initAccordions = ($accordion = $('.js-accordion')) => {
    $(window).on('load resize', function () {
        if ($(window).width() < 1024) {
            //Hide the inactive sections
            $('.accordion__section').not('.is-current').find('.accordion__body').hide()

            //Handle the show/hide logic
            $accordion.on('click', '.accordion__head', function (event) {
                const $accordionSection = $(this).closest('.accordion__section');
                const $accordionBody = $accordionSection.find('.accordion__body');

                $accordionBody.stop().slideToggle();

                $accordionSection.toggleClass('is-current');

                $accordionSection.siblings().removeClass('is-current')
                        .find('.accordion__body').slideUp();
            });
        } else {
            $('.accordion__section').not('.is-current').find('.accordion__body').show()
        }
    });
}

initAccordions();


/**
 * Accordion nav.
 *
 * @param  {obj}
 * @return {void}
 */
const initAccordionNav = ($accordionNav = $('.js-accordion-nav')) => {
    $(window).on('load resize', function () {
        //Hide the inactive sections
        $('.js-accordion-nav').find('.accordion__section').not('.is-current').find('.accordion__body').hide()

        //Handle the show/hide logic
        $accordionNav.on('click', '.accordion__head', function (event) {
            const $accordionSection = $(this).closest('.accordion__section');
            const $accordionBody = $accordionSection.find('.accordion__body');

            $accordionBody.stop().slideToggle();

            $accordionSection.toggleClass('is-current');

            $accordionSection.siblings().removeClass('is-current')
                    .find('.accordion__body').slideUp();
        });
    });
}

initAccordionNav();


/**
 * Accordion find.
 *
 * @param  {obj}
 * @return {void}
 */
const initFindAccordion = ($accordionFind = $('.js-accordion-find')) => {
    $(window).on('load resize', function () {
            //Hide the inactive sections
            $accordionFind.find('.accordion__section').not('.is-current').find('.accordion__body').hide()

            //Handle the show/hide logic
            $accordionFind.on('click', '.accordion__head', function (event) {
                $accordionFind.toggleClass('open');
                const $accordionSection = $(this).closest('.accordion__section');
                const $accordionBody = $accordionSection.find('.accordion__body');

                $accordionBody.stop().toggle();

                $accordionSection.toggleClass('is-current');

                $accordionSection.siblings().removeClass('is-current')
                        .find('.accordion__body').hide();
            });
    });
}

initFindAccordion();


const $menuButton = $('.js-burger-button');
const $menu = $('.js-menu');
const body = $('body');
const $header = $('.js-header');
const $hero = $('.js-hero');
const $wrapper = $('.wrapper');
const scrollWidth = window.innerWidth - $(document).width()

/**
 * Handle menu.
 *
 * @param  {obj}
 * @return {void}
 */
$menuButton.on('click', function(event) {
    $wrapper.css('padding-right', 0);
    $header.css('padding-right', 0);
	event.preventDefault();
    const $this = $(this);
	$hero.removeClass('menu-open');
    $header.removeClass('modal-open');
    body.removeClass('modal-open');
    $wrapper.removeClass('modal-open');
    $wrapper.toggleClass('menu-open');
    $header.toggleClass('fixed');

    if ($wrapper.hasClass('menu-open')) {
        $wrapper.css('padding-right', scrollWidth);
    } else {
        $wrapper.css('padding-right', 0);
    }

    if ($header.hasClass('fixed')) {
        $header.css('padding-right', scrollWidth);
    } else {
        $header.css('padding-right', 0);
    }

    $this.toggleClass('active');
    $menu.toggleClass('open');
    body.toggleClass('menu-open');
})


const $find = $('.js-find');
const $findButton = $('.js-button-find');
const $menuFind = $('.js-menu-find');
const $menuClose = $('.js-menu-find-close');


/**
 * Handle find.
 *
 * @param  {obj}
 * @return {void}
 */
$find.on('keyup', function() {
    if ($find.val().length > 0) {
        $menuFind.addClass('open');
    } else {
        $menuFind.removeClass('open');
    }
})

$findButton.on('click', function(event) {
    $wrapper.css('padding-right', 0);
    $header.css('padding-right', 0);
    event.preventDefault();
    $menuButton.removeClass('active');
    $menu.removeClass('open');
    $header.removeClass('fixed');
    $wrapper.removeClass('menu-open');
    $wrapper.toggleClass('modal-open');
    $header.toggleClass('modal-open');

    if ($wrapper.hasClass('modal-open')) {
        $wrapper.css('padding-right', scrollWidth);
    } else {
        $wrapper.css('padding-right', 0);
    }

    if ($header.hasClass('modal-open')) {
        $header.css('padding-right', scrollWidth);
    } else {
        $header.css('padding-right', 0);
    }

    $hero.toggleClass('menu-open');
    body.toggleClass('modal-open');
    body.removeClass('menu-open');
})

$menuClose.on('click', function(event) {
    event.preventDefault();
    $('.js-find').val('');
    $menuFind.removeClass('open');
    $hero.removeClass('menu-open');
    body.removeClass('menu-open');
    body.removeClass('modal-open');
    $header.removeClass('modal-open');
    $wrapper.removeClass('menu-open');
    $wrapper.removeClass('modal-open');
    $wrapper.css('padding-right', 0);
    $header.css('padding-right', 0);
})


const $videoPopup = $('.js-popup-video');

/**
 * Video popup.
 *
 * @type {String}
 */
$videoPopup.magnificPopup({
    type: 'iframe',
});

AOS.init({
  once: true
});

/**
 * Handle animations on scroll.
 *
 * @return {Boolean}
 */
$.fn.isOnScreen = function(){
    const win = $(window);

    let viewport = {
        top : win.scrollTop(),
        left : win.scrollLeft()
    };
    viewport.right = viewport.left + win.width();
    viewport.bottom = viewport.top + win.height();

    const bounds = this.offset();
    bounds.right = bounds.left + this.outerWidth();
    bounds.bottom = bounds.top + this.outerHeight();

    return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));
};

const $imageToAnimate = $('.js-image');

$imageToAnimate.each(function() {
	var position = $(window).scrollTop();
	const $this = $(this);

	$(window).on('scroll', function() {
	    const scroll = $(window).scrollTop();
		   if ($this.isOnScreen() == true) {
				$this.addClass('animated');
		   }
	});

	$(window).on('load', function() {
	   const scroll = $(window).scrollTop();

	   if ($this.isOnScreen() == true) {
			$this.addClass('animated');
	   }

	   position = scroll;
	});
})

const $movingText = $('.js-moving-text');

/**
 * Move text on scroll.
 *
 * @param  {obj}
 * @return {void}
 */
$(window).scroll(function() {
    const scroll = $(this).scrollTop();

	if (($(window).width() > 768) && ($movingText.isOnScreen() == true)) {
	    $movingText.css({
	        transform: "translateX(-" + scroll / 23 + "%)"
	    })
	} else {
	    $movingText.css({
	        transform: "translateX(-" + scroll / 10 + "%)"
	    })
	}
});

  /**
   * Disable enter key on search input.
   */
  $('#find').keypress(function(event) {
    if (event.keyCode == 13) {
      event.preventDefault();
    }
  });

});
