<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form autocomplete="off" action="" method="post">
        <input type="hidden" id="action" value="signin">
        <input type="text" id="email" placeholder="Enter email"><br>
        <input type="password" id="password" placeholder="Enter Password"><br>
        <button type="button" onclick="submitData('signin',this);">Login</button>
    </form>
    <?php
    require 'script.php';
    ?>
</body>

</html>