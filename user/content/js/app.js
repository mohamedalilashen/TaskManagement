function countUp(targetElement, start, end, duration) {
  const range = end - start;
  const increment = (range / duration) * 10;
  const element = document.querySelector(targetElement);
  let current = start;
  const timer = setInterval(() => {
    current += increment;
    element.textContent = Math.floor(current);
    if (current >= end) {
      clearInterval(timer);
      element.textContent = end;
    }
  }, 10);
}
function animateCountUp(targetClass, duration) {
  const targetElement = document.querySelector(`.${targetClass}`);
  const endValue = Number(targetElement.textContent);
  countUp(`.${targetClass}`, 0, endValue, duration);
}
animateCountUp("client", 2000);
animateCountUp("project", 3000);
animateCountUp("employe", 1000);
animateCountUp("years", 1500);
