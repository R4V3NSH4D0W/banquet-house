<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>
<script type="text/javascript">
    function submitData(action) {
        $(document).ready(function() {
            var data = {
                action: action,
                icons: $("#icons").val(),
                service_id: $("#service-id").val(),
                service_name: $("#service-name").val(),
                service_desc: $("#service-description").val(),
                service_price: $("#service-price").val(),
            };
            $.ajax({
                url: 'function.php',
                type: 'post',
                data: data,
                success: function(response) {
                    console.log(data);
                    if (response == "delete") {
                        alert("Deleted sucessfully");
                        location.reload();
                    } else {
                        alert(response);
                    }
                }
            });
        });
    }
</script>