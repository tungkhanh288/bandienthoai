<?php
    require('config/connect.php');
    require('../fpdf/fpdf.php');
    require('../tfpdf/tfpdf.php');
    $code_cart = $_GET['code_cart'];
    $id_kh = $_GET['id_kh'];
    $product = mysqli_query($connect, "SELECT * FROM tbl_cart_info INNER JOIN tbl_sanpham ON tbl_cart_info.id_sp = tbl_sanpham.id_sp WHERE code_cart=$code_cart");

    $cart = mysqli_query($connect, "SELECT * FROM tbl_cart WHERE code_cart=$code_cart");
    $cart_data = mysqli_fetch_array($cart);

    $khachhang = mysqli_query($connect, "SELECT * FROM tbl_dangky WHERE id_khachhang=$id_kh LIMIT 1");
    $khachhang_data = mysqli_fetch_array($khachhang);
    $ngaylap = date('d-m-Y');

    $pdf = new tFPDF();
    $pdf->SetMargins(0, 0, 0);
    $pdf->AddPage('L');
    $pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
    $pdf->SetFont('DejaVu','',14);

    $pdf->Image('../img/logo.png', 10, 5, 80, 16);

    $pdf->SetXY(0, 20);
    $pdf->SetFontSize(20);
    $pdf->Cell(297, 20, "HÓA ĐƠN BÁN HÀNG", 0, 0, 'C', false);

    $pdf->SetXY(10, 40);
    $pdf->SetFontSize(14);
    $pdf->Cell(80, 10, "Mã hóa đơn: ".$code_cart, 0, 0, 'L', false);

    $pdf->SetXY(160, 40);
    $pdf->SetFontSize(14);
    $pdf->Cell(80, 10, "Ngày lập: ".$ngaylap, 0, 0, 'L', false);

    $pdf->SetXY(10, 50);
    $pdf->SetFontSize(14);
    $pdf->Cell(80, 10, "Khách hàng: ".$khachhang_data['hoten'], 0, 0, 'L', false);

    $pdf->SetXY(160, 50);
    $pdf->SetFontSize(14);
    $pdf->Cell(80, 10, "Số điện thoại: ".$cart_data['sdt'], 0, 0, 'L', false);

    $pdf->SetXY(10, 60);
    $pdf->SetFontSize(14);
    $pdf->Cell(200, 10, "Địa chỉ: ".$cart_data['dc'], 0, 0, 'L', false);
    $pdf->SetXY(160, 60);
    $pdf->SetFontSize(14);
    $pdf->Cell(200, 10, "HTTT: ".$cart_data['thanhtoan'], 0, 0, 'L', false);

    $pdf->SetXY(10, 80);
    $pdf->SetFontSize(14);
    $pdf->Cell(20, 10, "STT", 1, 0, 'C', false);

    $pdf->SetXY(30, 80);
    $pdf->SetFontSize(14);
    $pdf->Cell(110, 10, "Tên sản phẩm", 1, 0, 'C', false);

    $pdf->SetXY(140, 80);
    $pdf->SetFontSize(14);
    $pdf->Cell(40, 10, "Dung lượng", 1, 0, 'C', false);

    $pdf->SetXY(180, 80);
    $pdf->SetFontSize(14);
    $pdf->Cell(20, 10, "SL", 1, 0, 'C', false);

    $pdf->SetXY(200, 80);
    $pdf->SetFontSize(14);
    $pdf->Cell(40, 10, "Đơn giá", 1, 0, 'C', false);

    $pdf->SetXY(240, 80);
    $pdf->SetFontSize(14);
    $pdf->Cell(50, 10, "Thành tiền", 1, 0, 'C', false);

    $offset = 90;
    $stt = 1;
    $tongtien = 0;
    while ($row = mysqli_fetch_array($product)) {
        $pdf->SetXY(10, $offset);
        $pdf->Cell(20, 10, $stt, 1, 0, 'C', false);

        $pdf->SetXY(30, $offset);
        $pdf->Cell(110, 10, $row['ten_sp'], 1, 0, 'C', false);

        $pdf->SetXY(140, $offset);
        $pdf->Cell(40, 10, $row['ram']."GB - ".$row['rom']."GB", 1, 0, 'C', false);

        $pdf->SetXY(180, $offset);
        $pdf->Cell(20, 10, $row['sl'], 1, 0, 'C', false);

        $pdf->SetXY(200, $offset);
        $pdf->Cell(40, 10, number_format($row['gia'],0,',','.')." đ", 1, 0, 'C', false);

        $pdf->SetXY(240, $offset);
        $pdf->Cell(50, 10, number_format($row['sl']*$row['gia'],0,',','.')." đ", 1, 0, 'C', false);

        $tongtien += $row['sl']*$row['gia'];

        $stt++;
        $offset += 10;
    }

    $pdf->SetXY(30, $offset);
    $pdf->SetFontSize(14);
    $pdf->Cell(50, 10, "Tổng tiền: ", 0, 0, 'C', false);

    $pdf->SetXY(240, $offset);
    $pdf->SetFontSize(14);
    $pdf->Cell(50, 10, number_format($tongtien,0,',','.')." đ", 0, 0, 'C', false);

    $pdf->SetXY(60, 160);
    $pdf->SetFontSize(14);
    $pdf->Cell(50, 10, "Người mua hàng", 0, 0, 'C', false);

    $pdf->SetXY(60, 170);
    $pdf->SetFontSize(12);
    $pdf->Cell(50, 10, $khachhang_data['hoten'], 0, 0, 'C', false);

    $pdf->SetXY(200, 160);
    $pdf->SetFontSize(14);
    $pdf->Cell(50, 10, "Người bán hàng", 0, 0, 'C', false);

    $pdf->SetXY(200, 170);
    $pdf->SetFontSize(12);
    $pdf->Cell(50, 10, "Bandienthoai.vn", 0, 0, 'C', false);

    $file_path = 'modules/quanlydonhang/hoadon/'.$_GET['code_cart'].'.pdf';
    $pdf->Output($file_path, 'F'); 
?>
<div class="container">
    <p class="cart-heading mt-0 py-3 fs-5 fw-semibold">Hóa đơn mua hàng: </p>
    <div class="hoa-don mx-auto" style="width: 683px;height: 484px;">
        <embed type="application/pdf" src="./modules/quanlydonhang/hoadon/<?php echo $code_cart ?>.pdf#toolbar=0"
            style="width: 100%; height: 100%" />
    </div>
    <div class="action-btn mt-3">
        <a href="index.php?navigate=qldh&query=them" class="link-offset-2 link-underline link-underline-opacity-0">
            <button class="btn btn-primary">Quay lại</button>
        </a>
        <a href="#" class="link-offset-2 link-underline link-underline-opacity-0">
            <button class="btn btn-primary ms-4">In hóa đơn</button>
        </a>
    </div>
</div>