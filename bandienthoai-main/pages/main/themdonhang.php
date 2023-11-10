<?php
    session_start();
    include('../../admincp/config/connect.php');
    if (isset($_POST['dathang'])) {
        $id_kh = $_SESSION['login'];
        $sdt = $_POST['sdt'];
        $dc = $_POST['diachi'];
        $trangthai = 1;
        $thanhtoan = $_POST['httt'];
        $currentDay = date('Y-m-d');
        $code_cart = rand(0,9999);

        $sql_cart = "INSERT INTO tbl_cart(id_khachhang, code_cart, sdt, dc, ngaydat, thanhtoan, trangthai) 
        VALUES(".$id_kh.", ".$code_cart.", '".$sdt."', '".$dc."', '".$currentDay."', '".$thanhtoan."', $trangthai)";

        mysqli_query($connect, $sql_cart);

        foreach ($_SESSION['carts'] as $key => $value) {
            $sql_cd = "INSERT INTO tbl_cart_info(code_cart, id_sp, sl)
            VALUES($code_cart, ".$value['id'].", ".$value['soluong'].")";
            mysqli_query($connect, $sql_cd);
        }

        unset($_SESSION['carts']);
        $_SESSION['thongbao'] = 'dathangok';
        header('Location: ../../index.php?navigate=chitietdh&code_cart='.$code_cart.'');
    }
?>