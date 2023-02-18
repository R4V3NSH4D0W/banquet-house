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
    $id = $_GET["id"];
    $rows = mysqli_query($conn, "SELECT * FROM tbservice Where adminid='$id'");
    ?>
    <table>
        <tr>
            <th>service Name </th>
            <th>Servce Price</th>
        </tr>
        <?php foreach ($rows as $rows) : ?>
        <tr>
            <td><?php echo $rows['servicename']; ?></td>
            <td><?php echo $rows['serviceprice']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>