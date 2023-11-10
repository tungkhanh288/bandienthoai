<?php
    $sql_pro ="SELECT * FROM tbl_sanpham,tbl_hangsp WHERE tbl_sanpham.id_hangsp=tbl_hangsp.id_hangsp  AND tbl_sanpham.id_sp='$_GET[id_sp]' LIMIT 1";
    $query_pro= mysqli_query($connect,$sql_pro);
    while ($row_chitiet=mysqli_fetch_array($query_pro)){
 ?>
<div class="container" style="margin-top: 52px; margin-bottom: 86px">
    <div class="row">
        <div class="col-md-6">
            <div class="hinhanh_sanpham">
                <img src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh']?>">
            </div>
        </div>
        <div class="col-md-6">
            <form action="./pages/main/themgiohang.php?query=them&idsp=<?php echo $row_chitiet['id_sp']?>"
                method="POST">

                <div class="chitiet_sanpham">
                    <h3 style="margin: 8px 0px;"><?php echo $row_chitiet['ten_sp'] ?></h3>
                    <div class="rating d-flex align-items-center">
                        <span class="review-no mr-2 text-warning">4.8</span>
                        <div style="margin: 0 8px" class="stars">
                            <span class="fa fa-star checked text-warning"></span>
                            <span class="fa fa-star checked text-warning"></span>
                            <span class="fa fa-star checked text-warning"></span>
                            <span class="fa fa-star checked text-warning"></span>
                            <span class="fa fa-star checked text-warning"></span>
                        </div>
                    </div>
                    <div class="price d-flex ">
                        <?php $salerandom=rand(10,70) ?>
                        <p class="gia-cu mr-2" style="text-decoration-line: line-through;">
                            <?php echo number_format($row_chitiet['gia']*($salerandom/100)+ $row_chitiet['gia'],0,',','.')?>
                            VNĐ</p>
                        <h5 class="gia-now mx-2 text-danger"><?php echo number_format($row_chitiet['gia'],0,',','.') ?>
                            VNĐ</h5>
                        <span class="ml-2 bg-danger text-white p-1"
                            style="margin-bottom:12px"><?php echo  $salerandom ?>% GIẢM</span>
                    </div>
                    <div class="soluong-sp">
                        <div class="row">
                            <p class="soluong-sp-p"><b>Số lượng:</b></p>
                            <div class="col-md-6">
                                <div class="soluong-container">
                                    <div class="soluong-sp-dem">
                                        <a class="soluong-sp-dem-icon" href="#"><i class="fa-solid fa-minus"></i></a>
                                        <input class="soluong-sp-input text-center ms-2 me-2" type="text" name="soluong"
                                            value="1" style="width:30px">
                                        <a class="soluong-sp-dem-icon" href="#"><i class="fa-solid fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="soluong-sp-info" style="margin:0 -70px">
                                    <p class="soluong-sp-cosan d-inline text-muted">
                                        <?php echo $row_chitiet['soluong'] ?></p>
                                    <span class="soluong-sp-cosan-text d-inline text-muted">sản phẩm còn sẵn</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mota">
                        <p class="mota-text"><b>Tên Hãng:</b> <?php echo $row_chitiet['tenhangsp']?> </p>
                    </div>
                    <div class="product-properties small">
                        <div class="property product-chipset" style="font-size: 16px;">
                            <i class="fas fa-microchip"></i> <?php echo $row_chitiet['chipset'] ?>
                        </div>
                        <div class="property product-screen" style="font-size: 16px;">
                            <i class="fas fa-mobile-alt"></i> <?php echo $row_chitiet['kt_mh'] ?>Inch
                        </div>
                        <div class="property product-ram" style="font-size: 16px;">
                            <i class="fas fa-memory"></i> <?php echo $row_chitiet['ram'] ?>GB
                        </div>
                        <div class="property product-rom" style="font-size: 16px;">
                            <i class="fas fa-hdd"></i> <?php echo $row_chitiet['rom'] ?>GB
                        </div>
                        <div class="property product-battery" style="font-size: 16px;">
                            <i class="fas fa-battery-full"></i> <?php echo $row_chitiet['pin'] ?>mAh
                        </div>
                    </div>
                    <div class="mota">
                        <p class="mota-text"><b>Mô tả:</b> <?php echo $row_chitiet['mota']?> </p>
                    </div>
                    <div class="input-themcart d-inline-flex align-items-center bg-danger rounded">
                        <button type="submit" class="btn btn-danger px-3 py-2">
                            <i class="fa-solid fa-cart-plus text-white mr-2"></i>
                            Thêm vào giỏ hàng</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
    }
 ?>
<script type="text/javascript">
var soluong = document.querySelector('.soluong-sp-input');
var demPlus = document.querySelector('.soluong-sp-dem-icon .fa-plus');
var demMins = document.querySelector('.soluong-sp-dem-icon .fa-minus');
var soluongMax = Number(document.querySelector('.soluong-sp-cosan').innerHTML);
const notifyInner = document.querySelector('.notify-contents');

demPlus.addEventListener('click', function() {
    if (Number(soluong.value) >= soluongMax) {
        notifyInner.innerHTML = "Không thể thêm<br>Sản phẩm này đã hết hàng !";
        modal.classList.add('show');
        soluong.value = soluongMax;
    } else {
        soluong.value = Number(soluong.value) + 1;
    }
});

demMins.addEventListener('click', function() {
    if (soluong.value <= 1) {
        notifyInner.innerHTML = "Số lượng sản phẩm phải lớn hơn bằng 1";
        modal.classList.add('show');
        soluong.value = 1;
    } else {
        soluong.value--;
    }
});
</script>