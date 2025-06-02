(function($) {
  $(document).ready(function () {
    $('.outer-slider').on('init', function(event, slick){
      // Ініціалізація внутрішнього слайдера тільки в активному слайді
      initInnerSlider($(slick.$slides[slick.currentSlide]));
    });

    $('.outer-slider').on('afterChange', function(event, slick, currentSlide){
      // Перезапускаємо внутрішній слайдер в активному слайді
      initInnerSlider($(slick.$slides[currentSlide]));
    });

    $('.outer-slider').slick({
      arrows: false,
      dots: false,
      infinite: true,
      speed: 500,
      slidesToShow: 1,
      slidesToScroll: 1,
      // responsive: [
      //   {
      //     breakpoint: 768,
      //     settings: {
      //       adaptiveHeight:true,
      //     }
      //   },
      // ]
    });

    function enableMouseWheelScroll($inner) {
      $inner.on('wheel', function (e) {
        e.preventDefault(); // блокуємо скрол сторінки
        if (e.originalEvent.deltaY < 0) {
          $(this).slick('slickPrev');
        } else {
          $(this).slick('slickNext');
        }
      });
    }

    function initInnerSlider($outerSlide) {
      const $inner = $outerSlide.find('.inner-slider');
      const $wrapper = $outerSlide.find('.inner-slider-wrapper');
      const windowWidth = window.innerWidth;

      // Перевірка розміру вікна
      if (windowWidth < 768) {
        if ($inner.hasClass('slick-initialized')) {
          $inner.slick('unslick'); // Зупиняємо слайдер
        }
        return; // Якщо ширина екрану менше 768px, нічого не робимо далі
      }
      // Ініціалізація слайдера тільки, якщо він ще не ініціалізований
      if (!$inner.hasClass('slick-initialized')) {
        $inner.slick({
          arrows: false, // вимикаємо вбудовані стрілки
          dots: false,
          infinite: true,
          vertical: true,
          slidesToShow: 3,
          slidesToScroll: 1,
          margin: 20,
          swipe: true,
          verticalSwiping: true,
          draggable: true,
          touchMove: true,
        });
      }

      // Стрілки
      $wrapper.find('.inner-arrow.up').on('click', function () {
        $inner.slick('slickPrev');
      });

      $wrapper.find('.inner-arrow.down').on('click', function () {
        $inner.slick('slickNext');
      });

      enableMouseWheelScroll($inner);
    }

    // Перевірка при зміні розміру вікна
    $(window).on('resize', function() {
      $('.outer-slider').each(function () {
        initInnerSlider($(this)); // Оновлюємо внутрішній слайдер при ресайзі
      });
    });

    $('.pop-slider').slick({
      arrows: true,
      dots: true,
      infinite: true,
      speed: 500,
      slidesToShow: 4,
      slidesToScroll:2,
      // centerMode: true,
      margin: 10,
      prevArrow: '<button class="slick-prev custom-arrow"> <svg xmlns="http://www.w3.org/2000/svg" width="54" height="54" viewBox="0 0 54 54" fill="none"><path d="M42.75 27L11.25 27" stroke="#363535" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M27 42.75L11.25 27L27 11.25" stroke="#363535" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg> </button>',
      nextArrow: '<button class="slick-next custom-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="54" height="54" viewBox="0 0 54 54" fill="none"><path d="M11.25 27L42.75 27" stroke="#4E4E4E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M27 11.25L42.75 27L27 42.75" stroke="#4E4E4E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></button>',
      customPaging : function(slider, i) {
        return '<span class="dot"> </span>';
      },
      responsive: [
        {
          breakpoint: 1124,
          settings: {
            slidesToShow: 3,
            slidesToScroll:1,
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
            slidesToScroll:1,
          }
        },
        {
          breakpoint: 590,
          settings: {
            slidesToShow: 1,
            slidesToScroll:1,
          }
        },
      ]
    });
    $('.left-zone').on('click', function () {
      $('.pop-slider').slick('slickPrev');
    });

    $('.right-zone').on('click', function () {
      $('.pop-slider').slick('slickNext');
    });


    $('.portfolio-slider').slick({
      arrows: true,
      dots: false,
      infinite: true,
      speed: 500,
      slidesToShow: 1,
      slidesToScroll:1,
      prevArrow: '<button class="slick-prev custom-arrow"> <svg xmlns="http://www.w3.org/2000/svg" width="54" height="54" viewBox="0 0 54 54" fill="none"><path d="M42.75 27L11.25 27" stroke="#363535" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M27 42.75L11.25 27L27 11.25" stroke="#363535" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg> </button>',
      nextArrow: '<button class="slick-next custom-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="54" height="54" viewBox="0 0 54 54" fill="none"><path d="M11.25 27L42.75 27" stroke="#4E4E4E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M27 11.25L42.75 27L27 42.75" stroke="#4E4E4E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></button>',
    });
    $('.left-zone-port').on('click', function () {
      $('.portfolio-slider').slick('slickPrev');
    });

    $('.right-zone-port').on('click', function () {
      $('.portfolio-slider').slick('slickNext');
    });


    $('.sal-slider').slick({
      arrows: true,
      dots: true,
      infinite: true,
      speed: 500,
      slidesToShow: 4,
      margin:15,
      // adaptiveHeight: true,
      // variableWidth: true,
      // centerMode: true,
      slidesToScroll:1,
      // margin: 10,
      prevArrow: '<button class="slick-prev custom-arrow"> <svg xmlns="http://www.w3.org/2000/svg" width="54" height="54" viewBox="0 0 54 54" fill="none"><path d="M42.75 27L11.25 27" stroke="#363535" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M27 42.75L11.25 27L27 11.25" stroke="#363535" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg> </button>',
      nextArrow: '<button class="slick-next custom-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="54" height="54" viewBox="0 0 54 54" fill="none"><path d="M11.25 27L42.75 27" stroke="#4E4E4E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M27 11.25L42.75 27L27 42.75" stroke="#4E4E4E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></button>',
      customPaging : function(slider, i) {
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


    $('.col-slider').slick({
      arrows: true,
      dots: false,
      infinite: true,
      speed: 500,
      slidesToShow: 5,
      margin: 10,
      slidesToScroll:1,
      prevArrow: '<button class="slick-prev custom-arrow"> <svg xmlns="http://www.w3.org/2000/svg" width="54" height="54" viewBox="0 0 54 54" fill="none"><path d="M42.75 27L11.25 27" stroke="#363535" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M27 42.75L11.25 27L27 11.25" stroke="#363535" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg> </button>',
      nextArrow: '<button class="slick-next custom-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="54" height="54" viewBox="0 0 54 54" fill="none"><path d="M11.25 27L42.75 27" stroke="#4E4E4E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M27 11.25L42.75 27L27 42.75" stroke="#4E4E4E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></button>',
      customPaging : function(slider, i) {
        return '<span class="dot"> </span>';
      },
      responsive: [
        {
          breakpoint: 1124,
          settings: {
            slidesToShow: 4
          }
        },
        {
          breakpoint: 988,
          settings: {
            slidesToShow: 3
          }
        },
        {
          breakpoint: 780,
          settings: {
            slidesToShow: 1,
            dots: true,
          }
        }
      ]
    });
    $('.left-zone-col').on('click', function () {
      $('.col-slider').slick('slickPrev');
    });

    $('.right-zone-col').on('click', function () {
      $('.col-slider').slick('slickNext');
    });

  });
})(jQuery);

document.addEventListener("DOMContentLoaded", function () {
  const btn = document.querySelector(".spoiler-btn");
  const more = document.querySelector(".spoiler-more");

  btn.addEventListener("click", function () {
    if (more.style.display === "block") {
      more.style.display = "none";
      btn.textContent = btn.getAttribute("data-text-more");
    } else {
      more.style.display = "block";
      btn.textContent = btn.getAttribute("data-text-less");
    }
  });
});