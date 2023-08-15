import Swiper from "swiper/bundle";
import "swiper/css/bundle";

function testimonialSlider() {
  const swiper = new Swiper(".testimonial__slider", {
    slidesPerView: 1,
    grabCursor: true,
    keyboard: {
      enabled: true,
    },
    pagination: {
      el: ".testimonial__slider-pagination",
      type: "bullets",
      bulletClass: "swiper__pagination-bullet", // Вказати клас для кожного квадратика
      bulletActiveClass: "swiper__pagination-bullet--active", // Вказати клас для активного квадратика
      clickable: true,
    },
    navigation: {
      nextEl: ".testimonial__button-next",
      prevEl: ".testimonial__button-prev",
    },
  });
}

export default testimonialSlider;
