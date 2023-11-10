<?php
$sql_hangsp = "SELECT * FROM tbl_hangsp ORDER BY stt ASC";
$query_hangsp = mysqli_query($connect, $sql_hangsp);

$sql_mucgia = "SELECT * FROM tbl_mucgia ORDER BY mucgia ASC";
$query_mucgia = mysqli_query($connect, $sql_mucgia);

if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
    unset($_SESSION['dangky']);
}

if (isset($_GET['navigate']) && $_GET['navigate'] == 'dangxuat') {
    unset($_SESSION['login']);
    header('Location: index.php');
}

?>

<div class="header">
    <div class="container text-center header-top">
        <div class="row">
            <div class="col-3">
                <a href="index.php" class=""><img src="img/logo.png" class="img-fluid" alt=""></a>
            </div>
            <div class="col-5 d-flex align-items-center">
                <form class="d-flex w-100" role="search"
                    action="index.php?navigate=timkiem <?php if(isset($_GET['tukhoa'])) echo $_GET['tukhoa'] ?>"
                    method="POST">
                    <input class="form-control me-2" type="search" placeholder="Nhập từ khóa tìm kiếm..." name="tukhoa"
                        aria-label="Nhập từ khóa tìm kiếm...">
                    <button class="btn btn-primary" type="submit" name="timkiemsp"><i
                            class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
            <div class="col-2">
                <div class="row h-100 align-items-center">
                    <div class="col-3">
                        <i class="fa-solid fa-phone fs-3 ms-4 text-primary"></i>
                    </div>
                    <div class="col-9">
                        <p class="mb-0 fs-6">Tư vấn hỗ trợ</p>
                        <p class="mb-0 fs-5 fw-bold text-primary">0987654321</p>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="row h-100 align-item-center">
                    <div class="col-5">
                        <div class="row h-100 align-items-center">
                            <div class="col-6">
                                <div class="cart-block">
                                    <a href="index.php?navigate=giohang"
                                        class="link-underline link-underline-opacity-0 d-block mt-2">
                                        <i class="fa-solid fa-cart-shopping w-100 fs-4"></i>
                                        <?php
                                        if (isset($_SESSION['carts']) && count($_SESSION['carts']) > 0) {
                                            ?>
                                        <div class="cart-quantity">
                                            <?php
                                                    echo count($_SESSION['carts']);
                                                ?>
                                        </div>
                                        <?php
                                        }
                                    ?>
                                    </a>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="cart-block">
                                    <a href="index.php?navigate=xemdonhang"
                                        class="link-underline link-underline-opacity-0 d-block mt-2">
                                        <i class="fa-solid fa-truck w-100 fs-4"></i>
                                        <?php
                                        if (isset($_SESSION['login'])) {
                                            $sql_cart = "SELECT COUNT(*) FROM tbl_cart WHERE id_khachhang = ".$_SESSION['login']."";
                                            $query_cart = mysqli_query($connect, $sql_cart);
                                            $cart_quantity = mysqli_fetch_array($query_cart)[0];
                                            if ($cart_quantity > 0) {
                                                ?>

                                        <div class="cart-quantity" style="right:5px;top:2px;">
                                            <?php
                                                    echo $cart_quantity;
                                                ?>
                                        </div>
                                        <?php
                                            }
                                        }
                                    
                                    ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="row h-100 align-items-center g-0">
                            <div class="col-12">
                                <?php
                                if (!isset($_SESSION['login'])) {
                                    ?>
                                <a href="user/login.php" class="link-underline link-underline-opacity-0 col-6">Đăng
                                    nhập</a>
                                <?php
                                } else {
                                    ?>
                                <div class="dropdown">
                                    <button class="btn noborder dropdown-toggle text-primary" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false"><?php 
                                                $sql = "SELECT * FROM tbl_dangky WHERE id_khachhang = ".$_SESSION['login']."";
                                                $row = mysqli_query($connect, $sql);
                                                $row_data = mysqli_fetch_array($row);

                                                echo $row_data['hoten'];
                                             ?></button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="index.php?navigate=thongtin">Thông tin</a>
                                        </li>
                                        <li><a class="dropdown-item" href="index.php?navigate=dangxuat">Đăng xuất</a>
                                        </li>
                                    </ul>
                                </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-primary-subtle header-bot">
        <div class="container">
            <nav class="navbar navbar-expand p-0">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav fs-6 nav-header">
                            <li class="dropdown nav-item ">
                                <button class="btn btn-dmsp dropdown-toggle hide d-flex align-items-center p-0"
                                    type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="fa-solid fa-bars me-2"></i>
                                    Danh mục sản phẩm
                                </button>
                                <div class="dropdown-menu p-0 header-menu-choose" aria-labelledby="dropdownMenuButton">
                                    <div class="list-group-container d-flex ">
                                        <div class="list-product-by-brain">
                                            <div class="list-group">
                                                <p class="list-product-content fw-bold">Điện thoại theo hãng</p>
                                                <?php
                                                while ($row_hangsp = mysqli_fetch_array($query_hangsp)) {
                                                    echo "<a href='index.php?navigate=theohang&hang_id=".$row_hangsp['id_hangsp']."' class='list-group-item list-group-item-action'>" . $row_hangsp['tenhangsp'] . "</a>";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="list-product-by-price">
                                            <div class="list-group">
                                                <p class="list-product-content fw-bold">Chọn theo mức giá</p>
                                                <?php
                                                    $data = array();
                                                    $count = 0;
                                                    while ($row = mysqli_fetch_array($query_mucgia)) {
                                                        $data[$count] = $row['mucgia'];
                                                        $count++;
                                                    }
                                                    for ($i = 0; $i < $count; $i++) {
                                                        if ($i == 0 && $data[$i] != 0) {
                                                            echo "<a href='index.php?navigate=price_product&from=0&to=".$data[$i]."' class='list-group-item list-group-item-action'>Dưới ".$data[$i]." triệu</a>";
                                                        } elseif ($data[$i] == 0) {
                                                            echo "<a href='index.php?navigate=price_product&from=0&to=".$data[$i+1]."' class='list-group-item list-group-item-action'>Dưới ".$data[$i+1]." triệu</a>";
                                                        } else if ($i >= 1 && $i < $count - 1) {
                                                            echo "<a href='index.php?navigate=price_product&from=".$data[$i]."&to=".$data[$i + 1]."' class='list-group-item list-group-item-action'>Từ ".$data[$i]." - ".$data[$i + 1]." triệu</a>";
                                                        } else {
                                                            echo "<a href='index.php?navigate=price_product&from=".$data[$i]."&to=-1' class='list-group-item list-group-item-action'>Trên ".$data[$i]." triệu</a>";
                                                        }
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="list-product-by-hot">
                                            <div class="list-group">
                                                <p class="list-product-content fw-bold">Sản phẩm bán chạy nhất</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php">Trang chủ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?navigate=gioithieu">Giới thiệu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?navigate=tintuc">Tin tức</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?navigate=cauhoi">Câu hỏi thường gặp</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?navigate=tuyendung">Tuyển dụng</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?navigate=lienhe">Liên hệ</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="modal-notify <?php if(isset($_SESSION['thongbao']) && $_SESSION['thongbao'] != '') echo "show" ?>">
        <div class="notify">
            <div class="notify-header">
                <p class="fs-5 fw-semibold mb-0">
                    Thông báo
                </p>
            </div>
            <div class="content">
                <p class="fs-6 fw-semibold mb-0 text-center notify-contents px-4">
                    <?php

                    if ($_SESSION['thongbao'] == 'hethang') {
                        echo "Không thể thêm<br>Sản phẩm này đã hết hàng !";
                        unset($_SESSION['thongbao']);
                    } elseif ($_SESSION['thongbao'] == 'dathangok') {
                        echo "Đặt hàng thành công !";
                        unset($_SESSION['thongbao']);
                    } elseif ($_SESSION['thongbao'] == 'suadhok') {
                        echo "Đã cập nhật đơn hàng !";
                        unset($_SESSION['thongbao']);
                    } elseif ($_SESSION['thongbao'] == 'nhandh') {
                        echo "Nhận hàng thành công !";
                        unset($_SESSION['thongbao']);
                    } elseif ($_SESSION['thongbao'] == 'huydh') {
                        echo "Đã hủy đơn hàng !";
                        unset($_SESSION['thongbao']);
                    }                  
                ?></p>
            </div>
            <div class="action">
                <button id="btnhiden" class="btn btn-primary w-25">OK</button>
            </div>
        </div>
    </div>
</div>

<script>
const btnhiden = document.querySelector('#btnhiden');
const modal = document.querySelector('.modal-notify');
const notifyContent = document.querySelector('.notify');

notifyContent.addEventListener('click', function(e) {
    e.stopPropagation();
})

btnhiden.addEventListener('click', function() {
    modal.classList.remove('show');
})

modal.addEventListener('click', function() {
    modal.classList.remove('show');
})
</script>