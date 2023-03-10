const addFoodBtn = document.getElementById("add-food-btn");
const popup = document.querySelector(".popup");
const form = document.querySelector(".form");
const foodNameInput = document.getElementById("food-name");
const foodPriceInput = document.getElementById("food-price");
const foodImageInput = document.getElementById("food-image");
const foodTypeSelect = document.getElementById("food-type");

const closeBtn = document.getElementById("close");

// When the "Add Food" button is clicked, show the popup form
addFoodBtn.addEventListener("click", () => {
  popup.style.display = "flex";
});

// When the "close" button is clicked, hide the popup form
closeBtn.addEventListener("click", () => {
  popup.style.display = "none";
});

// When the form is submitted, send an XHR POST request with the food data
form.addEventListener("submit", (event) => {
  // ...
});
// When the "Add Food" button is clicked, show the popup form
addFoodBtn.addEventListener("click", () => {
  popup.style.display = "flex";
});

// When the form is submitted, send an XHR POST request with the food data
form.addEventListener("submit", (event) => {
  event.preventDefault();
  // Create a new XHR request
  const xhr = new XMLHttpRequest();

  // Set up the request
  xhr.open("POST", "/addFood");
  xhr.setRequestHeader("Content-Type", "application/json");

  // Send the food data as JSON in the request body
  const foodData = {
    name: foodNameInput.value,
    price: foodPriceInput.value,
    image: foodImageInput.files[0],
    type: foodTypeSelect.value,
  };

  const formData = new FormData();
  formData.append("name", foodData.name);
  formData.append("price", foodData.price);
  formData.append("type", foodData.type);
  formData.append("image", foodData.image);

  xhr.send(formData);

  // Handle the response from the server
  xhr.onreadystatechange = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        // Success! Hide the popup form
        popup.style.display = "none";

        // Clear the input fields
        foodNameInput.value = "";
        foodPriceInput.value = "";
        foodImageInput.value = "";
        foodTypeSelect.value = "";
      } else {
        // Oops, something went wrong
        alert("Error adding food item");
      }
    }
  };
});
