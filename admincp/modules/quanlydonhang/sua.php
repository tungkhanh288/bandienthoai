<?php
    $code_cart = $_GET['code_cart'];

    $sql = "SELECT * FROM tbl_cart INNER JOIN tbl_dangky ON tbl_cart.id_khachhang = tbl_dangky.id_khachhang WHERE code_cart=$code_cart";
    $query = mysqli_query($connect, $sql);
    $cart_data = mysqli_fetch_array($query);

    $sql_sp = "SELECT * FROM tbl_cart_info INNER JOIN tbl_sanpham ON tbl_cart_info.id_sp = tbl_sanpham.id_sp WHERE code_cart = $code_cart";
    $query_sp = mysqli_query($connect, $sql_sp);

    $sql_kh = "SELECT * FROM tbl_dangky";
    $query_kh = mysqli_query($connect, $sql_kh);
?>

<div class="container mb-5" style="min-height:750px">
    <form class="" action="./modules/quanlydonhang/xuly.php?code_cart=<?php echo $_GET['code_cart'] ?>" method="POST">
        <p class="cart-heading mt-0 py-3 fs-5 fw-semibold">Sửa thông tin đơn hàng</p>
        <div class="col-4">
            <div class="dathang-infor">
                <div class="mb-3">
                    <label for="idkh" class="form-label">ID Khách hàng</label>
                    <select name="idkh" id="idkh" class="form-select">
                        <?php
                            while ($row = mysqli_fetch_array($query_kh)) {
                        ?>
                            <option <?php if($row['id_khachhang'] == $cart_data['id_khachhang']) echo "selected" ?> value="<?php echo $row['id_khachhang'] ?>"><?php echo "id: ".$row['id_khachhang']." - ".$row['tentaikhoan']." - ".$row['hoten'] ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="hoten" class="form-label">Người nhận</label>
                    <input type="text" class="form-control" id="hoten" disabled name="hoten" value="<?php echo $cart_data['hoten'] ?>">
                </div>
                <div class="mb-3">
                    <label for="sdt" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" id="sdt" required name="sdt"
                        value="<?php echo $cart_data['sdt'] ?>">
                </div>
                <div class="mb-4">
                    <label for="dc" class="form-label">Địa chỉ</label>
                    <input type="text" class="form-control" id="dc" required name="diachi"
                        value="<?php echo $cart_data['dc'] ?>">
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="thanhtoan">Hình thức thanh toán</label>
                                    <select class="form-select" id="thanhtoan" name="httt">
                    <?php
                        if ($cart_data['thanhtoan'] == "Chuyển khoản"){
                    ?>
                        <option selected value="Chuyển khoản">Chuyển khoản</option>
                        <option value="Thanh toán khi nhận hàng">Thanh toán khi nhận hàng</option>
                    <?php
                        }else{
                    ?>
                        <option value="Chuyển khoản">Chuyển khoản</option>
                        <option selected value="Thanh toán khi nhận hàng">Thanh toán khi nhận hàng</option>
                        <?php
                        }
                    ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="ngaydat" class="form-label">Ngày đặt</label>
                    <input type="date" class="form-control" id="ngaydat" required name="ngaydat"
                        value="<?php echo $cart_data['ngaydat'] ?>">
                </div>
                <div class="mb-3">
                    <label for="ngaynhan" class="form-label">Ngày nhận</label>
                    <input type="date" class="form-control" id="ngaynhan" name="ngaynhan"
                        value="<?php if($cart_data['ngaynhan'] != '') echo$cart_data['ngaynhan'] ?>">
                </div>
                <div class="mb-3">
                    <label for="tt" class="form-label">Trạng thái</label>
                    <select class="form-select" id="tt" name="trangthai">
                        <option <?php if ($cart_data['trangthai'] == 1) echo "selected" ?> value="1">Chờ xử lý</option>
                        <option <?php if ($cart_data['trangthai'] == 2) echo "selected" ?> value="2">Đang giao</option>
                        <option <?php if ($cart_data['trangthai'] == 3) echo "selected" ?> value="3">Đã nhận</option>
                    </select>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3" name="xacnhan">Xác nhận</button>
    </form>
</div>

<script>

    const selectBox = document.querySelector("#idkh");
    const inputBox = document.querySelector("#hoten");

    console.log(selectBox);
    selectBox.addEventListener("change", function() {
        const value = selectBox.options[selectBox.selectedIndex].innerHTML;
        const arr = value.split(' - ');
        inputBox.value = arr[arr.length-1];
    })
</script>