export default function initializeHeroVideo() {
  document.getElementById("playButton").addEventListener("click", function () {
    const videoElement = document.querySelector(".hero__video");
    const posterElement = document.querySelector(".hero__poster");

    const overlayDiv = document.createElement("div");
    overlayDiv.className = "hero__overlay";

    // Додаємо overlay елемент після відео
    videoElement.parentNode.insertBefore(overlayDiv, videoElement.nextSibling);

    videoElement.play();

    // Ховаємо playButton
    this.style.display = "none";
    // Анімовано ховаємо poster
    posterElement.style.opacity = 0;
  });
}
