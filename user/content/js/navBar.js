let menu = document.querySelector(".menu-icon");
let NavBarList = document.querySelector(".main-nav__list");

menu.addEventListener("click", () => {
  NavBarList.classList.toggle("show");
});
