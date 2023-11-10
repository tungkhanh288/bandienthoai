<div class="container-xxl">
    <div class="row">
        <div class="col-4">
            <h4 class="mt-3 mb-4 text-center">Quản lý hãng sản phẩm</h4>
            <h5 class="fw-normal mb-3">Thêm hãng sản phẩm:</h5>
            <form action="./modules/quanlydanhmucsp/xuly.php" method="post">
                <div class="input-group input-group-sm mb-2 row">
                    <p class="fs-6 mb-0 col-4">Tên hãng</p>
                    <input type="text" class="form-control col-8" name="tenhangsp" required>
                </div>
                <div class="input-group input-group-sm mb-2 row">
                    <p class="fs-6 mb-0 col-4">Thứ tự</p>
                    <input type="text" class="form-control col-8" name="thutusp" required>
                </div>
                <button type="submit" class="btn btn-primary btn-sm" name="themhangsp">Thêm</button>
            </form>
        </div>
        <div class="col-2"></div>
        <div class="col-4">
            <h4 class="mt-3 mb-4 text-center">Quản lý mức giá</h4>
            <h5 class="fw-normal mb-3">Thêm mức giá:</h5>
            <form action="./modules/quanlydanhmucsp/xuly.php" method="post">
                <div class="input-group input-group-sm mb-2 row">
                    <p class="fs-6 mb-0 col-4">Mức giá</p>
                    <input type="text" class="form-control col-8" name="mucgia" required>
                </div>
                <button type="submit" class="btn btn-primary btn-sm" name="themmucgia">Thêm</button>
            </form>
        </div>
    </div>
</div>