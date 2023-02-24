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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../services/style2.css">
    <link rel="stylesheet" href="../sidebar/style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
                <a href="manageservice.php"> <i class='bx bx-left-arrow-alt'></i>Go Back</a>
                <h1>Action</h1>
                <form method="post" action="">
                    <!-- <input type="hidden" name="id" id="service-id" value="<?php echo $row['id']; ?>"> -->
                    <label for="Icon-name">Name</label>
                    <select id="icons" style="font-size:16px;padding:10px;">
                        <option value="fas fa-map-marker-alt">Map</option>
                        <option value="fas fa-envelope">Invitation Card</option>
                        <option value="ffas fa-utensils">Food and Drinks</option>
                        <option value="fas fa-photo-video">photos and Video</option>
                        <option value="fas fa-birthday-cake">Birthday Cake</option>
                    </select>
                    <label for="service-name">Service name:</label>
                    <input type="text" id="service-name" name="service-name" value="<?php echo $row['servicename']; ?>">

                    <label for="service-description">Service description:</label>
                    <textarea id="service-description" name="service-description"><?php echo $row['servicedesc']; ?></textarea>

                    <label for="service-price">Service price:</label>
                    <input type="number" id="service-price" name="service-price" value="<?php echo $row['serviceprice']; ?>">
                    <button class="add" onclick="submitData('edit');" name="update">Update</button>
                </form>
            </div>
        </div>

        </div>


</body>

</html>

</section>
<script src="../sidebar/script.js">
</script>
</body>

</html>
<style>
    table {
        margin-top: 20px;
        width: 100%;
        border-collapse: collapse;

    }

    th,
    td {
        border: 1px solid #dddddd;
        padding: 8px;
        text-align: center;
    }

    th {
        background-color: #dddddd;
    }

    .edit {
        background-color: #4CAF50;
        color: white;
        padding: 6px 12px;
        border: none;
        cursor: pointer;
        border-radius: 10px;
    }

    .delete {
        background-color: red;
        color: white;
        padding: 6px 12px;
        border: none;
        cursor: pointer;
        border-radius: 10px;
    }
</style>