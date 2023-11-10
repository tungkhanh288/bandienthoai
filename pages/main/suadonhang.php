<?php


    if (isset($_POST['xacnhan'])) {
        session_start();
        include('../../admincp/config/connect.php');
        $sdt = $_POST['sdt'];
        $diachi = $_POST['diachi'];
        $tt = $_POST['httt'];
        $sql = "UPDATE tbl_cart SET sdt = '".$sdt."', dc = '".$diachi."', thanhtoan = '".$tt."' WHERE code_cart=".$_GET['code_cart']."";
        $query = mysqli_query($connect, $sql);
        $_SESSION['thongbao'] = 'suadhok';
        header('Location: ../../index.php?navigate=chitietdh&code_cart='.$_GET['code_cart'].'');
    } else {
        $sql_cart = "SELECT * FROM tbl_cart
        INNER JOIN tbl_dangky ON tbl_cart.id_khachhang = tbl_dangky.id_khachhang
        WHERE tbl_cart.id_khachhang = ".$_SESSION['login']." AND tbl_cart.code_cart = ".$_GET['code_cart']."";
        $query_cart = mysqli_query($connect, $sql_cart);
        $cart_data = mysqli_fetch_array($query_cart);   
    }
?>


<div class="container mb-5" style="min-height:750px">
    <form class="w-40" action="./pages/main/suadonhang.php?code_cart=<?php echo $_GET['code_cart'] ?>" method="POST">
        <p class="cart-heading mt-0 py-3 fs-5 fw-semibold">Sửa thông tin nhận hàng</p>
        <div class="dathang-infor">
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
            <button type="submit" class="btn btn-primary mt-3" name="xacnhan">Xác nhận</button>
        </div>
    </form>
</div>