

// $.noConflict();
// jQuery(document).ready(function () {
//     jQuery("button").click(function () {
//         jQuery("p").text("jQuery is still working!");
//     });
// });





// ---------- Slick sliders ----------

jQuery(document).ready(function ($) {


    $('.slider-one').on('init', function (event, slick, currentSlide) {

        let element = document.getElementById('slider-one-link');
        let slides = slick.$slides.get(currentSlide);
        let title = slides[0].dataset.title;
        element.innerHTML = title;

        let url = slides[0].dataset.link;
        element.href = url;

    })
})

jQuery(document).ready(function ($) {

    $('.slider-one').slick({
        slide: '.slider-one-element',
        slidesToShow: 1,
        slideToScroll: 1,
        arrows: false,
        dots: false,
        Infinity: true,
        useTransform: false,
    })


    $('.slide-prev').click(function (e) {
        $('.slider-one').slick('slickPrev');
    });

    $('.slide-next').click(function (e) {
        $('.slider-one').slick('slickNext');
    })


    let element = document.getElementById('slider-one-link');

    $('.slider-one').on('init afterChange', function (event, slick, currentSlide) {

        let slide = slick.$slides.get(currentSlide);
        let title = slide.dataset.title;
        element.innerHTML = title;

        let url = slide.dataset.link;
        element.href = url;
    })

})


// jQuery(document).ready(function ($) {

//     const SLICK_SETTINGS = {
//         dots: true,
//         arrows: false,
//         slidesPerRow: 2,
//         rows: 2,
//         slidesToScroll: 1,
//     }


//     $('.slider-two').slick(SLICK_SETTINGS);


//     $('.slide-prev2').click(function (e) {
//         $('.slider-two').slick('slickPrev');
//     });

//     $('.slide-next2').click(function (e) {
//         $('.slider-two').slick('slickNext');
//     })



//     $('.filter-name').on('click', function (event) {


        
//         let activeFilter = event.target
//         let activeFilterValue = activeFilter.dataset.filter;
//         let slidesArray = document.getElementsByClassName('projects-block-element');

//         if (activeFilterValue == 'all') {

//             $('.slider-two')[0].slick.refresh();
           
//             for (i = 0; i < slidesArray.length; i++) {
//                 slidesArray[i].style.display = 'inline-block';
//             }
//         } else {


//             $('.slider-two')[0].slick.refresh();

             
//             for (i = 0; i < slidesArray.length; i++) {
//                 let slideFilters= slidesArray[i].dataset.filter;
//                 let slideFiltersValues = slideFilters.split(' ');
//                 let flag = false;



//                 for (j = 0; j < slideFiltersValues.length; j++) {
//                     if (activeFilterValue[0] == slideFiltersValues[j]) {

//                         flag = true;
//                         break;
//                     }
//                 }

//                 if (flag == false) {
//                     slidesArray[i].style.display = 'none';
//                 }
//             }

        

            
//         }


//     });


// })



jQuery(document).ready(function($) {
	$('.slider-two').slickFilterable({
    	filterName: 'filter',
      filter: function( category, slider, settings ) {
      	return $(this).hasClass( category );
      },
    	slick: {
        dots: true,
        arrows: false,
        slidesPerRow: 2,
        rows: 2,
        slidesToScroll: 1,
        }
	});
});

(function( $ ) {
    $.fn.slickFilterable = function( options ) {

        /**
         * A plugin to create a slick we can filter.
         *
         * If you are not using Rows you can use slickFilter
         * (check documentation) otherwise we can provide a valid filter.
         *
         * options {
         *      slideSelector    string     jQuery selector to get slides. Imetiate children by default.
         *      filterName       string     We will search for data-{filterName} clickable elements.
         *      slick            object     The slick settings. Check Slick doc.
         *      beforeFilter     function   A fuction called before filter slider. Receives the trigger element
         *                                  as this and 3 params: category (string), slider and slides (jQuery objects).
         *      filter           mix        A valid parameter to jQuery filter() function. If it's a functio we will wrap
         *                                  it and it receives the trigger element as this and 3 params: category (string),
         *                                  slider (jQuery object) and a copy of settings (extended).
         * }
         */
        let settings = $.extend({
            slideSelector: '> *',
            filterName: 'filter',
            slick: {},
            beforeFilter: function() {},
            filter: function( element, category, slider, settings ) { return true; },
        }, options );

        return this.each(function() {
            let slider = $(this),
                slides = slider.find( settings.slideSelector ),
                slickObj;

            /**
             * Create Slick
             *
             * TIP: you should you 'slidesPerRow' instead 'slidesToShow' in grid mode (with rows)
             * to avoid slick break layout when there are less slides than on "page".
             */
            slickObj = slider.slick( settings.slick );

            // Handle Filter Click
            $('[data-' + settings.filterName + ']').on('click', function(event) {
                
                event.preventDefault();

                let category = $(this).data(settings.filterName),
                    newSlides = $.extend(true, {}, slides),
                    newSlickOptions;

                if ( ! category ) return;

                // Before Filter Slides
                if ( typeof settings.beforeFilter == 'function' ) {
                    settings.beforeFilter.call(this, category, slider, slides);
                }

                // Destroy and empty
                slider.slick('unslick');

                // Recreate All Slides
                if ( category === 'all' ) {
                    slider.find( settings.slideSelector ).remove();
                    slider.append( newSlides );
                    slider.slick( settings.slick );

                    return;
                }

                /**
                 * Filter Slides
                 *
                 * If settings.filter is a function we pass the category, slider and a copy of settings
                 * expecting a true or false return to pass it to jQuery.filter();
                 *
                 * If not, we just pass it directly.
                 */
                if ( typeof settings.filter !== 'function' ) {
                    newSlides = newSlides.filter( settings.filter );
                } else {
                    newSlides = newSlides.filter( function() {
                        return settings.filter.call( this, category, slider, $.extend( true, {}, settings ) );
                    } );
                }

                slider.find( settings.slideSelector ).remove();
                slider.append( newSlides );
                slider.slick( settings.slick );
            });
        });
    };
}(jQuery));