const guestCountInput = document.getElementById("guest-count");
const appetizerCheckboxes = document.getElementsByName("appetizer1");
const soupsCheckbox = document.getElementsByName("soups")[0];
const totalPriceElement = document.getElementById("total-price");

// Define the prices of each item

// Calculate the total price based on the selected items and guest count
function calculateTotalPrice() {
  let totalPrice = 0;

  // Calculate the price of the selected appetizers
  for (let i = 0; i < appetizerCheckboxes.length; i++) {
    if (appetizerCheckboxes[i].checked) {
      totalPrice += appetizerPrice;
    }
  }

  // Add the price of the selected soup
  if (soupsCheckbox.checked) {
    totalPrice += soupsPrice;
  }

  // Multiply the total price by the guest count
  totalPrice *= guestCountInput.value;

  // Update the total price element
  totalPriceElement.textContent = totalPrice;
}

// Listen for changes to the input and checkbox elements
guestCountInput.addEventListener("input", calculateTotalPrice);
for (let i = 0; i < appetizerCheckboxes.length; i++) {
  appetizerCheckboxes[i].addEventListener("change", calculateTotalPrice);
}
soupsCheckbox.addEventListener("change", calculateTotalPrice);
