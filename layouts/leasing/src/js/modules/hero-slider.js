import Swiper from "swiper/bundle";
import "swiper/css/bundle";

export default function initializeHeroSlider() {
  const swiper = new Swiper(".hero__slider", {
    slidesPerView: 1,
    grabCursor: true,
    loop: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    keyboard: {
      enabled: true,
    },
    pagination: {
      el: ".hero__slider-pagination",
      type: "bullets",
      bulletClass: "swiper__pagination-bullet", // Вказати клас для кожного квадратика
      bulletActiveClass: "swiper__pagination-bullet--active", // Вказати клас для активного квадратика
      clickable: true,
    },
  });
}
