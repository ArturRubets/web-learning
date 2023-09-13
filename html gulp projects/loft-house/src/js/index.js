import mobileNav from "./modules/mobile-nav.js";
mobileNav();

import initMap from "./modules/google-maps.js";
initMap();

/* Phone Mask */
mask("[data-tel-input]");

// Remove '+' if nothing else is entered to show placeholder
const phoneInputs = document.querySelectorAll("[data-tel-input]");
phoneInputs.forEach((input) => {
  input.addEventListener("input", () => {
    if (input.value == "+") input.value = "";
  });
  input.addEventListener("blur", () => {
    if (input.value == "+") input.value = "";
  });
});
