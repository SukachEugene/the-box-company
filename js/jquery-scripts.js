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



// Base of this code from: https://jsfiddle.net/mariovalney/L8b2d0ox

jQuery(document).ready(function ($) {
    $('.slider-two').slickFilterable({
        filterName: 'filter',
        filter: function (category, slider, settings) {
            console.log()
            return $(this).hasClass(category);
        },
        slick: {
            dots: true,
            arrows: false,
            slidesPerRow: 2,
            rows: 2,
            slidesToScroll: 1,
            // touchMove: false,
            swipe: false,
            responsive: [
                {
                  breakpoint: 800,
                  settings: {
                    touchMove: true,
                    slidesPerRow: 1,
                    dots: false,
                  }
                }
              ]
        }
        
    });


    $('.slide-prev2').click(function (e) {
        $('.slider-two').slick('slickPrev');
    });

    $('.slide-next2').click(function (e) {
        $('.slider-two').slick('slickNext');
    })

});

(function ($) {
    $.fn.slickFilterable = function (options) {

        let settings = $.extend({
            slideSelector: '> *',
            filterName: 'filter',
            slick: {},
            beforeFilter: function () { },
            filter: function (element, category, slider, settings) { return true; },
        }, options);

        return this.each(function () {
            let slider = $(this),
                slides = slider.find(settings.slideSelector),
                slickObj;

            slickObj = slider.slick(settings.slick);

            // Handle Filter Click
            $('[data-' + settings.filterName + ']').on('click', function (event) {

                event.preventDefault();

                let category = $(this).data(settings.filterName),
                    newSlides = $.extend(true, {}, slides),
                    newSlickOptions;

                if (!category) return;

                // Before Filter Slides
                if (typeof settings.beforeFilter == 'function') {
                    settings.beforeFilter.call(this, category, slider, slides);
                }

                // Destroy and empty
                slider.slick('unslick');

                // Recreate All Slides
                if (category === 'all') {
                    slider.find(settings.slideSelector).remove();
                    slider.append(newSlides);
                    slider.slick(settings.slick);

                    return;
                }


                if (typeof settings.filter !== 'function') {
                    newSlides = newSlides.filter(settings.filter);
                } else {
                    newSlides = newSlides.filter(function () {
                        return settings.filter.call(this, category, slider, $.extend(true, {}, settings));
                    });
                }

                slider.find(settings.slideSelector).remove();
                slider.append(newSlides);
                slider.slick(settings.slick);
            });
        });
    };
}(jQuery));

