(function ($) {
    function initSlickIfMobile() {
        const $slider = $('.pics-part');

        if (window.innerWidth < 768) {
            if (!$slider.hasClass('slick-initialized')) {
                $slider.slick({
                    dots: true,
                    arrows: false,
                    infinite: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    centerMode: true,
                    mobileFirst: true,
                    customPaging: function (slider, i) {
                        return '<span class="dot"> </span>';
                    },
                });
            }
        } else {
            if ($slider.hasClass('slick-initialized')) {
                $slider.slick('unslick');
            }
        }
    }

    $(document).ready(function () {
        initSlickIfMobile();
        $(window).on('resize', initSlickIfMobile);
    });


    $('.sal-slider').slick({
        arrows: false,
        dots: true,
        infinite: true,
        speed: 500,
        slidesToShow: 4,
        margin: 15,
        slidesToScroll: 1,
        prevArrow: '<button class="slick-prev custom-arrow"> <svg xmlns="http://www.w3.org/2000/svg" width="54" height="54" viewBox="0 0 54 54" fill="none"><path d="M42.75 27L11.25 27" stroke="#363535" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M27 42.75L11.25 27L27 11.25" stroke="#363535" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg> </button>',
        nextArrow: '<button class="slick-next custom-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="54" height="54" viewBox="0 0 54 54" fill="none"><path d="M11.25 27L42.75 27" stroke="#4E4E4E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M27 11.25L42.75 27L27 42.75" stroke="#4E4E4E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></button>',
        customPaging: function (slider, i) {
            return '<span class="dot"> </span>';

        },
        responsive: [
            {
                breakpoint: 1124,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 590,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });
    $('.left-zone-s').on('click', function () {
        $('.sal-slider').slick('slickPrev');
    });

    $('.right-zone-s').on('click', function () {
        $('.sal-slider').slick('slickNext');
    });
})(jQuery);