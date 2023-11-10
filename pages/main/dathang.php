<?php
    if (!isset($_SESSION['login'])) {
        $_SESSION['dathang'] = true;
        echo '<script>window.location.href = "user/login.php";</script>';
    }

    $sql_kh = "SELECT * FROM tbl_dangky WHERE id_khachhang = ".$_SESSION['login']."";
    $query_kh = mysqli_query($connect, $sql_kh);
    $kh_data = mysqli_fetch_array($query_kh);
?>
<div class="dathang">
    <form action="./pages/main/themdonhang.php" method="POST">

        <div class="container mb-5">

            <p class="cart-heading mt-0 py-3 fs-5 fw-semibold">Thông tin đơn hàng</p>
            <div class="dathang-infor">
                <div class="mb-3">
                    <label for="hoten" class="form-label">Người nhận</label>
                    <input type="text" class="form-control" id="hoten" disabled name="hoten"
                        value="<?php echo $kh_data['hoten'] ?>">
                </div>
                <div class="mb-3">
                    <label for="sdt" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" id="sdt" required name="sdt"
                        value="<?php echo $kh_data['sodienthoai'] ?>">
                </div>
                <div class="mb-4">
                    <label for="dc" class="form-label">Địa chỉ</label>
                    <input type="text" class="form-control" id="dc" required name="diachi"
                        value="<?php echo $kh_data['diachi'] ?>">
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="thanhtoan">Hình thức thanh toán</label>
                    <select class="form-select" id="thanhtoan" name="httt">
                        <option selected value="Chuyển khoản">Chuyển khoản</option>
                        <option value="Thanh toán khi nhận hàng">Thanh toán khi nhận hàng</option>
                    </select>
                </div>
            </div>
            <div class="product-list">
                <p class="cart-heading mt-0 py-3 fs-5 fw-semibold">Sản phẩm</p>
                <div class="cart-product-heading row ps-1 pe-4 rounded-2">
                    <p class="col-5 text-center">Sản phẩm</p>
                    <p class="col-2 text-center">Đơn giá</p>
                    <p class="col-2 text-center">Số lượng</p>
                    <p class="col-3 text-center">Số tiền</p>
                </div>

                <div class="cart-product-list mt-2 ">
                    <?php
            // print_r($_SESSION['cart']);
            $tong = 0;
            foreach($_SESSION['carts'] as $row) {
                $tong += $row['soluong'] * $row['gia'];
                $query_sp = mysqli_query($connect, "SELECT * FROM tbl_sanpham WHERE id_sp=".$row['id']."");
                $data_sp = mysqli_fetch_array($query_sp);
            ?>
                    <div class="row cart-product-item mb-2 ms-1 me-1">
                        <div class="col-5 d-flex h-100">
                            <div
                                class="col-6 cart-product-name d-flex flex-column align-items-center justify-content-center fw-semibold">
                                <p class="m-0"><?php echo $row['tensp'] ?></p>
                                <p class="m-0 fw-normal fs-6">
                                    <?php echo $data_sp['ram']?>GB-<?php echo $data_sp['rom']?>GB</p>

                            </div>
                            <div class="col-6 cart-product-image d-flex align-items-center justify-content-center">
                                <img src="./admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" alt="">
                            </div>
                        </div>
                        <div class="col-2 d-flex align-items-center justify-content-center fw-semibold">
                            <div class="cart-product-price text-center">
                                <p class="m-0"><?php echo number_format($row['gia'],0,',','.') ?> đ</p>
                            </div>
                        </div>
                        <div class="col-2 d-flex align-items-center justify-content-center fw-semibold">
                            <div class="cart-product-quantity d-flex">
                                <span><?php echo $row['soluong'] ?></span>
                            </div>
                        </div>
                        <div class="col-3 d-flex align-items-center justify-content-center fw-semibold">
                            <div class="cart-product-cost">
                                <p class="m-0"><?php echo number_format($row['gia']*$row['soluong'],0,',','.') ?> đ</p>
                            </div>
                        </div>
                    </div>
                    <?php
            }
            ?>
                </div>
                <div class="cart-product-foot rounded-3">
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
                        <div
                            class="col-2 cart-product-oder d-flex align-items-center justify-content-center fw-semibold">
                            <button type="submit" class="btn btn-primary" name="dathang">Đặt hàng</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>