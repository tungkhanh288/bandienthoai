<div class="container">
    <h4 class="mt-3 mb-4 text-center">Quản lý sản phẩm</h4>
    <form action="./modules/quanlysp/xuly.php" method="post" enctype="multipart/form-data">
        <div class="row">
            <h5 class="fw-normal mb-3 fw-bold" >Thêm sản phẩm:</h5>
                <div class="col-md-6">                           
                    <div class="input-group input-group-sm mb-2 row">
                        <p class="fs-6 mb-0 col-4 fw-bold">Mã sản phẩm</p>
                        <input type="text" class="form-control col-8" name="masp">
                    </div>
                    <div class="input-group input-group-sm mb-2 row">
                        <p class="fs-6 mb-0 col-4 fw-bold">Tên sản phẩm</p>
                        <input type="text" class="form-control col-8" required name="tensp">
                    </div>
                    <div class="input-group input-group-sm mb-2 row">
                        <p class="fs-6 mb-0 col-4 fw-bold">Hình ảnh</p>
                        <input type="file" class="form-control col-8" required name="hinhanh">
                    </div>
                    <div class="input-group input-group-sm mb-2 row">
                            <p class="fs-6 mb-0 col-4 fw-bold">Hãng sản phẩm</p>
                            <select class="form-control col-8 " required name="idhangsp">
                            <?php
                                $sql_hang="SELECT * FROM tbl_hangsp ORDER BY id_hangsp ASC";
                                $query_hang=mysqli_query($connect,$sql_hang);
                                while($row_hang=mysqli_fetch_array($query_hang)){
                            ?>  
                            <!--dùng value thêm danh mục dựa vào địa chỉ id_danhmuc -->
                            <option value="<?php echo $row_hang['id_hangsp']?>"><?php echo $row_hang['tenhangsp']?></option>            
                            <?php
                            }
                            ?>                             
                            </select>
                    </div>
                    <div class="input-group input-group-sm mb-2 row">
                        <p class="fs-6 mb-0 col-4 fw-bold">Giá</p>
                        <input type="number" class="form-control col-8" required name="giasp">
                    </div>
                    <div class="input-group input-group-sm mb-2 row">
                        <p class="fs-6 mb-0 col-4 fw-bold">Kích thước</p>
                        <input type="text" class="form-control col-8" required name="ktmh">
                    </div>
                    <div class="input-group input-group-sm mb-2 row">
                        <p class="fs-6 mb-0 col-4 fw-bold">Camera</p>
                        <input type="text" class="form-control col-8" required name="camera">
                    </div>
                    <div class="input-group input-group-sm mb-2 row">
                        <p class="fs-6 mb-0 col-4 fw-bold">Chipset</p>
                        <input type="text" class="form-control col-8" required name="chipset">
                    </div>
                    <div class="input-group input-group-sm mb-2 row">
                        <p class="fs-6 mb-0 col-4 fw-bold">Ram</p>
                        <input type="text" class="form-control col-8" required name="ram">
                    </div>
                    <div class="input-group input-group-sm mb-2 row">
                        <p class="fs-6 mb-0 col-4 fw-bold">Rom</p>
                        <input type="text" class="form-control col-8" required name="rom">
                    </div>
                    <div class="input-group input-group-sm mb-2 row">
                        <p class="fs-6 mb-0 col-4 fw-bold">Pin</p>
                        <input type="text" class="form-control col-8" required name="pin">
                    </div>
                    <div class="input-group input-group-sm mb-2 row">
                        <p class="fs-6 mb-0 col-4 fw-bold">Sim</p>
                        <input type="text" class="form-control col-8" required name="sim">
                    </div>
                    <div class="d-flex ">
                        <button type="submit" class="btn btn-primary btn-lg w-40 fw-bold" name="themsp">Thêm</button>
                    </div>
                </div>
                <div class="col-md-6">                   
                    <div class="input-group input-group-sm mb-2 row">
                        <p class="fs-6 mb-0 col-4 fw-bold">Hệ điều hành</p>
                        <input type="text" class="form-control col-8" name="hedieuhanh">
                    </div>
                    <div class="input-group input-group-sm mb-2 row">
                        <p class="fs-6 mb-0 col-4 fw-bold">Mô tả</p>
                        <textarea class="form-control col-8" name="motasp"></textarea>
                    </div>
                    <div class="input-group input-group-sm mb-2 row">
                        <p class="fs-6 mb-0 col-4 fw-bold">Số lượng</p>
                        <input type="number" class="form-control col-8" name="soluongsp">
                    </div>
                    <div class="input-group input-group-sm mb-2 row">
                        <p class="fs-6 mb-0 col-4 fw-bold">Đã bán</p>
                        <input type="number" class="form-control col-8" name="dabansp">
                    </div>
                    <div class="input-group input-group-sm mb-2 row">
                        <p class="fs-6 mb-0 col-4 fw-bold">Trạng thái</p>
                        <select class="form-control col-8" name="trangthaisp">
                            <option value="1">Kích Hoạt</option>
                            <option value="0">Ẩn</option>
                        </select>
                    </div>
                    <div class="input-group input-group-sm mb-2 row">
                        <p class="fs-6 mb-0 col-4 fw-bold">Time rammat</p>
                        <input type="datetime-local" class="form-control col-8" name="timerammat">
                    </div>              
                </div>
        </div>
    </form>
</div>
