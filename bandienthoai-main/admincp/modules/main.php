<?php
    if (isset($_GET['navigate'])) {
        $trangthai = $_GET['navigate'];
    } else {
        $trangthai = '';
    }

    if (isset($_GET['query'])) {
        $query = $_GET['query'];
        
    }else {
        $query = '';
    }

    if ($trangthai == 'qldmsp' && $query == 'them') {
        include('./modules/quanlydanhmucsp/them.php');
        include('./modules/quanlydanhmucsp/lietke.php');
    } elseif ($trangthai == 'qldmsp' && $query == 'suahsp') {
        include('./modules/quanlydanhmucsp/sua.php');
    } elseif ($trangthai == 'qldmsp' && $query == 'suamucgia') {
        include('./modules/quanlydanhmucsp/suamucgia.php');
    } elseif ($trangthai == 'qlsp' && $query == 'them') {
        include('./modules/quanlysp/them.php');
        include('./modules/quanlysp/lietke.php');
    } elseif ($trangthai == 'qlsp' && $query == 'sua') {
        include('./modules/quanlysp/sua.php');
    } elseif ($trangthai == 'dangxuat') {
        unset($_SESSION['loginadmin']);
        header('Location: ../index.php');
    }elseif ($trangthai == 'qldh' && $query == 'them') {
        include('./modules/quanlydonhang/lietke.php');
    }elseif ($trangthai == 'qldh' && $query == 'sua') {
        include('./modules/quanlydonhang/sua.php');
    }elseif ($trangthai == 'qldh' && $query == 'chitiet') {
        include('./modules/quanlydonhang/chitiet.php');
    }elseif ($trangthai == 'qldh' && $query == 'indonhang') {
        include('./modules/quanlydonhang/indonhang.php');
    }elseif ($trangthai == 'qlnd' && $query == 'them') {
        include('./modules/quanlynguoidung/them.php');
        include('./modules/quanlynguoidung/lietke.php');
    }elseif ($trangthai == 'qlnd' && $query == 'sua') {
        include('./modules/quanlynguoidung/sua.php');
    }  else {
        include('./modules/dashboard.php');
    }
    
?>