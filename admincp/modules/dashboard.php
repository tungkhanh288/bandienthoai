<?php
    // Số lượng mặt hàng
    $slsp = mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(*) FROM tbl_sanpham WHERE trangthai = 1"))[0];
    // Số lượng hãng
    $slhsp = mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(*) FROM tbl_hangsp"))[0];
    // Sô lượng đã bán
    $sqlspdb = mysqli_fetch_array(mysqli_query($connect, "SELECT SUM(daban) FROM tbl_sanpham"))[0];
    // Tổng số sản phẩm
    $slsp_tong = mysqli_fetch_array(mysqli_query($connect, "SELECT SUM(soluong) FROM tbl_sanpham WHERE trangthai = 1"))[0];
    // Đơn hàng xác nhận
    $sl_dh_xl = mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(*) FROM tbl_cart WHERE trangthai = 1"))[0];
    // Đơn hàng đang giao
    $sl_dh_dg = mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(*) FROM tbl_cart WHERE trangthai = 2"))[0];
    // Đơn hàng đã giao
    $sl_dh_tc = mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(*) FROM tbl_cart WHERE trangthai = 3"))[0];
    // Đơn hàng của hôm nay
    $dh_hn = mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(*) FROM tbl_cart WHERE ngaydat = '".date('Y-m-d')."'"))[0];
    // Tài khoản đã đk
    $sl_tk = mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(*) FROM tbl_dangky"))[0];
?>

<div class="container">
    <div class="row mt-4">
        <div class="col-3 " style="height: 120px">
            <div class="border border-primary rounded d-flex align-items-center justify-content-center w-100 h-100">
                <p class="text-center fw-medium text-body my-0">
                    Tổng số mặt hàng
                    </br>
                    <span class="fs-2 text-primary">
                        <?php echo $slsp ?>
                    </span>
                </p>
            </div>
        </div>
        <div class="col-3 " style="height: 120px">
            <div class="border border-primary rounded d-flex align-items-center justify-content-center w-100 h-100">
                <p class="text-center fw-medium text-body my-0">
                    Tổng số sản phẩm
                    </br>
                    <span class="fs-2 text-primary">
                        <?php echo $slsp_tong ?>
                    </span>
                </p>
            </div>
        </div>
        <div class="col-3 " style="height: 120px">
            <div class="border border-primary rounded d-flex align-items-center justify-content-center w-100 h-100">
                <p class="text-center fw-medium text-body my-0">
                    Số lượng hãng sản phẩm
                    </br>
                    <span class="fs-2 text-primary">
                        <?php echo $slhsp ?>
                    </span>
                </p>
            </div>
        </div>
        <div class="col-3 " style="height: 120px">
            <div class="border border-primary rounded d-flex align-items-center justify-content-center w-100 h-100">
                <p class="text-center fw-medium text-body my-0">
                    Tổng số sản phẩm đã bán
                    </br>
                    <span class="fs-2 text-primary">
                        <?php echo $sqlspdb ?>
                    </span>
                </p>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-3 " style="height: 120px">
            <div class="border border-primary rounded d-flex align-items-center justify-content-center w-100 h-100">
                <p class="text-center fw-medium text-body my-0">
                    Đơn hàng hôm nay
                    </br>
                    <span class="fs-2 text-primary">
                        <?php echo $dh_hn ?>
                    </span>
                </p>
            </div>
        </div>
        <div class="col-3 " style="height: 120px">
            <div class="border border-primary rounded d-flex align-items-center justify-content-center w-100 h-100">
                <p class="text-center fw-medium text-body my-0">
                    Đơn hàng chờ xác nhận
                    </br>
                    <span class="fs-2 text-primary">
                        <?php echo $sl_dh_xl ?>
                    </span>
                </p>
            </div>
        </div>
        <div class="col-3 " style="height: 120px">
            <div class="border border-primary rounded d-flex align-items-center justify-content-center w-100 h-100">
                <p class="text-center fw-medium text-body my-0">
                    Đơn hàng đang giao
                    </br>
                    <span class="fs-2 text-primary">
                        <?php echo $sl_dh_dg ?>
                    </span>
                </p>
            </div>
        </div>
        <div class="col-3 " style="height: 120px">
            <div class="border border-primary rounded d-flex align-items-center justify-content-center w-100 h-100">
                <p class="text-center fw-medium text-body my-0">
                    Đơn hàng giao thành công
                    </br>
                    <span class="fs-2 text-primary">
                        <?php echo $sl_dh_tc ?>
                    </span>
                </p>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-3 " style="height: 120px">
            <div class="border border-primary rounded d-flex align-items-center justify-content-center w-100 h-100">
                <p class="text-center fw-medium text-body my-0">
                    Tài khoản đã đăng ký
                    </br>
                    <span class="fs-2 text-primary">
                        <?php echo $sl_tk ?>
                    </span>
                </p>
            </div>
        </div>
    </div>
</div>