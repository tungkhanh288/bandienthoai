<!-- Đăng nhập -->
<?php
session_start();
include('../admincp/config/connect.php');  
if (isset($_POST['login'])) {
    $taikhoan = $_POST['usernamelg'];
    $matkhau = $_POST['passwordlg'];
    $sql = "SELECT * FROM tbl_dangky ,tbl_admin WHERE tbl_dangky.tentaikhoan='" . $taikhoan . "' AND tbl_dangky.matkhau='" . $matkhau . "'  LIMIT 1";
    $row = mysqli_query($connect, $sql);
    $count = mysqli_num_rows($row);
    if ($count > 0) {
        $row_data = mysqli_fetch_array($row);
        $_SESSION['login'] = $row_data['id_khachhang'];
        $message = "Đăng nhập thành công";
        echo "<script type='text/javascript'>alert('$message');</script>";
        if (isset($_SESSION['dathang'])) {
            unset($_SESSION['dathang']);
            header("Location:../index.php?navigate=dathang");
        }elseif(isset($_SESSION['xemdonhang'])){
            unset($_SESSION['xemdonhang']);
            header("Location:../index.php?navigate=xemdonhang");
        } else {
            header("Location:../index.php");
        }
        
    } elseif ($taikhoan == 'admin') {
        header("Location:../admincp/admin/login.php");
    } else {
        $message = "Tài khoản mật khẩu không đúng";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}
?>
<!-- Đăng kí tài khoản -->
<?php
if (isset($_POST['register'])) {
    $email  = $_POST['email'];
    $phone = $_POST['numberphone'];
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $pass = $_POST['password'];
    $repass = $_POST['repassword'];
    $address = $_POST['address'];

    if ($pass != $repass) {
        $message = "Mật khẩu và xác nhận mật khẩu phải trùng nhau";
        echo "<script type='text/javascript'>alert('$message');</script>";
    } else {
        $sql_dangky = "INSERT INTO tbl_dangky(tentaikhoan, hoten, sodienthoai, email, matkhau, diachi) VALUE('".$username ."','".$fullname ."','".$phone."','" .$email. "','".$pass."','".$address."')";
        $query_dangky = mysqli_query($connect, $sql_dangky);
        if ($query_dangky) {
            echo '<script>alert("Đăng ký thành công")</script>';
            $_SESSION['register'] = $username;
            $_SESSION['id'] = mysqli_insert_id($connect);
        }
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
    <link rel="stylesheet" href="../style/login_style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
</head>

<body>
    <div class="wraper">
        <div class="form-box login">
            <form action="" method="post">
                <h2>Login</h2>
                <div class="input-box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" name="usernamelg" required>
                    <label for="">Username</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="passwordlg" required>
                    <label for="">Password</label>
                </div>
                <div class="remember-forgot">
                    <label for=""><input type="checkbox"> Remember me</label>
                    <a href="#">Forgot password?</a>
                </div>
                <button type="submit" name="login">Login</button>
                <div class="register-link">
                    <p>Don't have an account? <a href="#">Register</a></p>
                </div>
            </form>
        </div>

        <div class="form-box register">
            <form action="" method="post">
                <h2>Registration</h2>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="email" name="email" required>
                    <label for="">Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="call"></ion-icon></ion-icon></span>
                    <input type="text" name="numberphone" required>
                    <label for="">Phone number</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" name="username" required>
                    <label for="">Username</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" name="fullname" required>
                    <label for="">Full name</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="password" required>
                    <label for="">Password</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="repassword" required>
                    <label for="">Repassword</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="home"></ion-icon></span>
                    <input type="text" name="address" required>
                    <label for="">Address</label>
                </div>
                <div class="remember-forgot">
                    <label for=""><input type="checkbox"> I agree to the terms & conditions</label>
                </div>
                <button type="submit" name="register">Register</button>
                <div class="login-link">
                    <p>Already have an account? <a href="#">Login</a></p>
                </div>
            </form>
        </div>
    </div>
    <script src="../js/login.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>