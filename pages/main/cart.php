<?php
    if (isset($_SESSION['carts'])) {
?>

<div class="cart">
    <div class="container mb-5" style="height: 800px">
        <p class="cart-heading mt-0 py-3 fs-5 fw-bold">Giỏ hàng của bạn</p>
        <div class="cart-product-heading row ps-1 pe-4 rounded-2">
            <p class="col-5 text-center">Sản phẩm</p>
            <p class="col-2 text-center">Đơn giá</p>
            <p class="col-2 text-center">Số lượng</p>
            <p class="col-2 text-center">Số tiền</p>
            <p class="col-1 text-center">Thao tác</p>
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
                    <div class="col-6 cart-product-name d-flex flex-column align-items-center justify-content-center fw-semibold">
                        <p class="m-0 fs-6"><?php echo $row['tensp'] ?></p>
                        <p class="m-0 fw-normal fs-6"><?php echo $data_sp['ram']?>GB-<?php echo $data_sp['rom']?>GB</p>
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
                        <a href="./pages/main/themgiohang.php?query=giam&id=<?php echo $row['id'] ?>">
                            <button type="button" class="btn btn-light btn-sm">
                                <i class="fa-solid fa-minus"></i>
                            </button>
                        </a>
                        <input readonly type="text" name="quantity" value="<?php echo $row['soluong'] ?>" style="width:30px"
                            class="text-center mx-2">
                        <a href="./pages/main/themgiohang.php?query=tang&id=<?php echo $row['id'] ?>">
                            <button type="button" class="btn btn-light btn-sm">
                                <i class="fa-solid fa-plus"></i>
                            </button></a>
                    </div>
                </div>
                <div class="col-2 d-flex align-items-center justify-content-center fw-semibold">
                    <div class="cart-product-cost">
                        <p class="m-0"><?php echo number_format($row['gia']*$row['soluong'],0,',','.') ?> đ</p>
                    </div>
                </div>
                <div class="col-1 d-flex align-items-center justify-content-center">
                    <div class="cart-product-action">
                        <a href="./pages/main/themgiohang.php?query=xoa&idsp=<?php echo $row['id'] ?>"
                            class="link-underline link-underline-opacity-0">
                            <button type="button" class="btn btn-primary btn-sm">Xóa</button>
                        </a>
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
                <div class="col-2 cart-product-oder d-flex align-items-center justify-content-center fw-semibold">
                        <button type="button" class="btn btn-primary"
                            <?php if (count($_SESSION['carts']) == 0) echo "disabled" ?>><a href="index.php?navigate=dathang" class="link-offset-2 link-underline link-underline-opacity-0 text-white fw-medium px-1 py-2">Đặt hàng</a></button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    } else {

?>

<div class="container" style="height: 800px">
    <p class="cart-heading mt-0 py-3 fs-5 fw-bold">Giỏ hàng của bạn đang trống</p>
    <div class="cart-product-heading row ps-1 pe-4 rounded-2">
        <p class="col-5 text-center">Sản phẩm</p>
        <p class="col-2 text-center">Đơn giá</p>
        <p class="col-2 text-center">Số lượng</p>
        <p class="col-2 text-center">Số tiền</p>
        <p class="col-1 text-center">Thao tác</p>
    </div>
    <div class="cart-product-foot rounded-3">
        <div class="row h-100 justify-content-between">
            <div
                class="col-3 cart-product-totals d-flex align-items-center justify-content-center fw-semibold fs-5 text-primary">
                <p class="m-0">
                    Tổng tiền : 0 đ
                </p>
            </div>
            <div class="col-2 cart-product-oder d-flex align-items-center justify-content-center fw-semibold">
                <button type="button" class="btn btn-primary" disabled>Đặt hàng</button>
            </div>
        </div>
    </div>
</div>

<?php

    }
?>