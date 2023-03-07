const bookBtn = document.getElementById("book-btn");
const bookingFormContainer = document.getElementById("booking-form-container");
const overlay = document.getElementById("overlay");

bookBtn.addEventListener("click", () => {
  bookingFormContainer.style.display = "flex";
  overlay.style.display = "block";
  document.body.style.overflow = "hidden";
});

overlay.addEventListener("click", () => {
  bookingFormContainer.style.display = "none";
  overlay.style.display = "none";
  document.body.style.overflow = "auto";
});

const exitBtn = document.getElementById("exit-btn");
exitBtn.addEventListener("click", () => {
  bookingFormContainer.style.display = "none";
  overlay.style.display = "none";
});
