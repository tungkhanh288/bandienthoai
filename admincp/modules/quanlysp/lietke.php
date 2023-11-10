<?php
    $sql_lietke = "SELECT * FROM tbl_sanpham ORDER BY id_sp  ASC";
    $query_lietke_sp = mysqli_query($connect, $sql_lietke);
?>

<div style="margin: 0 25px" class=" mt-4">
    <table  class="table table-bordered border-primary caption-top">
        <caption class="fs-5">Danh sách sản phẩm</caption>
        <thead>
            <tr>
                <th scope="col" >Id SP</th>
                <th scope="col" >Mã SP</th>
                <th scope="col" class="col-2">Tên SP</th>
                <th scope="col" class="col-2">Hình ảnh</th>
                <th scope="col" >Id Hãng SP</th>
                <th scope="col" >Giá</th>
                <th scope="col" >Kích Thước</th>
                <th scope="col" class="col-2">Camera</th>
                <th scope="col" >Chip set</th>
                <th scope="col" >Ram</th>
                <th scope="col" >Rom</th>
                <th scope="col" >Pin</th>
                <th scope="col" >Sim</th>
                <th scope="col" >Hệ ĐH</th>
                <th scope="col" class ="col-4">Mô tả</th>
                <th scope="col" >Số Lượng</th>
                <th scope="col" >Đã bán</th>
                <th scope="col" >Trạng Thái</th>
                <th scope="col" class="col-1">Time Rammat</th>
                <th class="col-1"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i =0;
            while ($row = mysqli_fetch_array($query_lietke_sp)) {
                $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row['ma_sp'] ?></td>
                <td><?php echo $row['ten_sp'] ?></td>
                <td><img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" width="150px"></td>
                <td><?php echo $row['id_hangsp'] ?></td>
                <td><?php echo $row['gia'] ?></td>
                <td><?php echo $row['kt_mh'] ?></td>
                <td><?php echo $row['camera'] ?></td>
                <td><?php echo $row['chipset'] ?></td>
                <td><?php echo $row['ram'] ?></td>
                <td><?php echo $row['rom'] ?></td>
                <td><?php echo $row['pin'] ?></td>
                <td><?php echo $row['sim'] ?></td>
                <td><?php echo $row['heDH'] ?></td>
                <td><?php echo $row['mota'] ?></td>
                <td><?php echo $row['soluong'] ?></td>
                <td><?php echo $row['daban'] ?></td>
                <td>
                    <?php
                    if($row['trangthai']==1){
                        echo 'Kích hoạt';
                    }else{
                        echo 'Ẩn';
                    }
                    ?>

                </td>
                <td><?php echo $row['time_rammat'] ?></td>
                <td>
                <a class="link-offset-2 link-underline link-underline-opacity-0 me-1" href="./modules/quanlysp/xuly.php?id_sp=<?php echo $row['id_sp']?>&query=xoa">Xóa</a>|
                <a class="link-offset-2 link-underline link-underline-opacity-0" href="?navigate=qlsp&query=sua&idsua=<?php echo $row['id_sp']?>">Sửa</a>
                </td>
            </tr>

            <?php
            }
        ?>
        </tbody>
    </table>
</div>