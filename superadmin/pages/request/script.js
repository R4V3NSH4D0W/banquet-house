var activeButton = document.querySelector(".active-button");
var deactiveButton = document.querySelector(".deactive-button");

activeButton.addEventListener("click", updateStatus.bind(null, "active"));
deactiveButton.addEventListener("click", updateStatus.bind(null, "deactive"));

const statusFilter = document.querySelector("#status-filter");
statusFilter.addEventListener("change", () => {
  const status = statusFilter.value;
  const urlParams = new URLSearchParams(window.location.search);
  urlParams.set("status-filter", status);
  window.location.search = urlParams.toString();
});
$(document).ready(function () {
  $("#sort-select").change(function () {
    var sort_by = $(this).val();
    $.ajax({
      url: "sort.php",
      type: "GET",
      data: { sort: sort_by },
      success: function (data) {
        $("#myTable tbody").html(data);
      },
      error: function (xhr, status, error) {
        console.log(xhr.responseText);
      },
    });
  });
});
