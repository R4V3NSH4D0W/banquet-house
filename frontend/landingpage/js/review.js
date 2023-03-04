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

  // Create a new XMLHttpRequest object
  const xhr = new XMLHttpRequest();

  // Set the method to "POST"
  xhr.open("POST", "functions/send_review.php");

  // Set the appropriate request headers
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  // Create a FormData object and append the review body, rating, and page_id values
  // const formData = new FormData();
  // formData.append("review-body", reviewBody);
  // formData.append("rating", rating);
  // formData.append("page_id", pageId);
  // const formData = new FormData(reviewForm);
  // formData.append("page_id", pageId);
  var data =
    "review=" +
    encodeURIComponent(reviewBody) +
    "&rating=" +
    encodeURIComponent(rating) +
    "&page_id=" +
    encodeURIComponent(pageId);
  // Send the Ajax request with the FormData object
  xhr.send(data);

  // When the Ajax request completes, do something
  xhr.addEventListener("load", function () {
    console.log(data);
    // Handle the response from the server here
    console.log(xhr.responseText);
    alert(xhr.responseText);

    // Hide the modal and overlay
    modal.classList.add("hidden");
    overlay.classList.add("hidden");

    // Reset the form
    reviewForm.reset();
  });
});
