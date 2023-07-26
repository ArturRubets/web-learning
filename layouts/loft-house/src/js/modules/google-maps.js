const intersectionObserver = new IntersectionObserver((entries) => {
  for (const entry of entries) {
    if (entry.isIntersecting) {
      entry.target.classList.add("drop");
      intersectionObserver.unobserve(entry.target);
    }
  }
});

async function initMap() {
  // Request needed libraries.
  const { Map } = await google.maps.importLibrary("maps");
  const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");
  const { LatLng } = await google.maps.importLibrary("core");
  const center = new LatLng(53.40585101248494, -2.9782525);
  const map = new Map(document.getElementById("map"), {
    zoom: 15,
    center,
    mapId: "AIzaSyCndRzKmOmMyRacKku74usaGit1AXLJpbYx",
  });

  for (const property of properties) {
    const AdvancedMarkerElement = new google.maps.marker.AdvancedMarkerElement({
      map,
      content: buildContent(property),
      position: property.position,
      title: property.description,
    });

    AdvancedMarkerElement.addListener("click", () => {
      toggleHighlight(AdvancedMarkerElement, property);
    });
  }
}

function toggleHighlight(markerView, property) {
  if (markerView.content.classList.contains("highlight")) {
    markerView.content.classList.remove("highlight");
    markerView.zIndex = null;
  } else {
    markerView.content.classList.add("highlight");
    markerView.zIndex = 1;
  }
}

function buildContent(property) {
  const content = document.createElement("div");

  content.classList.add("property", "highlight");
  content.innerHTML = `
    <div class="icon">
        <i aria-hidden="true" class="fa fa-icon fa-${property.type}" title="${property.type}"></i>
        <span class="fa-sr-only">${property.type}</span>
    </div>
    <div class="details">
        <div class="price">${property.price}</div>
        <div class="address">${property.address}</div>
        <div class="features">
          <div>
              <i aria-hidden="true" class="fa fa-bed fa-lg bed" title="bedroom"></i>
              <span class="fa-sr-only">bedroom</span>
              <span>${property.bed}</span>
          </div>
          <div>
              <i aria-hidden="true" class="fa fa-bath fa-lg bath" title="bathroom"></i>
              <span class="fa-sr-only">bathroom</span>
              <span>${property.bath}</span>
          </div>
          <div>
              <i aria-hidden="true" class="fa fa-ruler fa-lg size" title="size"></i>
              <span class="fa-sr-only">size</span>
              <span>${property.size} ft<sup>2</sup></span>
          </div>
        </div>
    </div>
    `;

  // Add animated effect
  content.style.opacity = "0";
  content.addEventListener("animationend", (event) => {
    content.classList.remove("drop");
    content.style.opacity = "1";
  });
  const time = 2 + Math.random(); // 2s delay for easy to see the animation
  content.style.setProperty("--delay-time", time + "s");
  intersectionObserver.observe(content);

  return content;
}

const properties = [
  {
    address: "123 Lime Street, Liverpool",
    description: "Single family house with modern design",
    price: "£ 889,000",
    type: "home",
    bed: 5,
    bath: 4.5,
    size: 300,
    position: {
      lat: 53.40585101248494,
      lng: -2.9782525,
    },
  },
];

export default initMap;
