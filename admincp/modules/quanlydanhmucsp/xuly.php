<?php
    include("../../config/connect.php");
    // Thêm hãng sản phẩm
    if (isset($_POST['themhangsp'])) {
        $tenhangsp = $_POST['tenhangsp'];
        $thutusp = $_POST['thutusp'];
        if ($tenhangsp && $thutusp) {
            $sql_them = "INSERT INTO tbl_hangsp(tenhangsp, stt) VALUE('".$tenhangsp."', '".$thutusp."')";
            mysqli_query($connect, $sql_them);
        }
    }
    // Xóa hãng sản phẩm
    if (isset($_GET['query']) && $_GET['query'] == 'xoahsp') {
        $id = $_GET['idxoa'];
        $sql_xoa = "DELETE FROM tbl_hangsp WHERE id_hangsp = $id";
        mysqli_query($connect, "UPDATE tbl_sanpham SET id_hangsp = null WHERE id_hangsp = $id");
        mysqli_query($connect, $sql_xoa);
    }
    // Sửa hãng sản phẩm
    if (isset($_POST['suahsp'])) {
        $tenhang = $_POST['tenhangsp'];
        $stt = $_POST['thutusp'];
        $idsua = $_GET['idsua'];
        $sql_update = "UPDATE tbl_hangsp SET tenhangsp = '".$tenhang."', stt = '".$stt."' WHERE id_hangsp = '".$idsua."'";
        mysqli_query($connect, $sql_update);
    }
    // Thêm mức giá
    if (isset($_POST['themmucgia'])) {
        $muc_gia = (int)$_POST['mucgia'];
        $sql_them = "INSERT INTO tbl_mucgia(mucgia) VALUE(".$muc_gia.")";
        mysqli_query($connect, $sql_them);
    }
    // Xóa mức giá
    if (isset($_GET['query']) && $_GET['query'] == 'xoamucgia') {
        $id_xoa = $_GET['idxoa'];
        $sql_xoa = "DELETE FROM tbl_mucgia WHERE id_mucgia = '".$id_xoa."'";
        mysqli_query($connect, $sql_xoa);
    }
    // Sửa mức giá
    if (isset($_POST['suamucgia'])) {
        $muc_gia = $_POST['mucgia'];
        $id_sua = $_GET['idsua'];
        $sql_sua = "UPDATE tbl_mucgia SET mucgia = '".$muc_gia."' WHERE id_mucgia = '".$id_sua."'";

        mysqli_query($connect, $sql_sua);
    }

    header('Location: ../../index.php?navigate=qldmsp&query=them');
?>