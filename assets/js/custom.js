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
	(function() {
		$('.flexslider-story').flexslider({
			animation: "slide",
			smoothHeight: true,
			slideshowSpeed: 10000,
			pauseOnAction: true
			// start: function() {
	  //           var height = $(".flexslider-story ul.slides").first().height();
	  //           console.log(height);
	  //       }
			
		}); // end register 
	}());


/*
	*
	*	A Function to sniff url params
	*
	------------------------------------*/
(function() {
    var params = null;
    this.l = typeof Location !== "undefined" ? Location.prototype : window.location;
    this.l.getParameter = function(name) {
        return Array.prototype.slice.apply(this.getParameterValues(name))[0];
    };
    this.l.getParameterMap = function() {
        if (params === null) {
            params = {};
            this.search.substr(1).split("&").map(function(param) {
                if (param.length === 0) return;
                var parts = param.split("=", 2).map(decodeURIComponent);
                if (!params.hasOwnProperty(parts[0])) params[parts[0]] = [];
                params[parts[0]].push(parts.length == 2 ? parts[1] : null);
            });
        }
        return params;
    };
    this.l.getParameterNames = function() {
        var map = this.getParameterMap(), names = [];
        for (var name in map) {
            if (map.hasOwnProperty(name)) names.push(name);
        }
        return names;
    };
    this.l.getParameterValues = function(name) {
        return this.getParameterMap()[name];
    };
})();

/*
	*
	*	Smooth Scroll to the assignments when the url param exsits.
	*
	------------------------------------*/
	if (typeof location.getParameter("focus_area") !== "undefined") {

		//console.log('smooth scroll works');
    	$('html, body').animate({
	        scrollTop: $("#assignments").offset().top
		}, 2000);
	}
	


	(function() {
	 
	  // store the slider in a local variable
	  var $window = $(window),
	      flexslider;
	 
	  // tiny helper function to add breakpoints
	  function getGridSize() {
	    return (window.innerWidth < 600) ? 1 :
	           (window.innerWidth < 900) ? 2 : 3;
	  }
	 
	  // $(function() {
	  //   SyntaxHighlighter.all();
	  // });
	 
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
	*	Make last word in H1 red
	*
	------------------------------------*/
	$('.js-two-word').each(function(index, element) {
        var heading = $(element);
        var word_array, last_word, first_part;

        word_array = heading.html().split(/\s+/); // split on spaces
        last_word = word_array.pop();             // pop the last word
        first_part = word_array.join(' ');        // rejoin the first words together

        heading.html([first_part, ' <br>', last_word, '</span>'].join(''));
    });

	/*
	*
	*	Colorbox
	*
	------------------------------------*/
	$('a.professionals').colorbox({
		// inline:true,
		iframe: true,
		rel: 'people',
		width: '100%', 
		height: '100%',
		// scrolling: true
		 //fixed: true
	});
	$(document).bind('cbox_open', function() {
	    $('html').css({ overflow: 'hidden' });
	}).bind('cbox_closed', function() {
	    $('html').css({ overflow: '' });
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
	/*
	*
	*	Capability Tabs
	*
	------------------------------------*/
	$('ul.tabs').each(function(){
    // For each set of tabs, we want to keep track of
    // which tab is active and its associated content
    var $active, $content, $links = $(this).find('a');

    // If the location.hash matches one of the links, use that as the active tab.
    // If no match is found, use the first link as the initial active tab.
    $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
    $active.addClass('active');

    $content = $($active[0].hash);

    // Hide the remaining content
    $links.not($active).each(function () {
      $(this.hash).hide();
    });

    // Bind the click event handler
    $(this).on('click', 'a', function(e){
      // Make the old tab inactive.
      $active.removeClass('active');
      $content.hide();

      // Update the variables with the new link and content
      $active = $(this);
      $content = $(this.hash);

      // Make the tab active.
      $active.addClass('active');
      $content.show();

      // Prevent the anchor's default click action
      e.preventDefault();
    });
  });

});// END #####################################    END

jQuery(window).load(function ($) {
	/*
	*
	*	Nice Page Scroll

	!!!!!!!!! IF you uncomment, add it to the gulp file
	*
	------------------------------------*/
	// (function() {
	// 	$("html").niceScroll();
	// }());
});// END #####################################    END