// Activate carousels
$(function () {
  // Services carousel
  (function () {
    const $owl = $(".services-carousel");
    const addOpacity = function (event) {
      const $owlItems = $(event.target).find(".owl-item");
      $owlItems.css("opacity", "0.3");
      const active = $owlItems.filter(".active");
      if (active.length === 1) {
        active.css("opacity", "1");
      } else {
        active.not(":last").css("opacity", "1");
      }
    };

    $owl.on("initialized.owl.carousel", addOpacity);
    $owl.on("drag.owl.carousel", addOpacity);
    $owl.on("translated.owl.carousel", addOpacity);

    $owl.owlCarousel({
      loop: false,
      margin: 30,
      nav: true,
      dots: false,
      merge: true,
      touchDrag: false,
      mouseDrag: false,
      navText: [
        '<img src="img/left.svg" alt="Arrow left"/>',
        '<img src="img/right.svg" alt="Arrow right" />',
      ],
      responsive: {
        0: {
          items: 1,
        },
        1000: {
          items: 2,
        },
      },
    });
  })();

  // Testimonials carousel
  $(".testimonials-carousel").owlCarousel({
    items: 1,
    loop: true,
    margin: 80,
    nav: true,
    dots: false,
    autoHeight: true,
    navText: [
      '<img src="img/left.svg" alt="Arrow left"/>',
      '<img src="img/right.svg" alt="Arrow right" />',
    ],
  });
});

// Activate YouTube players
$(function () {
  window.onYouTubeIframeAPIReady = function () {
    // Loads the IFrame Player API code asynchronously
    const tag = document.createElement("script");
    tag.src = "https://www.youtube.com/iframe_api";
    const firstScriptTag = document.getElementsByTagName("script")[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
  };
  window.onYouTubeIframeAPIReady();

  const players = [
    { id: "heroPlayer1", videoId: "D7SlK16o82o" },
    { id: "heroPlayer2", videoId: "TYfYX0ngLkE" },
    { id: "servicePlayer1", videoId: "5fzYJtuhueU" },
    { id: "servicePlayer2", videoId: "5d5aeIQaTUA" },
    { id: "servicePlayer3", videoId: "qOhk7YyxXQ4" },
    { id: "servicePlayer4", videoId: "lAyWhJ6tr9E" },
    { id: "worksPlayer1", videoId: "D7SlK16o82o" },
    { id: "worksPlayer2", videoId: "D7SlK16o82o" },
    { id: "worksPlayer3", videoId: "D7SlK16o82o" },
    { id: "worksPlayer4", videoId: "D7SlK16o82o" },
    { id: "worksPlayer5", videoId: "D7SlK16o82o" },
    { id: "worksPlayer6", videoId: "D7SlK16o82o" },
    { id: "worksPlayer7", videoId: "D7SlK16o82o" },
    { id: "worksPlayer8", videoId: "D7SlK16o82o" },
    { id: "worksPlayer9", videoId: "D7SlK16o82o" },
    { id: "worksPlayer10", videoId: "D7SlK16o82o" },
    { id: "worksPlayer11", videoId: "D7SlK16o82o" },
    { id: "worksPlayer12", videoId: "D7SlK16o82o" },
  ];

  let activePlayer = null;

  $(".player").click(function () {
    const $player = $(this).find(".player__object");
    $player.css({
      visibility: "visible",
      opacity: "1",
    });

    const playerId = $player.attr("id");

    new YT.Player(playerId, {
      height: "390",
      width: "640",
      videoId: players.find((player) => player.id === playerId).videoId,
      playerVars: {
        playsinline: 1,
      },
      events: {
        onReady: onPlayerReady,
        onStateChange: onPlayerStateChange,
      },
    });
  });

  function onPlayerReady(event) {
    event.target.playVideo();
  }

  // Stop current video when playing the next video
  function onPlayerStateChange(event) {
    if (event.data == YT.PlayerState.PLAYING) {
      if (activePlayer && activePlayer != event.target) {
        activePlayer.pauseVideo();
      }
      activePlayer = event.target;
    }
  }
});
