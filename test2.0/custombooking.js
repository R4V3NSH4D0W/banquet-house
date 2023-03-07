const addReviewBtn = document.getElementById("add-review-btn");
const modal = document.getElementById("modal");
const overlay = document.getElementById("overlay");
const closeBtn = document.querySelector(".close");

addReviewBtn.addEventListener("click", () => {
  modal.classList.remove("hidden");
  overlay.classList.remove("hidden");
});

closeBtn.addEventListener("click", () => {
  modal.classList.add("hidden");
  overlay.classList.add("hidden");
});

window.addEventListener("click", (event) => {
  if (event.target == overlay) {
    modal.classList.add("hidden");
    overlay.classList.add("hidden");
  }
});
