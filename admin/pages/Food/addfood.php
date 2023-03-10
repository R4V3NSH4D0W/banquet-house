<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';
$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:../../../login/index.php');
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>
        Admin Panel
    </title>
    <link rel="stylesheet" href="../sidebar/style.css">
    <link rel="stylesheet" href="../services/style2.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


</head>

<body>
    <div class="sidebar close">
        <?php
        include '../sidebar/sidebar.php';
        ?>
    </div>
    <section class="home-section">
        <div class="home-content">
            <i class='bx bx-menu'></i>
            <span class="text">Dashboard</span>
        </div>
        <div class="container">
            <div class="main-container">
                <h1>ADD FOOD</h1>
                <form autocomplete="off" action="" method="post">
                    <label for="food-name">Food name:</label>
                    <input type="text" id="food-name" name="food-name" required>
                    <label for="food-description">Food description:</label>
                    <textarea id="food-description" name="food-description" required></textarea>
                    <label for="food-price">Food price:</label>
                    <input type="number" id="food-price" name="food-price" required>
                    <label for="food-Type">Food type:</label>
                    <select id="type" name="type" style="font-size:16px;padding:10px;">
                        <option value="appitizer">appitizer</option>
                        <option value="soups">soups</option>
                        <option value="maincourse">Maaincourse</option>
                        <option value="dessert">Dessert</option>
                        <option value="harddrinks">harddrinks</option>
                        <option value="softdrinks">softdrinks</option>
                    </select>
                    <label for="food-image">Food image:</label>
                    <input type="file" id="food-image" name="food-image" required>
                    <button class="add" name="add"><i class='bx bx-plus'></i> Add</button>
                </form>
            </div>
        </div>

    </section>
</body>
<script src="../sidebar/script.js"></script>
<script>
const form = document.querySelector('form');
const submitBtn = form.querySelector('button.add');

submitBtn.addEventListener('click', function(event) {
    event.preventDefault();

    const formData = new FormData(form);

    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'function.php');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: xhr.responseText
                });
                console.log(xhr.responseText);
                form.reset();
            } else {
                console.error('Error:', xhr.status);
            }
        }
    };
    xhr.send(formData);
});
</script>

</html>