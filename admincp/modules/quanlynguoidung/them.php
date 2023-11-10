<div class="container">
    <h4 class="mt-3 mb-4 text-center"></h4>
    <form action="./modules/quanlynguoidung/xuly.php" method="post" enctype="multipart/form-data">
        <div class="row">
            <h5 class="fw-normal mb-3 fw-bold">Thêm tài khoản người dùng</h5>
            <div class="col-md-6">
                <div class="input-group input-group-sm mb-2 row">
                    <p class="fs-6 mb-0 col-4 fw-bold">Tên tài khoản</p>
                    <input type="text" class="form-control col-8" name="tentk" required>
                </div>
                <div class="input-group input-group-sm mb-2 row">
                    <p class="fs-6 mb-0 col-4 fw-bold">Số điện thoại</p>
                    <input type="text" class="form-control col-8" name="sdt" required>
                </div>
                <div class="input-group input-group-sm mb-2 row">
                    <p class="fs-6 mb-0 col-4 fw-bold">Mật khẩu</p>
                    <input type="text" class="form-control col-8" name="mk" required>
                </div>
                <div class="input-group input-group-sm mb-2 row">
                    <p class="fs-6 mb-0 col-4 fw-bold">Địa chỉ</p>
                    <input type="text" class="form-control col-8" name="dc" required>
                </div>
                <div class="input-group input-group-sm mb-2 row">
                    <p class="fs-6 mb-0 col-4 fw-bold">Email</p>
                    <input type="email" class="form-control col-8" name="email" required>
                </div>
                <div class="d-flex ">
                    <button type="submit" class="btn btn-primary btn-lg w-40 fw-bold" name="themtk">Thêm</button>
                </div>
            </div>
        </div>
    </form>
</div>