<?php
    include('../../config/connect.php');
    if (isset($_GET['query']) && $_GET['query'] == 'xoa') {
        $id = $_GET['code_cart'];

        mysqli_query($connect, "DELETE FROM tbl_cart_info WHERE code_cart = $id");

        mysqli_query($connect, "DELETE FROM tbl_cart WHERE code_cart = $id");

        header('Location: ../../index.php?navigate=qldh&query=them');
    }

    if (isset($_POST['xacnhan'])) {
        $code_cart = $_GET['code_cart'];
        $id_kh = $_POST['idkh'];
        $sdt = $_POST['sdt'];
        $dc = $_POST['diachi'];
        $httt = $_POST['httt'];
        $ngaydat = $_POST['ngaydat'];
        $ngaynhan = $_POST['ngaynhan'];
        $trangthai = $_POST['trangthai'];

        if ($ngaynhan == '') {
            $sql = "UPDATE tbl_cart SET id_khachhang=$id_kh, sdt='".$sdt."',dc='".$dc."',ngaydat='".$ngaydat."',thanhtoan='".$httt."',trangthai=$trangthai WHERE code_cart=$code_cart";
            mysqli_query($connect, $sql);
        } else {
            $sql = "UPDATE tbl_cart SET id_khachhang=$id_kh, sdt='".$sdt."',dc='".$dc."',ngaydat='".$ngaydat."', ngaynhan='".$ngaynhan."',thanhtoan='".$httt."',trangthai=$trangthai WHERE code_cart=$code_cart";
            mysqli_query($connect, $sql);
        }

        header('Location: ../../index.php?navigate=qldh&query=them');
    }

    if (isset($_GET['query']) && $_GET['query'] == 'xacnhan') {
        $code_cart = $_GET['code_cart'];
        mysqli_query($connect, "UPDATE tbl_cart SET trangthai=2 WHERE code_cart=$code_cart");
        header('Location: ../../index.php?navigate=qldh&query=them');

    }
?>