

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


jQuery(document).ready(function ($) {

    $('.slider-two').slick({
        dots: true,
        arrows: false,
        slidesPerRow: 2,
        rows: 2,
        slidesToScroll: 1,
    });


    $('.slide-prev2').click(function (e) {
        $('.slider-two').slick('slickPrev');
    });

    $('.slide-next2').click(function (e) {
        $('.slider-two').slick('slickNext');
    })


    // let filters = document.getElementsByClassName('filter-name');
    // let filtersArray = [];
    // for (i = 0; i < filters.length; i++) {
    //     let element = filters[i].className;
    //     filtersArray.push(element);
    // }

    // console.log(filtersArray)


    $('.filter-name').on('click', function (event) {
        
        let element = event.target
        let elementClass = element.className;
        let atributes = elementClass.split(' ');

        let index = atributes.indexOf('filter-name');
        if (index !== -1) {
            atributes.splice(index, 1);
        }
        

        let slidesArray = document.getElementsByClassName('projects-block-element');

        for(i = 0; i < slidesArray.length; i++) {
            let slideClass = slidesArray[i].className;
            let slideAtributes = slideClass.split(' ');

            slidesArray[i].style.display = "none";

            for(j = 0; j < slideAtributes.length; j++) {
                for (k = 0; k < atributes.length; k++) {
                    if (slideAtributes[j] == atributes[k]) {
                        slidesArray[i].style.display = 'inline-block';
        
                    }
                }
            }
        }

        $('.slider-two').slick({
            dots: true,
            arrows: false,
            slidesPerRow: 2,
            rows: 2,
            slidesToScroll: 1,
        });
    




    });

    // filters.forEach(element => {
    //     console.log(element);
    // });

    // var filtered = false;

    // $('.js-filter').on('click', function () {
    //     if (filtered === false) {
    //         $('.filtering').slick('slickFilter', ':even');
    //         $(this).text('Unfilter Slides');
    //         filtered = true;
    //     } else {
    //         $('.filtering').slick('slickUnfilter');
    //         $(this).text('Filter Slides');
    //         filtered = false;
    //     }
    // });

})