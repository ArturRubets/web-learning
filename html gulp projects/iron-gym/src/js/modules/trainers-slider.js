import Swiper from "swiper/bundle";
import "swiper/css/bundle";

function trainersSlider() {
  const swiper = new Swiper(".trainers__slider", {
    slidesPerView: 1,
    grabCursor: true,
    keyboard: {
      enabled: true,
    },
    breakpoints: {
      640: {
        slidesPerView: 2.5,
        spaceBetween: 20,
        slidesOffsetBefore: 40,
        slidesOffsetAfter: 40,
      },
      768: {
        slidesPerView: 3,
        spaceBetween: 30,
        slidesOffsetBefore: 78,
        slidesOffsetAfter: 78,
      },
      1024: {
        slidesPerView: 3.5,
        spaceBetween: 40,
        slidesOffsetBefore: 98,
        slidesOffsetAfter: 98,
      },
    },
    pagination: {
      el: ".trainers__slider-pagination",
      type: "bullets",
      bulletClass: "swiper__pagination-bullet", // Вказати клас для кожного квадратика
      bulletActiveClass: "swiper__pagination-bullet--active", // Вказати клас для активного квадратика
      clickable: true,
    },
  });
}

export default trainersSlider;
