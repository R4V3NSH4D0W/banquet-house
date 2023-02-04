<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>
<script type="text/javascript">
    function submitData(action, e) {
        e.preventDefault();
        console.log(document.getElementById("images").files[0]);
        //     $(document).ready(function() {
        //         var data = {
        //             action: action,
        //             image_id: $("#image-id").val(),
        //             image: document.getElementById("images").files[0],
        //         };
        //         $.ajax({
        //             url: 'function.php',
        //             type: 'post',
        //             data: data,
        //             success: function(response) {
        //                 console.log(data);
        //                 alert(response);
        //             }
        //         });
        //     });
    }
</script>