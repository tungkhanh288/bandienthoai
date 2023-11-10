<div class="header">
    <div class="container text-center header-top">
        <div class="row">
            <div class="col-12">
                <a href="" class=""><img src="../img/logo.png" class="img-fluid header-img" alt=""></a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h1 class="admin-header fw-semibold">
                    Welcome to Admin Page
                </h1>
            </div>
        </div>
    </div>
    <div class="bg-primary-subtle header-bot">
        <div class="container">
            <nav class="navbar navbar-expand p-0">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                        <ul class="navbar-nav fs-6 nav-header">
                            <li class="nav-item">
                                <a class="nav-link <?php if (!isset($_GET['navigate'])) echo "active text-primary"; ?>" aria-current="page" href="index.php">Trang chủ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php if (isset($_GET['navigate']) && $_GET['navigate'] == 'qldmsp') echo "active text-primary"; ?>" href="index.php?navigate=qldmsp&query=them">Quản lý danh mục</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php if (isset($_GET['navigate']) && $_GET['navigate'] == 'qlsp') echo "active text-primary"; ?>" href="index.php?navigate=qlsp&query=them">Quản lý sản phẩm</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php if (isset($_GET['navigate']) && $_GET['navigate'] == 'qlnd') echo "active text-primary"; ?>" href="index.php?navigate=qlnd&query=them">Quản lý người dùng</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php if (isset($_GET['navigate']) && $_GET['navigate'] == 'qldh') echo "active text-primary"; ?>" href="index.php?navigate=qldh&query=them">Quản lý đơn hàng</a>
                            </li>
                        </ul>
                        <p class="admin-name h-100 m-0 d-flex">
                            Xin chào: <?php echo $_SESSION['loginadmin'] ?>
                            <a class="nav-link text-primary" href="index.php?navigate=dangxuat"> - Đăng xuất</a>
                        </p>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>