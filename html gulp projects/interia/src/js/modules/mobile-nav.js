export default function mobileNav() {
  const btn = document.querySelector(".mobile-nav-btn");
  const nav = document.querySelector(".mobile-nav");

  btn.onclick = toggleMobileNav;
  window.addEventListener("resize", handleResize);

  function toggleMobileNav() {
    btn.classList.toggle("mobile-nav-btn--active");
    nav.classList.toggle("mobile-nav--active");
    document.body.classList.toggle("no-scroll");
  }

  function handleResize() {
    const btnDisplayStyle = window.getComputedStyle(btn).display;
    const isBtnHidden = btnDisplayStyle === "none";

    if (isBtnHidden) {
      btn.classList.remove("mobile-nav-btn--active");
      nav.classList.remove("mobile-nav--active");
      document.body.classList.remove("no-scroll");
    }
  }
}
