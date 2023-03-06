// Optional JavaScript to add a hover effect to the image
const img = document.querySelector(".right-side img");
img.addEventListener("mouseover", () => {
  img.style.transform = "scale(1.1)";
});
img.addEventListener("mouseout", () => {
  img.style.transform = "scale(1)";
});
