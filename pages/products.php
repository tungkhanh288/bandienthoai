<?php
//phan trang
if(isset($_GET['trang'])){
    $page = $_GET['trang'];
}else{
    $page ='';
}
if($page =='' || $page == '1'){
    $begin = 0;
}else{
    $begin = ($page * 16) - 16;
}
//
$sql_sp = "SELECT * FROM tbl_sanpham WHERE trangthai=1 ORDER BY id_sp ASC LIMiT $begin,16";
$query_sp = mysqli_query($connect, $sql_sp);

$sql_count_sp = "SELECT COUNT(*) FROM tbl_sanpham WHERE trangthai=1";
$query_count_sp = mysqli_query($connect, $sql_count_sp);
$total_sp = mysqli_fetch_array($query_count_sp)[0];




?>
<div class="product">
    <div class="container">
        <p class="product-heading mt-0 py-3 fs-5 fw-semibold">Tất cả sản phẩm (<?php echo $total_sp ?>)</p>
        <div class="products-list row">
        <?php 
            while($row_sp = mysqli_fetch_array($query_sp)){
                
                $id_sp = $row_sp['id_sp'];
            ?>     
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="product-img position-relative">
                        <img src="admincp/modules/quanlysp/uploads/<?php echo $row_sp['hinhanh'] ?>" class="card-img-top rounded-0" alt="..." style="object-fit: contain">
                    </div>
                    <div class="card-body text-center pt-0">
                        <div class="product-info">
                        <div class="card-content">
                            <h5 class="card-title mb-0 w-75 mx-auto"><a href="index.php?navigate=show_pro&id_sp=<?php echo $id_sp ?>" class="text-dark text-decoration-none fw-semibold"><?php echo $row_sp['ten_sp'] ?></a></h5>
                            <span class="text-danger h4 mb-3 d-block fw-semibold"><?php echo number_format($row_sp['gia'],0,',','.'). 'đ' ?></span>
                        </div>
                        <div class="product-actions">
                            <a href="./pages/main/themgiohang.php?query=them&idsp=<?php echo $id_sp ?>" class="btn btn-primary btn-sm m-1">Thêm vào giỏ hàng</a><br>
                            <?php echo "<a href='index.php?navigate=show_pro&id_sp=$id_sp' class='btn btn-secondary btn-sm m-1'>Xem chi tiết</a>";?>
                        </div>
                        <div class="product-properties text-muted small mt-3">
                            <div class="property product-chipset">
                                <i class="fas fa-microchip"></i> <?php echo $row_sp['chipset'] ?>
                            </div>
                            <div class="property product-screen">
                                <i class="fas fa-mobile-alt"></i> <?php echo $row_sp['kt_mh'] ?> Inch
                            </div>
                            <div class="property product-ram">
                                <i class="fas fa-memory"></i> <?php echo $row_sp['ram'] ?>GB
                            </div>
                            <div class="property product-rom">
                                <i class="fas fa-hdd"></i> <?php echo $row_sp['rom'] ?>GB
                            </div>
                            <div class="property product-battery">
                                <i class="fas fa-battery-full"></i> <?php echo $row_sp['pin'] ?>mAh
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <?php }?>    
        </div>
        
        <ul class="pagination justify-content-center">
        
        <?php
        $sql_trang = mysqli_query($connect, "SELECT * FROM tbl_sanpham WHERE trangthai = 1");
        $row_count = mysqli_num_rows($sql_trang);
        $trang = ceil($row_count/16);
        ?>
         <?php if($page >1){?>
            <li class="page-item"><a class="page-link" href="index.php?trang=<?php echo $page -1 ?>" >Trang trước</a></li>
            <?php } ?>
            <?php 
            for($i =1; $i <= $trang;$i++){
            ?>          
            <li <?php if($i == $page){echo 'class ="active"';} ?> class="page-item"><a class="page-link" href="index.php?trang=<?php echo $i ?>" ><?php echo $i ?></a></li>
            <?php }?>
            
        </ul>
    </div>
</div>







