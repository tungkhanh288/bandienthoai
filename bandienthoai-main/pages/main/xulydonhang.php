<?php
    session_start();
    include('../../admincp/config/connect.php');
    if (isset($_GET['query']) && $_GET['query'] == 'huy') {
        $code_cart = $_GET['code_cart'];

        $sql_cart_info = "DELETE FROM tbl_cart_info WHERE code_cart = $code_cart";
        mysqli_query($connect, $sql_cart_info);

        $sql_cart = "DELETE FROM tbl_cart WHERE code_cart = $code_cart";
        mysqli_query($connect, $sql_cart);

        $_SESSION['thongbao'] = 'huydh';

        session_write_close();
        header('Location: ../../index.php?navigate=xemdonhang');
    }

    if (isset($_GET['query']) && $_GET['query'] == 'nhan') {
        $code_cart = $_GET['code_cart'];

        $sql_cart = "UPDATE tbl_cart SET trangthai=3 WHERE code_cart = $code_cart";
        $query_cart = mysqli_query($connect, $sql_cart);

        $sql_cart_info = "SELECT * FROM tbl_cart_info INNER JOIN tbl_sanpham ON tbl_cart_info.id_sp = tbl_sanpham.id_sp  WHERE code_cart = $code_cart";
        $query_cart_info = mysqli_query($connect, $sql_cart_info);

        $currentDay = date('Y-m-d');

        mysqli_query($connect, "UPDATE tbl_cart SET ngaynhan='".$currentDay."' WHERE code_cart=$code_cart");

        while ($row = mysqli_fetch_array($query_cart_info)){
            $sql_getsp = "SELECT soluong,daban FROM tbl_sanpham WHERE id_sp = ".$row['id_sp']."";
            $query_getsp = mysqli_query($connect, $sql_getsp);
            $data_sp = mysqli_fetch_array($query_getsp);
            $sl_sp = $data_sp['soluong'];
            $sl_daban = $data_sp['daban'];

            $sql_update = "UPDATE tbl_sanpham SET soluong = ".(int)$sl_sp-(int)$row['sl'].", daban= ".(int)$sl_daban+(int)$row['sl']." WHERE id_sp = ".$row['id_sp']."";
            $query_update = mysqli_query($connect, $sql_update);
        }
        $_SESSION['thongbao'] = 'nhandh';

        session_write_close();
        header('Location: ../../index.php?navigate=chitietdh&code_cart='.$code_cart.'');
    }
?>