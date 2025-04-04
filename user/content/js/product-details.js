const urlParams = new URLSearchParams(window.location.search);
const productId = urlParams.get("id");
fetch("../../services/shop.json")
  .then((response) => response.json())
  .then((data) => {
    const product = data.men.find((product) => product.id === +productId);
    const productDetails = document.querySelector(".product-details__content");
    const productTemplate = `
    <div class="product-details__content__img">
      <img src="${product["src-front"]}" alt="..." />
    </div>
    <div class="product-details__content__text">
      <div class="header">
        <h3>${product.title}</h3>
        <p>$${product.price}</p>
      </div>
      <hr />
      <div class="fabric">
        <p>Fabric Content:</p>
        <ul>
          <li><span>Small-2X: 70% Cotton / 30% Polyester</span></li>
          <li><span>3X-5X: 50% Cotton / 50% Polyester</span></li>
        </ul>
      </div>
      <form>
        <div class="size">
          <span>Size:</span>
          <select id="size" class="size-select">
            <option value="X">X</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
            <option value="2X" selected>2X</option>
            <option value="3X">3X</option>
            <option value="4X">4X</option>
            <option value="5X">5X</option>
          </select>
        </div>
        <div class="quantity">
          <span>Quantity:</span>
          <div class="quantity-input">
            <span class="quantity-btn minus" data-action="minus">-</span>
            <input
              type="number"
              id="quantity"
              name="quantity"
              min="1"
              max="10"
              value="1"
            />
            <span class="quantity-btn plus" data-action="plus">+</span>
          </div>
        </div>
        <div class="submit">
          <button type="submit" value="submit">ADD TO CART</button>
        </div>
      </form>
    </div>
    `;
    productDetails.innerHTML = productTemplate;
    // Form Data
    const myForm = document.querySelector("form");
    myForm.addEventListener("submit", (event) => {
      event.preventDefault();
      const quantity = document.querySelector("#quantity").value;
      const size = document.querySelector("#size").value;
      const price = product.price;
      const title = product.title;
      const imgSrc = product["src-front"];
      let cartItems = JSON.parse(localStorage.getItem("cartItems")) || [];
      const existingCartItemIndex = cartItems.findIndex(
        (item) => item.title === title && item.size === size
      );
      if (existingCartItemIndex > -1) {
        // if item already exists in cart, update the quantity
        cartItems[existingCartItemIndex].quantity = parseInt(quantity);
      } else {
        // if item does not exist in cart, add it as a new item
        const cartItem = {
          size: size,
          price: price,
          quantity: quantity,
          title: title,
          imgSrc: imgSrc,
        };
        cartItems.push(cartItem);
      }
      localStorage.setItem("cartItems", JSON.stringify(cartItems));
      // Navigate to the new page with the form data in the URL
      window.location.href = "cart.html";
    });
  })
  .catch((error) => console.error(error));

// quantity-input
window.addEventListener("load", function () {
  let plus = document.querySelector(".plus");
  let minus = document.querySelector(".minus");
  let quantityInput = document.querySelector("#quantity");

  console.log(plus, minus, quantityInput);
  plus.addEventListener("click", () => {
    if (quantityInput.value < 10) {
      ++quantityInput.value;
    }
  });
  minus.addEventListener("click", () => {
    if (quantityInput.value > 1) {
      --quantityInput.value;
    }
  });
});
