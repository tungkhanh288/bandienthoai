<?php
    $sql_cart = "SELECT * FROM tbl_cart INNER JOIN tbl_dangky ON tbl_cart.id_khachhang = tbl_dangky.id_khachhang ORDER BY ngaydat DESC";
    $query_cart = mysqli_query($connect, $sql_cart);
?>

<div class="w-75 mx-auto">
    <p class="cart-heading mt-0 py-3 fs-5 fw-semibold">Danh sách đơn hàng</p>
    <table class="table table-bordered border-primary caption-top text-center">
        <thead>
            <tr>
                <th scope="col" class="col-1">Mã DH</th>
                <th scope="col" class="col-1">Tài khoản</th>
                <th scope="col" class="col-1">Người nhận</th>
                <th scope="col" class="col-1">Địa chỉ</th>
                <th scope="col" class="col-1">SDT</th>
                <th scope="col" class="col-1">HTTT</th>
                <th scope="col" class="col-1">Ngày đặt</th>
                <th scope="col" class="col-1">Ngày nhận</th>
                <th scope="col" class="col-1">Trạng thái</th>
                <th scope="col" class="col-2">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($row = mysqli_fetch_array($query_cart)){
            ?>
            <tr class="text-canter" style="height:100px">
                <td>
                    <span><?php echo $row['code_cart'] ?></span>
                </td>
                <td><?php echo $row['tentaikhoan'] ?></td>
                <td><?php echo $row['hoten'] ?></td>
                <td><?php echo $row['dc'] ?></td>
                <td><?php echo $row['sdt'] ?></td>
                <td><?php echo $row['thanhtoan'] ?></td>
                <td><?php echo date('d-m-Y', strtotime($row['ngaydat']))?></td>
                <td><?php if($row['ngaynhan'] != '') echo date('d-m-Y', strtotime($row['ngaynhan'])) ?></td>
                <td class="fw-semibold">
                    <?php 
                        if ($row['trangthai'] == 1) {
                            echo "<p class='text-danger'>Chờ xác nhận</p>";
                            echo "<a class='link-offset-2 link-underline link-underline-opacity-0' href='./modules/quanlydonhang/xuly.php?query=xacnhan&code_cart=".$row['code_cart']."'>Xác nhận (Giao hàng)</a>";
                        } elseif ($row['trangthai'] == 2) {
                            echo "<span class='text-primary'>Đang giao</span>";
                        } else {
                            echo "<span class='text-success'>Đã nhận</span>";
                        } 
                    ?>
                </td>
                <td>
                    <a class="link-offset-2 link-underline link-underline-opacity-0" href="index.php?navigate=qldh&query=chitiet&code_cart=<?php echo $row['code_cart'] ?>&id_kh=<?php echo $row['id_khachhang'] ?>">Xem chi tiết</a> |
                    <a class="link-offset-2 link-underline link-underline-opacity-0" href="index.php?navigate=qldh&query=sua&code_cart=<?php echo $row['code_cart'] ?>">Sửa</a> |
                    <a class="link-offset-2 link-underline link-underline-opacity-0" href="./modules/quanlydonhang/xuly.php?query=xoa&code_cart=<?php echo $row['code_cart'] ?>">Xóa</a>
                    <br />
                    <a class="link-offset-2 link-underline link-underline-opacity-0" href="index.php?navigate=qldh&query=indonhang&code_cart=<?php echo $row['code_cart'] ?>&id_kh=<?php echo $row['id_khachhang'] ?>">In đơn hàng</a>
                </td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</div>