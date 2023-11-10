<?php
    $sql_tk = "SELECT * FROM tbl_dangky ";
    $query_tk = mysqli_query($connect, $sql_tk);
?>

<div class="w-75 mx-auto">
    <p class="cart-heading mt-0 py-3 fs-5 fw-semibold">Danh sách tài khoản</p>
    <table class="table table-bordered border-primary caption-top text-center">
        <thead>
            <tr>
                <th scope="col" class="col-1">ID</th>
                <th scope="col" class="col-1">Tên tài khoản</th>
                <th scope="col" class="col-1">Số điện thoại</th>
                <th scope="col" class="col-1">Mật khẩu</th>
                <th scope="col" class="col-1">Địa chỉ</th>
                <th scope="col" class="col-1">email</th>
                <th scope="col" class="col-2">Thao tác</th>
            </tr>
        </thead>
        <tbody>
        <?php
                while($row = mysqli_fetch_array($query_tk)){
            ?>
            <tr class="text-canter" style="height:50px">
                <td><?php echo $row['id_khachhang'] ?></td>
                <td><?php echo $row['tentaikhoan'] ?></td>
                <td><?php echo $row['sodienthoai'] ?></td>
                <td><?php echo $row['matkhau'] ?></td>
                <td><?php echo $row['diachi'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td>
                    <a class="link-offset-2 link-underline link-underline-opacity-0" href="index.php?navigate=qlnd&query=sua&id=<?php echo $row['id_khachhang'] ?>">Sửa</a> |
                    <a class="link-offset-2 link-underline link-underline-opacity-0" href="./modules/quanlynguoidung/xuly.php?query=xoatk&idtk=<?php echo $row['id_khachhang'] ?>">Xóa</a>
                </td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</div>