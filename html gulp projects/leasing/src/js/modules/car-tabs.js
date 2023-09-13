export default function carTabs() {
  const tabs = document.querySelectorAll(".choose-car__tab");
  const carCards = document.querySelectorAll(".choose-car__cards");

  tabs.forEach((tab) => {
    tab.onclick = () => {
      // Якщо натиснутий таб є активним то не робимо ніяких дій
      if (tab.classList.contains("choose-car__tab--active")) {
        return;
      }

      // Всі таби робимо не активними
      tabs.forEach((tab) => {
        tab.classList.remove("choose-car__tab--active");
      });

      // Натиснутий таб робимо активним
      tab.classList.add("choose-car__tab--active");

      // Вибрана категорія
      const carCategory = tab.getAttribute("data-car-category");

      // Показати оновлену інформацію
      displayCars(carCategory);
    };
  });

  displayCars();

  function displayCars(carCategory = 1) {
    // Видалити активний клас
    carCards.forEach((card) => {
      card.classList.remove("choose-car__cards--active");
    });

    // Додати аквтиний клас
    carCards.forEach((card) => {
      if (card.getAttribute("data-car-category") == carCategory) {
        card.classList.add("choose-car__cards--active");
      }
    });
  }
}
