const urlParams = new URLSearchParams(window.location.search);
const pageId = urlParams.get("page_id");

const addReviewModalBtn = document.getElementById("add-review-btn");
const modal = document.getElementById("modal");
const overlay = document.getElementById("overlay");
const closeBtn = document.querySelector(".close");

addReviewModalBtn.addEventListener("click", function (event) {
  event.preventDefault();

  // Show the modal and overlay
  modal.classList.remove("hidden");
  overlay.classList.remove("hidden");
});

closeBtn.addEventListener("click", function () {
  // Hide the modal and overlay
  modal.classList.add("hidden");
  overlay.classList.add("hidden");
});

overlay.addEventListener("click", function () {
  // Hide the modal and overlay
  modal.classList.add("hidden");
  overlay.classList.add("hidden");
});

// Get the form element
const reviewForm = document.querySelector("form");

reviewForm.addEventListener("submit", function (event) {
  event.preventDefault();

  // Get the review body and rating values
  const reviewBody = document.getElementById("review-body").value;
  const rating = document.querySelector('input[name="rating"]:checked').value;
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "functions/send_review.php");
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  var data =
    "review=" +
    encodeURIComponent(reviewBody) +
    "&rating=" +
    encodeURIComponent(rating) +
    "&page_id=" +
    encodeURIComponent(pageId);
  xhr.send(data);

  xhr.addEventListener("load", function () {
    if (xhr.responseText === "Review added successfully.") {
      swal({
        title: "Review added!",
        text: "Thank you for your feedback!",
        icon: "success",
      });
      modal.classList.add("hidden");
      overlay.classList.add("hidden");
      reviewForm.reset();
    } else {
      swal({
        title: "Error",
        text: xhr.responseText,
        icon: "error",
      });
    }
  });
});
//booking
// Optional JavaScript to add a hover effect to the image
const bookBtn = document.getElementById("book-btn");
const bookingFormContainer = document.getElementById("booking-form-container");

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
