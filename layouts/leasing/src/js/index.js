import mobileNav from "./modules/mobile-nav.js";
import initializeHeroSlider from "./modules/hero-slider.js";
import carTabs from "./modules/car-tabs.js";

document.addEventListener("DOMContentLoaded", function () {
  mobileNav();
  initializeHeroSlider();
  carTabs();
});
