// get data
const cartItems = JSON.parse(localStorage.getItem("cartItems"));

// Remove item from cart based on index
function removeItemFromCart(index) {
  cartItems.splice(index, 1);
  localStorage.setItem("cartItems", JSON.stringify(cartItems));

  // Rebuild cart table without the removed item
  const cartTable = document.querySelector("tbody");
  cartTable.innerHTML = "";
  cartItems.forEach((cartItem, index) => {
    const cartRow = `
      <tr>
        <td class="product">
          <div class="product-image">
            <img src="${cartItem.imgSrc}" alt="Product Image" />
          </div>
          <div class="product-info">
            <h3 class="product-name">${cartItem.title}</h3>
            <p class="product-size">${cartItem.size}</p>
          </div>
        </td>
        <td class="product-price">$${cartItem.price}</td>
        <td>
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
                value="${cartItem.quantity}"
              />
              <span class="quantity-btn plus" data-action="plus">+</span>
            </div>
            <button onclick="removeItemFromCart(${index})">Remove</button>
          </div>
        </td>
        <td class="product-subtotal">$ ${
          cartItem.quantity * cartItem.price
        }</td>
      </tr>
    `;
    cartTable.innerHTML += cartRow;
  });

  // Recalculate cart total
  calculateTotal();
}

const cartTable = document.querySelector("tbody");
cartItems.forEach((cartItem, index) => {
  // let subTotal = cartItem.price * quantityInput;
  if (cartItem.size == undefined) {
    cartItem.size = ``;
  }
  const cartRow = `
    <tr>
      <td class="product">
        <div class="product-image">
          <img src="${cartItem.imgSrc}" alt="Product Image" />
        </div>
        <div class="product-info">
          <h3 class="product-name">${cartItem.title}</h3>
          <p class="product-size">${cartItem.size}</p>
        </div>
      </td>
      <td class="product-price">$${cartItem.price}</td>
      <td>
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
              value="${cartItem.quantity}"
            />
            <span class="quantity-btn plus" data-action="plus">+</span>
          </div>
          <button onclick="removeItemFromCart(${index})">Remove</button>
        </div>
      </td>
      <td class="product-subtotal">$ ${cartItem.quantity * cartItem.price}</td>
    </tr>
  `;
  cartTable.innerHTML += cartRow;
});

let plusButtons = document.querySelectorAll(".plus");
let minusButtons = document.querySelectorAll(".minus");
let productSubtotal = document.querySelectorAll(".product-subtotal");
let quantityInput = document.querySelectorAll("#quantity");
let productPrice = document.querySelectorAll(".product-price");
let cartTotal = document.querySelector(".cart-total");

plusButtons.forEach((plus) => {
  plus.addEventListener("click", () => {
    let inputField = plus.previousElementSibling;
    if (inputField.value < 10) {
      inputField.value++;
      updateSubtotal(inputField);
    }
  });
});

minusButtons.forEach((minus) => {
  minus.addEventListener("click", () => {
    let inputField = minus.nextElementSibling;
    if (inputField.value > 1) {
      inputField.value--;
      updateSubtotal(inputField);
    }
  });
});

quantityInput.forEach((input) => {
  input.addEventListener("change", () => {
    updateSubtotal(input);
  });
});

function updateSubtotal(input) {
  let index = Array.from(quantityInput).indexOf(input);
  let quantity = input.value;
  let price = parseFloat(productPrice[index].textContent.replace("$", ""));
  let subtotal = quantity * price;
  productSubtotal[index].textContent = "$" + parseFloat(subtotal);

  // Update cartItems with new quantity and subtotal values
  cartItems[index].quantity = quantity;
  cartItems[index].subtotal = subtotal;

  // Set updated cartItems to local storage
  localStorage.setItem("cartItems", JSON.stringify(cartItems));

  // Calculate cart total based on the updated subtotals
  let subtotals = document.querySelectorAll(".product-subtotal");
  let total = 0;
  subtotals.forEach((subtotal) => {
    total += parseFloat(subtotal.textContent.replace("$", ""));
  });
  cartTotal.textContent = "$" + total;
}
function calculateTotal() {
  let subtotals = Array.from(productSubtotal).map((subtotal) =>
    parseFloat(subtotal.textContent.replace("$", ""))
  );
  let total = subtotals.reduce(
    (accumulator, currentValue) => accumulator + currentValue,
    0
  );
  cartTotal.textContent = "$" + parseFloat(total);
}
window.addEventListener("load", () => {
  calculateTotal();
});
