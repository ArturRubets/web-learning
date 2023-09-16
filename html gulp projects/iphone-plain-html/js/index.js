document.addEventListener("DOMContentLoaded", function () {
  mobileNav();
});

function mobileNav() {
  const btn = document.querySelector(".mobile-nav-btn");
  const nav = document.querySelector(".mobile-nav");
  const navList = nav.querySelector(".nav__list");

  btn.onclick = toggleMobileNav;
  window.addEventListener("resize", handleResize);

  function toggleMobileNav() {
    // Add animation
    navList.classList.add("nav__list--animation");
    nav.classList.toggle("mobile-nav--active");
    document.body.classList.toggle("no-scroll");
  }

  function handleResize() {
    const btnDisplayStyle = window.getComputedStyle(btn).display;
    const isBtnHidden = btnDisplayStyle === "none";

    if (isBtnHidden) {
      // Remove animation
      navList.classList.remove("nav__list--animation");
      nav.classList.remove("mobile-nav--active");
      document.body.classList.remove("no-scroll");
    }
  }
}
