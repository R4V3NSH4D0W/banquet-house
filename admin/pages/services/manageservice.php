<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';
$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:../../login/index.php');
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
    <link rel="stylesheet" href="style2.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
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
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link rel="stylesheet" href="../sidebar/style.css">
        </head>

        <body>
            <div class="container">
                <div class="main-container">
                    <h1>Manage Services</h1>
                    <table>
                        <tr>
                            <th>S.N</th>
                            <th>Service Name</th>
                            <th>service Description</th>
                            <th>service Price</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        $row = mysqli_query($conn, "SELECT * FROM tbservice where adminid='$admin_id'");
                        $i = 1;
                        ?>
                        <?php foreach ($row as $row) : ?>
                            <tr id=<?php echo $row["id"]; ?>>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $row["servicename"]; ?></td>
                                <td><?php echo $row["servicedesc"]; ?></td>
                                <td>NRS <?php echo $row["serviceprice"]; ?></td>
                                <td>
                                    <a class="edit" href="editservice.php?id=<?php echo $row['id']; ?>"><i class='bx bx-edit'></i></a>
                                    <a class="delete" onclick="submitData(<?php echo $row['id']; ?>);"><i class='bx bx-trash'></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>


        </body>

        </html>
        <?php require 'script.php'; ?>
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