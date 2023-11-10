<?php
    include("../../config/connect.php");
        $masp = $_POST['masp'];
        $tensp = $_POST['tensp'];
        //xử lí hình ảnh
        $hinhanh = $_FILES['hinhanh']['name'];
        $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
        if ($hinhanh!= '') {
            $hinhanh = time().'_'.$hinhanh;
        }

        $idhangsp = $_POST['idhangsp'];
        $giasp = $_POST['giasp'];
        $ktmh = $_POST['ktmh'];
        $camera = addslashes($_POST['camera']);
        $chipset = $_POST['chipset'];
        $ram = $_POST['ram'];
        $rom = $_POST['rom'];
        $pin = $_POST['pin'];
        $sim = $_POST['sim'];
        $hedieuhanh = $_POST['hedieuhanh'];
        $mota = addslashes($_POST['motasp']);
        $soluong = $_POST['soluongsp'];
        $daban = $_POST['dabansp'];
        $trangthai = $_POST['trangthaisp'];
        $timerammat = $_POST['timerammat'];
    if (isset($_POST['themsp'])) {
        if ($masp && $tensp) {
            $sql_them = "INSERT INTO tbl_sanpham(ma_sp,ten_sp,hinhanh,id_hangsp,gia,kt_mh,camera,chipset,
            ram,rom,pin,sim,heDH,mota,soluong,daban,trangthai, time_rammat) VALUE('".$masp."', '".$tensp."', '".$hinhanh."', 
            '".$idhangsp."', '".$giasp."', '".$ktmh."', '".$camera."', '".$chipset."', 
            '".$ram."', '".$rom."', '".$pin."', '".$sim."', '".$hedieuhanh."', '".$mota."', '".$soluong."', 
            '".$daban."', '".$trangthai."', '".$timerammat."' )";
            mysqli_query($connect, $sql_them);
            move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
        }
    }
    if (isset($_GET['query']) && $_GET['query'] == 'xoa') {
        $id = $_GET['id_sp'];
        $sql = "SELECT * FROM tbl_sanpham WHERE id_sp = '$id' LIMIT 1";
        $query = mysqli_query($connect, $sql);
        while($row = mysqli_fetch_array($query)){
            unlink('uploads/' .$row['hinhanh']);
        }
        $sql_xoa = "DELETE FROM tbl_sanpham WHERE id_sp = '".$id."'";
        mysqli_query($connect, $sql_xoa);
    }

    if (isset($_POST['suasanpham'])) {
        $idsua = $_GET['idsua'];
        if($hinhanh != ''){
            move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
            $sql = "SELECT * FROM tbl_sanpham WHERE id_sp = '$idsua' LIMIT 1";
            $query = mysqli_query($connect, $sql);
        while($row = mysqli_fetch_array($query)){
            unlink('uploads/' .$row['hinhanh']);
        }
            $sql_update = "UPDATE tbl_sanpham SET ma_sp = '".$masp."', ten_sp = '".$tensp."', hinhanh = '".$hinhanh."', id_hangsp = '".$idhangsp."' 
            , gia = '".$giasp."', kt_mh = '".$ktmh."', camera = '".$camera."' , chipset = '".$chipset."', ram = '".$ram."', rom = '".$rom."', 
            pin = '".$pin."', sim = '".$sim."', heDH = '".$hedieuhanh."', mota = '".$mota."', soluong = '".$soluong."', daban = '".$daban."'
            , trangthai = '".$trangthai."', time_rammat = '".$timerammat."' WHERE id_sp = '".$idsua."'";
        
        }else{
            $sql_update = "UPDATE tbl_sanpham SET ma_sp = '".$masp."', ten_sp = '".$tensp."', id_hangsp = '".$idhangsp."' 
            , gia = '".$giasp."', kt_mh = '".$ktmh."', camera = '".$camera."' , chipset = '".$chipset."', ram = '".$ram."', rom = '".$rom."', 
            pin = '".$pin."', sim = '".$sim."', heDH = '".$hedieuhanh."', mota = '".$mota."', soluong = '".$soluong."', daban = '".$daban."'
            , trangthai = '".$trangthai."', time_rammat = '".$timerammat."' WHERE id_sp = '".$idsua."'";
        }
        mysqli_query($connect, $sql_update);
    }

    header('Location: ../../index.php?navigate=qlsp&query=them');
?>