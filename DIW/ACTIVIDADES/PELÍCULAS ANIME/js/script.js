document.querySelectorAll(".article section img").forEach(function (img) {
  img.addEventListener("click", function () {
    document.querySelector(".header nav").classList.add("hidden");
  });
});
