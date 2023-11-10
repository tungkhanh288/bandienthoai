
<?php
    $id = $_GET['id'];
    $sql_kh = "SELECT * FROM tbl_dangky WHERE id_khachhang = $id";
    $query_kh = mysqli_query($connect, $sql_kh);
    $row = mysqli_fetch_array($query_kh);
?>

<div class="container mb-5" style="min-height:750px">
    <form class="" action="./modules/quanlynguoidung/xuly.php?id=<?php echo $_GET['id'] ?>" method="POST">
        <p class="cart-heading mt-0 py-3 fs-5 fw-semibold">Sửa thông tin tai khoản</p>
        <div class="col-4">
            <div class="dathang-infor">
                <div class="mb-3">
                    <label for="idkh" class="form-label">ID</label>
                    <input type="text" class="form-control" id="hoten" disabled name="id" value="<?php echo $row['id_khachhang'] ?>">
                </div>
                <div class="mb-3">
                    <label for="hoten" class="form-label">Tên tài khoản</label>
                    <input type="text" class="form-control" id="hoten"  name="tentk" value="<?php echo $row['tentaikhoan'] ?>">
                </div>
                <div class="mb-3">
                    <label for="sdt" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" id="sdt" required name="sdt" value="<?php echo $row['sodienthoai'] ?>">
                </div>
                <div class="mb-4">
                    <label for="mk" class="form-label">Mật khẩu</label>
                    <input type="text" class="form-control" id="mk" required name="matkhau" value="<?php echo $row['matkhau'] ?>">
                </div>
                <div class="mb-3">
                    <label for="diachi" class="form-label">Địa chỉ</label>
                    <input type="text" class="form-control" id="diachi" required name="diachi" value="<?php echo $row['diachi'] ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $row['email'] ?>">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3" name="xacnhansua">Xác nhận</button>
    </form>
</div>