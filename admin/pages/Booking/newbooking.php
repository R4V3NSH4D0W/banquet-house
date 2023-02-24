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
                <h1>New Booking</h1>
                <table>
                    <tr>
                        <th>S.N</th>
                        <th>Name</th>
                        <th>gmail</th>
                        <th>No of Guests</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $row = mysqli_query($conn, "SELECT *
                         FROM booking 
                          JOIN user on
                           booking.user_id=user.id 
                           where booking.admin_id='$admin_id'");
                    $i = 1;
                    ?>
                    <?php foreach ($row as $row) : ?>
                        <!-- <tr id=<?php echo $row["id"]; ?>> -->
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td><?php echo $row["Noofguests"]; ?></td>
                        <td><?php echo $row["status"]; ?></td>
                        <td><a style="color:blue;" href="action.php?id=<?php echo $row['ID']; ?>"><i class="fa-solid fa-eye"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
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