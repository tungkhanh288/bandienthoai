<?php
include('../admincp/config/connect.php');

if (isset($_POST['capnhat'])) {
    $id = $_GET['id'];
    $ten = $_POST['tencapnhat'];
    $hoten = $_POST['hotencapnhat'];
    $email = $_POST['emailcapnhat'];
    $sdt = $_POST['sdtcapnhat'];
    $diachi = $_POST['diachicapnhat'];
    $sql = " UPDATE tbl_dangky SET tentaikhoan = '" . $ten . "',hoten='".$hoten."', email = '" . $email . "', sodienthoai = '" . $sdt . "', diachi = '" . $diachi . "' WHERE id_khachhang = '" . $id . "'";
    mysqli_query($connect, $sql);
    echo ("<script> alert('Cập nhật thành công') </script>");
    header('Location: ../index.php?navigate=thongtin');
}
