/** @format */

const backToTopButton = document.querySelector(".back-to-top-btn");
const stickyButton = document.querySelector(".sticky-btn");

window.addEventListener("scroll", () => {
  if (window.pageYOffset > 100) {
    backToTopButton.style.display = "block";
    stickyButton.style.display = "block";
  } else {
    backToTopButton.style.display = "none";
    stickyButton.style.display = "none";
  }
});

backToTopButton.addEventListener("click", () => {
  window.scrollTo(0, 0);
});

