$(function () {
  $(".top-slider").slick({
    dots: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    nextArrow:
      '<button type="button" class="slick-arrow slick-next"><div class="arrow-right"></div></button>',
    prevArrow:
      '<button type="button" class="slick-arrow slick-prev"><div class="arrow-left"></div></button>',
    responsive: [
      {
        breakpoint: 640,
        settings: {
          arrows: false,
        },
      },
    ],
  });

  $(".testimonial__slider").slick({
    dots: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    nextArrow: false,
    prevArrow: false,
  });

  $(".news__items").masonry({
    itemSelector: ".news__item",
    columnWidth: 270,
    gutter: 30,
    horizontalOrder: true,
    transitionDuration: "0.5s",
    fitWidth: true,
  });
});
