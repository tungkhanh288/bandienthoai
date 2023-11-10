<?php
session_start();
include('../config/connect.php');  
if (isset($_POST['login'])) {
    $taikhoan = $_POST['username'];
    $matkhau = $_POST['password'];
    $sql = "SELECT * FROM tbl_admin WHERE tbl_admin.ten='" . $taikhoan . "' AND tbl_admin.matkhau='" . $matkhau . "'  LIMIT 1";
    $row = mysqli_query($connect, $sql);
    $count = mysqli_num_rows($row);
    if ($count > 0) {
        $row_data = mysqli_fetch_array($row);
        $_SESSION['loginadmin'] = $row_data['ten'];
        $message = "Đăng nhập thành công";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header("Location: ../index.php");
    } else {
        $message = "Tài khoản mật khẩu không đúng";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="login_style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
</head>

<body>
    <div class="wraper">
        <div class="form-box login">
            <form action="" method="post">
                <h2>Login to Admin Page</h2>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="person"></ion-icon>
                    </span>
                    <input type="text" name="username" required>
                    <label for="">Username</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock-closed"></ion-icon>
                    </span>
                    <input type="password" name="password" required>
                    <label for="">Password</label>
                </div>
                <div class="remember-forgot">
                    <label for=""><input type="checkbox"> Remember me</label>
                    <a href="#">Forgot password?</a>
                </div>
                <button type="submit" name="login">Login</button>
            </form>
        </div>
    </div>
    <script src="login.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>