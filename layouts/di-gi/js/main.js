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

  let slideIndex = 1;
  const $modal = $(".modal");
  const $body = $("body");
  const $modalSlides = $(".modal__slide");
  const $captionText = $(".modal__caption-content").eq(0);

  $(".project__item-gallery__icon").click(function (event) {
    event.preventDefault();
    slideIndex = Number($(this).data("indexNumber"));
    openModal();
    showSlides(slideIndex);
  });

  $(".modal__close").click(function () {
    closeModal();
  });

  $(".modal__prev").click(function () {
    plusSlides(-1);
  });

  $(".modal__next").click(function () {
    plusSlides(1);
  });

  function openModal() {
    $modal.css("display", "block");
    $body.css("overflow", "hidden");
  }

  // Close the Modal
  function closeModal() {
    $modal.css("display", "none");
    $body.css("overflow", "auto");
  }

  // Next/previous controls
  function plusSlides(n) {
    showSlides((slideIndex += n));
  }

  function showSlides(n) {
    if (n > $modalSlides.length) {
      slideIndex = 1;
    }
    if (n < 1) {
      slideIndex = $modalSlides.length;
    }
    $modalSlides.css("display", "none");
    $modalSlides.eq(slideIndex - 1).css("display", "block");

    const altValue = $modalSlides
      .eq(slideIndex - 1)
      .find(".modal__image")
      .attr("alt");
    $captionText.html(altValue);
  }
});
