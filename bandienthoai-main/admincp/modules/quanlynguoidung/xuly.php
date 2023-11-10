<?php
    include('../../config/connect.php');
    //thêm tài khoản
    if (isset($_POST['themtk'])) {
        $email  = $_POST['email'];
        $phone = $_POST['sdt'];
        $username = $_POST['tentk'];
        $pass = $_POST['mk'];
        $address = $_POST['dc'];
        $themtk = "INSERT INTO tbl_dangky(tentaikhoan, sodienthoai, email, matkhau, diachi) VALUE('".$username ."','".$phone."','" .$email. "','".$pass."','".$address."')";
        $query_dangky = mysqli_query($connect, $themtk);
        header('Location: ../../index.php?navigate=qlnd&query=them');
    }
    //xóa tài khoản
    if (isset($_GET['query']) && $_GET['query'] == 'xoatk') {
        $id = $_GET['idtk'];
        $sql_xoa = "DELETE FROM tbl_dangky WHERE  id_khachhang = $id";
        mysqli_query($connect, $sql_xoa);
        header('Location: ../../index.php?navigate=qlnd&query=them');
    }
    //sửa tài khoản
    if (isset($_POST['xacnhansua'])) {
        $id = $_GET['id'];
        $idtk = $_POST['id'];
        $tentk = $_POST['tentk'];
        $sdt = $_POST['sdt'];
        $matkhau = $_POST['matkhau'];
        $diachi = $_POST['diachi'];
        $email = $_POST['email'];

        $sql = "UPDATE tbl_dangky SET  sodienthoai='".$sdt."',diachi='".$diachi."',tentaikhoan='".$tentk."',matkhau='".$matkhau."',email='".$email."' WHERE id_khachhang=$id";      
        mysqli_query($connect, $sql);
        header('Location: ../../index.php?navigate=qlnd&query=them');
    }
    
?>