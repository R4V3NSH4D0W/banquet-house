<?php
session_start();
$conn = mysqli_connect("localhost", "magar", "", "banquethouse");

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
   header('location:login.php');
};
if (isset($_POST['upload'])) {
   $file = $_FILES['image']['name'];

   $query = "INSERT INTO images values('','$file','1')";
   $res = mysqli_query($conn, $query);
   if ($res) {
      move_uploaded_file($_FILES['image']['tmp-image'], "$file");
   }
}

?>
<html>

<body>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required>
        <input type="submit" value="add product" name="upload" class="btn">
    </form>
</body>

</html>