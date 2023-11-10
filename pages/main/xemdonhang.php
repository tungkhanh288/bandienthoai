<?php

    if (!isset($_SESSION['login'])) {
        $_SESSION['xemdonhang'] = true;
        echo '<script>window.location.href = "user/login.php";</script>';
    }

    $sql_cart = "SELECT * FROM tbl_cart
                INNER JOIN tbl_dangky ON tbl_cart.id_khachhang = tbl_dangky.id_khachhang
                WHERE tbl_cart.id_khachhang = ".$_SESSION['login']." ORDER BY tbl_cart.ngaydat DESC";
    $query_cart = mysqli_query($connect, $sql_cart);

?>

<div class="container mb-5">
    <p class="cart-heading mt-0 py-3 fs-5 fw-bold">Đơn hàng của bạn</p>
    <div class="cart-product-heading row rounded-2">
        <p class="col-1 text-center">Mã ĐH</p>
        <p class="col-2 text-center">Người nhận</p>
        <p class="col-1 text-center">SDT</p>
        <p class="col-3 text-center">Địa chỉ</p>
        <p class="col-1 text-center">Ngày đặt</p>
        <p class="col-1 text-center">Ngày nhận</p>
        <p class="col-2 text-center">HTTT</p>
        <p class="col-1 text-center">Trạng thái</p>
    </div>
    <div class="oder-list">
        <?php
            while ($row = mysqli_fetch_array($query_cart)){
        ?>
        <div class="oder-item mt-2 row rounded-2 border border-light-subtle">
            <div class="col-1 d-flex align-items-center justify-content-center fw-semibold text-center">
                <a
                    href="index.php?navigate=chitietdh&code_cart=<?php echo $row['code_cart'] ?>"><?php echo $row['code_cart'] ?></a>
            </div>
            <div class="col-2 d-flex align-items-center justify-content-center fw-semibold text-center">
                <span><?php echo $row['hoten'] ?></span>
            </div>
            <div class="col-1 d-flex align-items-center justify-content-center fw-semibold text-center">
                <span><?php echo $row['sdt'] ?></span>
            </div>
            <div class="col-3 d-flex align-items-center justify-content-center fw-semibold ps-4 pe-4 text-center">
                <span><?php echo $row['dc'] ?></span>
            </div>
            <div class="col-1 d-flex align-items-center justify-content-center fw-semibold text-center">
                <span><?php echo date('d-m-Y', strtotime($row['ngaydat'])) ?></span>
            </div>
            <div class="col-1 d-flex align-items-center justify-content-center fw-semibold text-center">
                <span><?php if ($row['ngaynhan'] != '') echo date('d-m-Y', strtotime($row['ngaynhan']))?></span>
            </div>
            <div class="col-2 d-flex align-items-center justify-content-center fw-semibold text-center ps-2 pe-2">
                <span><?php echo $row['thanhtoan'] ?></span>
            </div>
            <div class="col-1 d-flex align-items-center justify-content-center fw-semibold text-center">
                <?php 
                    if ($row['trangthai'] == 1) {
                        echo "<span class='text-danger'>Chờ xác nhận</span>";
                    } elseif ($row['trangthai'] == 2) {
                        echo "<span class='text-primary'>Đang giao</span>";
                    } elseif ($row['trangthai'] == 3) {
                        echo "<span class='text-success'>Đã nhận</span>";
                    }
                ?>
            </div>
        </div>
        <?php
            }
        ?>
    </div>
</div>