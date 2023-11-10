<?php
    $id = $_GET['idsua'];
    $sql_sua = "SELECT * FROM tbl_sanpham WHERE id_sp = '".$id."'";
    $query_sua = mysqli_query($connect, $sql_sua);
    $data_sua = mysqli_fetch_array($query_sua);
?>

<div class="container">
    <h4 class="mt-3 mb-4 text-center">Quản lý sản phẩm</h4>
    <form action="./modules/quanlysp/xuly.php?idsua=<?php echo $data_sua['id_sp']?>" method="post" enctype="multipart/form-data">
        <div class="row">
            <h5 class="fw-normal mb-3 fw-bold" >Sửa sản phẩm:</h5>
                <div class="col-md-6">                           
                    <div class="input-group input-group-sm mb-2 row">
                        <p class="fs-6 mb-0 col-4 fw-bold">Mã sản phẩm</p>
                        <input type="text" class="form-control col-8" value="<?php echo $data_sua['ma_sp']  ?>" name="masp">
                    </div>
                    <div class="input-group input-group-sm mb-2 row">
                        <p class="fs-6 mb-0 col-4 fw-bold">Tên sản phẩm</p>
                        <input type="text" class="form-control col-8" value="<?php echo $data_sua['ten_sp']  ?>" name="tensp">
                    </div>
                    <div class="input-group input-group-sm mb-2 row">
                        <p class="fs-6 mb-0 col-4 fw-bold">Hình ảnh</p>
                            <div class="col-8">
                                <input type="file" class="form-control" name="hinhanh">
                                    <div class="border border-secondary p-2 mt-2 d-flex justify-content-center">
                                        <img src="modules/quanlysp/uploads/<?php echo $data_sua['hinhanh'] ?>" width="150px">
                                    </div>
                            </div>
                    </div>
                    <div class="input-group input-group-sm mb-2 row">
                            <p class="fs-6 mb-0 col-4 fw-bold">Hãng sản phẩm</p>
                        <select class="form-control col-8 " name="idhangsp">
                            <?php
                                $sql_hangsp="SELECT * FROM tbl_hangsp ORDER BY id_hangsp ASC";
                                $query_hangsp=mysqli_query($connect,$sql_hangsp);
                                while($row_hangsp=mysqli_fetch_array($query_hangsp)){
                                    if($row_hangsp['id_hangsp']==$data_sua['id_hangsp']){
                            ?>
                            <!--dùng value thêm danh mục dựa vào địa chỉ id_danhmuc -->
                            <option value="<?php echo $row_hangsp['id_hangsp']?>" selected><?php echo $row_hangsp['tenhangsp']?></option>
                            <?php
                                }else{
                        
                            ?>
                            <option value="<?php echo $row_hangsp['id_hangsp']?>"><?php echo $row_hangsp['tenhangsp']?></option>
                            <?php
                                    }
                                }
                            ?>                       
                        </select>
                    </div>
                    <div class="input-group input-group-sm mb-2 row">
                        <p class="fs-6 mb-0 col-4 fw-bold">Giá</p>
                        <input type="number" class="form-control col-8" value="<?php echo $data_sua['gia']  ?>" name="giasp">
                    </div>
                    <div class="input-group input-group-sm mb-2 row">
                        <p class="fs-6 mb-0 col-4 fw-bold">Kích thước</p>
                        <input type="text" class="form-control col-8" value="<?php echo $data_sua['kt_mh']  ?>" name="ktmh">
                    </div>
                    <div class="input-group input-group-sm mb-2 row">
                        <p class="fs-6 mb-0 col-4 fw-bold">Camera</p>
                        <input type="text" class="form-control col-8" value="<?php echo $data_sua['camera']  ?>" name="camera">
                    </div>
                    <div class="input-group input-group-sm mb-2 row">
                        <p class="fs-6 mb-0 col-4 fw-bold">Chipset</p>
                        <input type="text" class="form-control col-8" value="<?php echo $data_sua['chipset']  ?>" name="chipset">
                    </div>
                    <div class="input-group input-group-sm mb-2 row">
                        <p class="fs-6 mb-0 col-4 fw-bold">Ram</p>
                        <input type="text" class="form-control col-8" value="<?php echo $data_sua['ram']  ?>" name="ram">
                    </div>
                    <div class="input-group input-group-sm mb-2 row">
                        <p class="fs-6 mb-0 col-4 fw-bold">Rom</p>
                        <input type="text" class="form-control col-8" value="<?php echo $data_sua['rom']  ?>" name="rom">
                    </div>
                    <div class="input-group input-group-sm mb-2 row">
                        <p class="fs-6 mb-0 col-4 fw-bold">Pin</p>
                        <input type="text" class="form-control col-8" value="<?php echo $data_sua['pin']  ?>" name="pin">
                    </div>
                    <div class="input-group input-group-sm mb-2 row">
                        <p class="fs-6 mb-0 col-4 fw-bold">Sim</p>
                        <input type="text" class="form-control col-8" value="<?php echo $data_sua['sim']  ?>"name="sim">
                    </div>
                    <div class="d-flex ">
                        <button type="submit" class="btn btn-primary btn-lg w-40 fw-bold" name="suasanpham">Sửa</button>
                    </div>
                </div>
                <div class="col-md-6">                   
                    <div class="input-group input-group-sm mb-2 row">
                        <p class="fs-6 mb-0 col-4 fw-bold">Hệ điều hành</p>
                        <input type="text" class="form-control col-8" value="<?php echo $data_sua['heDH']  ?>" name="hedieuhanh">
                    </div>
                    <div class="input-group input-group-sm mb-2 row">
                        <p class="fs-6 mb-0 col-4 fw-bold">Mô tả</p>
                        <textarea class="form-control col-8"  name="motasp"><?php echo ($data_sua['mota'])  ?></textarea>
                    </div>
                    <div class="input-group input-group-sm mb-2 row">
                        <p class="fs-6 mb-0 col-4 fw-bold">Số lượng</p>
                        <input type="number" class="form-control col-8" value="<?php echo $data_sua['soluong']  ?>" name="soluongsp">
                    </div>
                    <div class="input-group input-group-sm mb-2 row">
                        <p class="fs-6 mb-0 col-4 fw-bold">Đã bán</p>
                        <input type="number" class="form-control col-8" value="<?php echo $data_sua['daban']  ?>" name="dabansp">
                    </div>
                    <div class="input-group input-group-sm mb-2 row">
                        <p class="fs-6 mb-0 col-4 fw-bold">Trạng thái</p>
                        <select class="form-control col-8" name="trangthaisp">
                            <?php
                            if($data_sua['trangthai']==1){
                            ?>
                            <option value="1" selected>Kích Hoạt</option>
                            <option value="0">Ẩn</option>
                            <?php
                            }else{
                            ?>
                            <option value="1" >Kích Hoạt</option>
                            <option value="0" selected>Ẩn</option>
                            <?php
                            } 
                            ?>
                        </select>
                    </div>
                    <div class="input-group input-group-sm mb-2 row">
                        <p class="fs-6 mb-0 col-4 fw-bold">Time rammat</p>
                        <input type="date" class="form-control col-8" value="<?php echo date('Y-m-d', strtotime($data_sua['time_rammat'])); ?>" name="timerammat">
                    </div>              
                </div>
        </div>
    </form>
</div>
