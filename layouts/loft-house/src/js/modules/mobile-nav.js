function mobileNav() {
  // Mobile nav button
  const navBtn = document.querySelector(".nav-icon-btn ");
  const nav = document.querySelector(".header__top-row");
  const menuIcon = document.querySelector(".nav-icon");

  navBtn.onclick = function () {
    nav.classList.toggle("header__top-row--mobile");
    menuIcon.classList.toggle("nav-icon--active");
    document.body.classList.toggle("no-scroll");
  };
}

export default mobileNav;
