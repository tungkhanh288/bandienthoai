<?php
    include('../../admincp/config/connect.php');
    session_start();
    // unset($_SESSION['carts']);
    if (isset($_GET['query']) && $_GET['query'] == 'them') {

        if (isset($_POST['themgiohang'])) {
            $sl = $_POST['soluong'];
        } else {
            $sl = 1;
        }

        $id = $_GET['idsp'];
        $sql = "SELECT * FROM tbl_sanpham WHERE id_sp = $id LIMIT 1";
        $query = mysqli_query($connect, $sql);
        $row = mysqli_fetch_array($query);

        if ($row['soluong'] == 0) {
            header('Location: ../../index.php?navigate=giohang&thongbao=hethang');
        }elseif ($row) {
            
            $new_product [] = array('id' => $row['id_sp'], 'tensp' => $row['ten_sp'], 'gia' => $row['gia'], 'hinhanh' => $row['hinhanh'], 'soluong' => $sl);
            
            if(isset($_SESSION['carts'])) {
                $found = false;
                $hethang = false;
                for($i = 0; $i < count($_SESSION['carts']); $i++) {
                    if ($_SESSION['carts'][$i]['id'] == $id) {
                        if (isset($sl) && $_SESSION['carts'][$i]['soluong'] + $sl <= $row['soluong']) {
                            $_SESSION['carts'][$i]['soluong'] += $sl;
                        }elseif (!isset($sl) && $_SESSION['carts'][$i]['soluong'] < $row['soluong']) {
                            $_SESSION['carts'][$i]['soluong'] += 1;
                        } else {
                            $hethang = true;
                        }
                        $found = true;
                    }
                }
                if (!$found) {
                    $_SESSION['carts'] = array_merge($_SESSION['carts'], $new_product);
                }
            } else {
                $_SESSION['carts'] = $new_product;
            }
            

            if ($hethang) {
                $_SESSION['thongbao'] = 'hethang';
                header('Location: ../../index.php?navigate=giohang');
            } else {
                header('Location: ../../index.php?navigate=giohang');
            }
        }

    }

    if (isset($_GET['query']) && $_GET['query'] == 'xoa') {
        $id = $_GET['idsp'];
        $key = array_search($id, array_column($_SESSION['carts'], 'id'));
        unset($_SESSION['carts'][$key]);
        $_SESSION['carts'] = array_values(array_filter($_SESSION['carts']));

        header('Location: ../../index.php?navigate=giohang');
    }

    if (isset($_GET['query']) && $_GET['query'] == 'giam') {
        $id = $_GET['id'];
        for ($i = 0; $i < count($_SESSION['carts']); $i++) {
            if ($_SESSION['carts'][$i]['id'] == $id) {
                if ($_SESSION['carts'][$i]['soluong'] > 1) { // số lượng lớn hơn 1 thì giảm 1
                    $_SESSION['carts'][$i]['soluong'] -= 1;
                    header('Location: ../../index.php?navigate=giohang');
                } else { // số lượng = 1 xóa luôn
                    header('Location: themgiohang.php?query=xoa&idsp='.$id.'');
                }
            }
        }
    }

    if (isset($_GET['query']) && $_GET['query'] == 'tang') {
        $id = $_GET['id'];
        header('Location: themgiohang.php?query=them&idsp='.$id.'');
    }

?>