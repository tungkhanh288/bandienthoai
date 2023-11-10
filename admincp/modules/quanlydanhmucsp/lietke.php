<?php
    $sql_lietke = "SELECT * FROM tbl_hangsp ORDER BY stt ASC";
    $query_lietke_hsp = mysqli_query($connect, $sql_lietke);

    $sql_mucgia = "SELECT * FROM tbl_mucgia ORDER BY mucgia ASC";
    $query_lietke_mucgia = mysqli_query($connect, $sql_mucgia);
?>

<div class="container-xxl mt-4">
    <div class="row">
        <div class="col-6">
            <table class="table table-bordered border-primary caption-top">
                <caption class="fs-5">Danh sách hãng sản phẩm</caption>
                <thead>
                    <tr>
                        <th scope="col" class="col-3">id_hangsp</th>
                        <th scope="col" class="col-4">Tên hãng</th>
                        <th scope="col" class="col-3">Thứ tự</th>
                        <th scope="col" class="col-2">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
            while ($row = mysqli_fetch_array($query_lietke_hsp)) {
            ?>
                    <tr>
                        <td><?php echo $row['id_hangsp'] ?></td>
                        <td><?php echo $row['tenhangsp'] ?></td>
                        <td><?php echo $row['stt'] ?></td>
                        <td>
                            <a class="link-offset-2 link-underline link-underline-opacity-0 me-1"
                                href="./modules/quanlydanhmucsp/xuly.php?idxoa=<?php echo $row['id_hangsp']?>&query=xoahsp">Xóa</a>|
                            <a class="link-offset-2 link-underline link-underline-opacity-0"
                                href="?navigate=qldmsp&query=suahsp&idsua=<?php echo $row['id_hangsp']?>">Sửa</a>
                        </td>
                    </tr>

                    <?php
            }
            ?>
                </tbody>
            </table>
        </div>
        <div class="col-6">
            <table class="table table-bordered border-primary caption-top">
                <caption class="fs-5">Danh sách mức giá</caption>
                <thead>
                    <tr>
                        <th scope="col" class="col-3">id_mucgia</th>
                        <th scope="col" class="col-4">Mức giá</th>
                        <th scope="col" class="col-3">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while ($row_mg = mysqli_fetch_array($query_lietke_mucgia)) {
                            ?>
                    <tr>
                        <td><?php echo $row_mg['id_mucgia'] ?></td>
                        <td><?php echo $row_mg['mucgia'] ?></td>
                        <td>
                            <a class="link-offset-2 link-underline link-underline-opacity-0 me-1"
                                href="./modules/quanlydanhmucsp/xuly.php?idxoa=<?php echo $row_mg['id_mucgia']?>&query=xoamucgia">Xóa</a>|
                            <a class="link-offset-2 link-underline link-underline-opacity-0"
                                href="?navigate=qldmsp&query=suamucgia&idsua=<?php echo $row_mg['id_mucgia']?>">Sửa</a>
                        </td>
                    </tr>

                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>