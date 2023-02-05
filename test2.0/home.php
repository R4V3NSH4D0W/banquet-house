<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require '/programs/xampp/htdocs/banquethouses/connection/config.php';
    $rows = mysqli_query($conn, "SELECT * FROM banquet");

    ?>
    <?php
    foreach ($rows as $rows) :
    ?>
        <a href="desc.php?id=<?php echo $rows['admin_id']; ?>">
            <img src="./uploads/<?php echo $rows["image"]; ?>">
        </a>
    <?php endforeach; ?>
</body>

</html>