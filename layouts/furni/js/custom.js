(function name() {
  "use strict";

  const tinySlider = function () {
    const el = document.querySelectorAll(".testimonial-slider");

    if (el.length > 0) {
      const slider = tns({
        container: ".testimonial-slider",
        items: 1,
        axis: "horizontal",
        controlsContainer: ".testimonial-nav",
        swipeAngle: false,
        speed: 700,
        nav: true,
        controls: true,
        autoplay: true,
        autoplayHoverPause: true,
        autoplayTimeout: 3500,
        autoplayButtonOutput: false,
      });
    }
  };

  tinySlider();
})();
