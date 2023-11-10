<?php

    if(isset($_GET['trang'])){
        $page = $_GET['trang'];
    }else{
        $page ='';
    }
    if($page =='' || $page == '1'){
        $begin = 0;
    }else{
        $begin = ($page *16)-16;
    }
    if ($_GET['to'] != -1) {
        $from = $_GET['from'];
        $to = $_GET['to'];
        $sql = "SELECT COUNT(*) FROM tbl_sanpham WHERE gia > $from*1000000 AND gia < $to*1000000";
        $sql_pro = "SELECT * FROM tbl_sanpham WHERE gia > $from*1000000 AND gia < $to*1000000 ORDER BY id_sp ASC LIMIT $begin, 4";
    } else {
        $from = $_GET['from'];
        $sql = "SELECT COUNT(*) FROM tbl_sanpham WHERE gia > $from*1000000";
        $sql_pro = "SELECT * FROM tbl_sanpham WHERE gia > $from*1000000
     ORDER BY id_sp ASC LIMIT $begin, 16";
    }

    // lấy số lương
    $query = mysqli_query($connect, $sql);
    $query_data = mysqli_fetch_array($query)[0];

    // lấy dữ liệu
    $query_pro= mysqli_query($connect,$sql_pro);
?>
<div class="product">
    <div class="container" style="min-height:800px">
        <?php
            if ($_GET['to'] != -1) {
        ?>
        <p class="product-heading mt-0 py-3 fs-5 fw-semibold">Sản phẩm có giá từ <?php echo $from ?> - <?php echo $to ?> triệu (<?php echo $query_data ?>)</p>
        <?php
            }else {
        ?>
        <p class="product-heading mt-0 py-3 fs-5 fw-semibold">Sản phẩm có giá trên <?php echo $from ?> triệu (<?php echo $query_data ?>)</p>
        <?php
            }
        ?>
        <div class="products-list row">      
            <?php 
            while($row_pro = mysqli_fetch_array($query_pro)){
                $id_sp = $row_pro['id_sp'];
            ?>     
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="product-img position-relative">
                        <img src="admincp/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh'] ?>" class="card-img-top rounded-0" alt="..." style="object-fit:contain">
                    </div>
                    <div class="card-body text-center pt-0">
                        <div class="card-content">
                            <h5 class="card-title mb-0 w-75 mx-auto"><a href="index.php?navigate=show_pro&id_sp=<?php echo $id_sp ?>" class="text-dark text-decoration-none fw-semibold"><?php echo $row_pro['ten_sp'] ?></a></h5>
                            <span class="text-danger h4 mb-3 d-block fw-semibold"><?php echo number_format($row_pro['gia'],0,',','.'). 'đ' ?></span>
                        </div>
                        <div class="product-actions">
                            <a href="./pages/main/themgiohang.php?query=them&idsp=<?php echo $id_sp ?>" class="btn btn-primary btn-sm m-1">Thêm vào giỏ hàng</a><br>
                            <?php echo "<a href='index.php?navigate=show_pro&id_sp=$id_sp' class='btn btn-secondary btn-sm m-1'>Xem chi tiết</a>";?>
                        </div>
                        <div class="product-properties text-muted small mt-3">
                            <div class="property product-chipset">
                                <i class="fas fa-microchip"></i> <?php echo $row_pro['chipset'] ?>
                            </div>
                            <div class="property product-screen">
                                <i class="fas fa-mobile-alt"></i> <?php echo $row_pro['kt_mh'] ?> Inch
                            </div>
                            <div class="property product-ram">
                                <i class="fas fa-memory"></i> <?php echo $row_pro['ram'] ?>GB
                            </div>
                            <div class="property product-rom">
                                <i class="fas fa-hdd"></i> <?php echo $row_pro['rom'] ?>GB
                            </div>
                            <div class="property product-battery">
                                <i class="fas fa-battery-full"></i> <?php echo $row_pro['pin'] ?>mAh
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }?>         
        </div>
        <ul class="pagination justify-content-center">
        
        <?php
        if ($_GET['to'] == -1) {
            $sql_trang = mysqli_query($connect, "SELECT * FROM tbl_sanpham WHERE gia > $from*1000000 AND trangthai = 1");
        } else {
            $sql_trang = mysqli_query($connect, "SELECT * FROM tbl_sanpham WHERE gia > $from*1000000 AND gia < $to*1000000 AND trangthai = 1");
        }
        $row_count = mysqli_num_rows($sql_trang);
        $trang = ceil($row_count/16);
        ?>
        <?php if($page >1){?>
            <li class="page-item">
                <a class="page-link" href="index.php?navigate=price_product&from=<?php echo $from ?>&to=<?php echo $to ?>&trang=<?php echo $page - 1 ?>">Trang trước</a>
            </li>
        <?php 
            }
        ?>
        <?php 
            for($i = 1; $i <= $trang;$i++){
        ?>          
            <li <?php if($i == $page) { echo 'class="active"'; } ?> class='page-item'><a class='page-link' href='index.php?navigate=price_product&from=<?php echo $from ?>&to=<?php echo $to ?>&trang=<?php echo $i ?>'><?php echo $i ?></a></li>
        <?php 
            }
        ?>
            
        </ul>
        
    </div>
</div>