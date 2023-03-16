

// $.noConflict();
// jQuery(document).ready(function () {
//     jQuery("button").click(function () {
//         jQuery("p").text("jQuery is still working!");
//     });
// });





// ---------- Slick sliders ----------

jQuery(document).ready(function ($) {

    
    $('.slider-one').on('init', function(event, slick, currentSlide){

        let element = document.getElementById('slider-one-link');
        let slides = slick.$slides.get(currentSlide);
        let title = slides[0].dataset.title;
        element.innerHTML = title;

        let url = slides[0].dataset.link;
        element.href = url;

    });
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
    });
    

    $('.slide-prev').click(function (e) {
        $('.slider-one').slick('slickPrev');
    });

    $('.slide-next').click(function (e) {
        $('.slider-one').slick('slickNext');
    });


    let element = document.getElementById('slider-one-link');

    $('.slider-one').on('init afterChange', function (event, slick, currentSlide) {

        let slide= slick.$slides.get(currentSlide);
        let title = slide.dataset.title;
        element.innerHTML = title;

        let url = slide.dataset.link;
         element.href = url;
    });

})
