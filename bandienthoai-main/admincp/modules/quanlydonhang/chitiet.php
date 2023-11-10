<?php
    $sql_cart = "SELECT * FROM tbl_cart
                INNER JOIN tbl_dangky ON tbl_cart.id_khachhang = tbl_dangky.id_khachhang
                WHERE tbl_cart.id_khachhang = ".$_GET['id_kh']." AND tbl_cart.code_cart = ".$_GET['code_cart']."";
    $query_cart = mysqli_query($connect, $sql_cart);
    $cart_data = mysqli_fetch_array($query_cart);

    $sql_sp = "SELECT * FROM tbl_cart_info
                INNER JOIN tbl_sanpham ON tbl_cart_info.id_sp = tbl_sanpham.id_sp
                WHERE tbl_cart_info.code_cart = ".$_GET['code_cart']."
    ";
    $query_sp = mysqli_query($connect, $sql_sp);
?>

<div class="container" style="min-height: 800px;">
    <p class="cart-heading mt-0 py-3 fs-5 fw-semibold">Chi tiết đơn hàng
        <?php echo "<span class='text-primary'>".$_GET['code_cart']."</span>" ?></p>
    <div class="phongbi"></div>
    <div class="person-infor">
        <p class="fs-5 fw-semibold mt-4">Địa chỉ nhận hàng</p>
        <p class="fs-6 fw-semibold mb-1"><?php echo $cart_data['hoten'] ?></p>
        <p class="fs-6 fw-medium mb-1"><?php echo $cart_data['sdt'] ?></p>
        <p class="fs-6 fw-medium mb-1"><?php echo $cart_data['dc'] ?></p>
        <p class="fs-6 fw-medium mb-1">HTTT: <?php echo $cart_data['thanhtoan'] ?></p>
        <p class="fs-6 fw-medium mb-1">Ngày đặt: <?php echo date('d-m-Y', strtotime($cart_data['ngaydat'])) ?></p>
        <p class="fs-6 fw-medium mb-1">Ngày nhận: <?php if ($cart_data['ngaynhan'] != '') echo date('d-m-Y', strtotime($cart_data['ngaynhan'])); else echo "--/--/----" ?></p>
        <p class="fs-6 fw-medium mb-1">Trạng thái đơn hàng:
            <?php 
                    if ($cart_data['trangthai'] == 1) {
                        echo "<span class='text-danger'>Chờ xác nhận</span>";
                    } elseif ($cart_data['trangthai'] == 2) {
                        echo "<span class='text-primary'>Đang giao</span>";
                    } else {
                        echo "<span class='text-success'>Đã nhận</span>";
                    }
                ?></p>

        <a class="link-offset-2 link-underline link-underline-opacity-0 d-block mt-4" href="index.php?navigate=qldh&query=sua&code_cart=<?php echo $_GET['code_cart'] ?>">
            <button class="btn btn-primary">Sửa</button>
        </a>

    </div>
    <div class="cart-product-heading row ps-1 pe-4 rounded-2 mt-4">
        <p class="col-6 text-center">Sản phẩm</p>
        <p class="col-2 text-center">Đơn giá</p>
        <p class="col-2 text-center">Số lượng</p>
        <p class="col-2 text-center">Số tiền</p>
    </div>
    <div class="cart-product-list mt-2 ">
        <?php
            $tong = 0;
            while ($row = mysqli_fetch_array($query_sp)){
                $tong += $row['gia']*$row['sl'];
                $query_sp = mysqli_query($connect, "SELECT * FROM tbl_sanpham WHERE id_sp=".$row['id_sp']."");
                $data_sp = mysqli_fetch_array($query_sp);
        ?>

        <div class="row cart-product-item mb-2 ms-1 me-1">
            <div class="col-6 d-flex h-100">
                <div class="col-6 cart-product-name d-flex flex-column align-items-center justify-content-center fw-semibold">
                    <p class="m-0"><?php echo $row['ten_sp'] ?></p>
                    <p class="m-0 fw-normal fs-6"><?php echo $data_sp['ram']?>GB-<?php echo $data_sp['rom']?>GB</p>
                </div>
                <div class="col-6 cart-product-image d-flex align-items-center justify-content-center">
                    <img src="./modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" alt="">
                </div>
            </div>
            <div class="col-2 d-flex align-items-center justify-content-center fw-semibold">
                <div class="cart-product-price text-center">
                    <p class="m-0"><?php echo number_format($row['gia'],0,',','.') ?> đ</p>
                </div>
            </div>
            <div class="col-2 d-flex align-items-center justify-content-center fw-semibold">
                <div class="cart-product-quantity d-flex">

                    <p><?php echo $row['sl'] ?></p>
                </div>
            </div>
            <div class="col-2 d-flex align-items-center justify-content-center fw-semibold">
                <div class="cart-product-cost">
                    <p class="m-0"><?php echo number_format($row['gia']*$row['sl'],0,',','.') ?> đ</p>
                </div>
            </div>
        </div>

        <?php
            }
        ?>
    </div>
    <div class="cart-product-foot rounded-3 mb-4" style="height:60px">
        <div class="row h-100 justify-content-between">
            <div
                class="col-3 cart-product-totals d-flex align-items-center justify-content-center fw-semibold fs-5 text-primary">
                <p class="m-0">
                    Tổng tiền :
                    <?php
                        echo number_format($tong,0,',','.');
                        ?>
                    đ
                </p>
            </div>
        </div>
    </div>
</div>