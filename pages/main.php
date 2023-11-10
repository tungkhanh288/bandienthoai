<?php
if (isset($_GET["navigate"])) {
    $trangthai = $_GET["navigate"];
} else {
    $trangthai = "ok";
}
if ($trangthai == "gioithieu") {
    include("./pages/main/gioithieu.php");
} elseif ($trangthai == "tintuc") {
    include("./pages/main/tintuc.php");
} elseif ($trangthai == "cauhoi") {
    include("./pages/main/cauhoi.php");
} elseif ($trangthai == "tuyendung") {
    include("./pages/main/tuyendung.php");
} elseif ($trangthai == "lienhe") {
    include("./pages/main/lienhe.php");
} elseif ($trangthai == "giohang") {
    include("./pages/main/cart.php");
} elseif ($trangthai == "donhang") {
    include("./pages/main/donhang.php");
} else if ($trangthai == "theohang") {
    include("./pages/hang_products.php");
} elseif ($trangthai == "show_pro") {
    include("./pages/show_products.php");
} elseif ($trangthai == "thongtin") {
    include("./user/personal.php");
} elseif ($trangthai == "price_product") {
    include("./pages/main/price_product.php");
} elseif ($trangthai == "timkiem") {
    include("./pages/main/timkiem.php");
}elseif ($trangthai == "dathang") {
    include("./pages/main/dathang.php");
}elseif ($trangthai == "xemdonhang") {
    include("./pages/main/xemdonhang.php");
}elseif ($trangthai == "chitietdh") {
    include("./pages/main/chitietdh.php");
}elseif ($trangthai == "suadonhang") {
    include("./pages/main/suadonhang.php");
}
else {
    include("./pages/slider.php");
    include("./pages/products.php");
}
?>