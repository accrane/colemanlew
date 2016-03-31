/**
 *	Custom jQuery Scripts
 *	
 *	Developed by: Austin Crane	
 *	Designed by: Austin Crane
 */

jQuery(document).ready(function ($) {
	
	/*
	*
	*	Current Page Active
	*
	------------------------------------*/
	$("[href]").each(function() {
    if (this.href == window.location.href) {
        $(this).addClass("active");
        }
	});

	/*
	*
	*	Assignment Links Toggle the Class
	*
	------------------------------------*/
	$('.js-filter-button').on('click', function(e) {
      $('.assignment-links').toggleClass("js-toggled-off js-toggled-on"); //toggle class
      e.preventDefault();
    });
	/*
	*
	*	Flexslider
	*
	------------------------------------*/
	// $('.flexslider').flexslider({
	// 	animation: "slide",
	// }); // end register 
	(function() {
	 
	  // store the slider in a local variable
	  var $window = $(window),
	      flexslider;
	 
	  // tiny helper function to add breakpoints
	  function getGridSize() {
	    return (window.innerWidth < 600) ? 1 :
	           (window.innerWidth < 900) ? 2 : 3;
	  }
	 
	  $(function() {
	    SyntaxHighlighter.all();
	  });
	 
	  $window.load(function() {
	    $('.flexslider').flexslider({
	      animation: "slide",
	      animationLoop: false,
	      itemWidth: 210,
	      itemMargin: 30,
	      minItems: getGridSize(), // use function to pull in initial value
	      maxItems: getGridSize() // use function to pull in initial value
	    });
	  });
	 
	  // check grid size on resize event
	  $window.resize(function() {
	    var gridSize = getGridSize();
	 
	    flexslider.vars.minItems = gridSize;
	    flexslider.vars.maxItems = gridSize;
	  });
	}());
	
	/*
	*
	*	Make last word in H1 red
	*
	------------------------------------*/
	$('.js-last-word').each(function(index, element) {
        var heading = $(element);
        var word_array, last_word, first_part;

        word_array = heading.html().split(/\s+/); // split on spaces
        last_word = word_array.pop();             // pop the last word
        first_part = word_array.join(' ');        // rejoin the first words together

        heading.html([first_part, ' <span class="last-word">', last_word, '</span>'].join(''));
    });
	/*
	*
	*	Make a Break in the title off the fist word
	*
	*	For Process Steps page
	*
	------------------------------------*/
    $('.js-first-word').each(function(index, element) {
        var heading = $(element);
        var word_array, last_word, first_part;

        word_array = heading.html().split(/\s+/); // split on spaces
        last_word = word_array.shift();             // shift the first word
        first_part = word_array.join(' ');        // rejoin the first words together

        heading.html([last_word, '<br> ', first_part].join(''));
    });

	/*
	*
	*	Colorbox
	*
	------------------------------------*/
	$('a.gallery').colorbox({
		rel:'gal',
		width: '80%', 
		height: '80%'
	});
	
	/*
	*
	*	Isotope with Images Loaded
	*
	------------------------------------*/
	var $container = $('#container').imagesLoaded( function() {
  	$container.isotope({
    // options
	 itemSelector: '.item',
		  masonry: {
			gutter: 15
			}
 		 });
	});

	/*
	*
	*	Smooth Scroll to Anchor
	*
	------------------------------------*/
	 $('a').click(function(){
	    $('html, body').animate({
	        scrollTop: $('[name="' + $.attr(this, 'href').substr(1) + '"]').offset().top
	    }, 500);
	    return false;
	});

	/*
	*
	*	Nice Page Scroll
	*
	------------------------------------*/
	$(function(){	
		$("html").niceScroll();
	});
	
	
	/*
	*
	*	Equal Heights Divs
	*
	------------------------------------*/
	$('.js-blocks').matchHeight();
	$('.js-paragraph').matchHeight();
	$('.js-title').matchHeight();

	/*
	*
	*	Wow Animation
	*
	------------------------------------*/
	new WOW().init();


	/*
	*
	*	Sticky Contact
	*
	------------------------------------*/
	$("#sticky").sticky({topSpacing:20});

});// END #####################################    END