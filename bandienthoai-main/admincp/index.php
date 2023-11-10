<?php
    session_start();
    if(!isset($_SESSION['loginadmin'])){
        header('Location: admin/login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Bandienthoai.vn</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/header.css">
    <link rel="stylesheet" href="../style/oder.css">
    <link rel="stylesheet" href="../style/cart.css">
</head>
<body>
    <div class="wrapper">
        <?php
            include("./config/connect.php");
            include("./modules/header.php");
            include("./modules/main.php");
        ?>
    </div>
</body>
</html>