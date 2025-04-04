// Fetch data from shop.json and generate cards
fetch("../../services/shop.json")
  .then((response) => response.json())
  .then((data) => {
    const cards = document.querySelector(".cards");
    const generateCardTemplate = (item) => `
      <div class="card" data-id="${item.id}">
        <div class="card-img">
          <a href="#">
            <img src="${item["src-front"]}" alt="..." style="position: unset;
            opacity: 1;
            visibility: visible;" />
          </a>
        </div>
        <div class="card-text">
          <a href="#">${item.title}</a><br />
          <span>$ ${item.price}</span>
        </div>
      </div>
    `;
    data.accessories.forEach((item) => {
      const card = generateCardTemplate(item);
      cards.insertAdjacentHTML("beforeend", card);
    });
    // Handle product card click
    const cardElements = document.querySelectorAll(".card");
    cardElements.forEach((cardElement) => {
      cardElement.addEventListener("click", () => {
        const productId = cardElement.getAttribute("data-id");
        window.location.href = `accessries-details.html?id=${productId}`;
      });
    });
  })
  .catch((error) => console.error(error));
