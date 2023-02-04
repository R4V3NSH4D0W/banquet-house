function submitData(action) {
  $(document).ready(function () {
    var data = {
      action: action,
      image_id: $("#image-id").val(),
      image: $("#images").files[0],
    };
    console.log(data);
    $.ajax({
      url: "function.php",
      type: "post",
      data: data,
      success: function (response) {
        console.log(data);
        alert(response);
      },
    });
  });
}
