import mobileNav from "./modules/mobile-nav";
import trainersSlider from "./modules/trainers-slider";
import testimonialSlider from "./modules/testimonial-slider";
import initiatePhoneMask from "./modules/phone-mask";

mobileNav();
trainersSlider();
testimonialSlider();
initiatePhoneMask();

const currentYear = new Date().getFullYear();
document.getElementById("current-year").textContent = currentYear;
