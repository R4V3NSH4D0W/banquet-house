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
        <input type="text" id="name" placeholder="enter user name"><br>
        <input type="email" id="email" placeholder="enter Email"><br>
        <input type="password" id="password" placeholder="enter password"><br>
        <input type="password" id="confirm" placeholder="Re enter password"><br>
        <button type="button" onclick="submitData('signup',this);">Signup</button>
        <!-- <input type="submit" onclick="submitData('signup');" value="signin"> -->
    </form>
    <?php require 'script.php'; ?>
</body>

</html>