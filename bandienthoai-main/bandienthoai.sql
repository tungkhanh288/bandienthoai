-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 08, 2023 lúc 04:07 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bandienthoai`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `ten` varchar(30) NOT NULL,
  `matkhau` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `ten`, `matkhau`) VALUES
(1, 'admin', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id_khachhang` int(11) NOT NULL,
  `code_cart` int(11) NOT NULL,
  `sdt` varchar(12) NOT NULL,
  `dc` varchar(100) NOT NULL,
  `ngaydat` date NOT NULL,
  `ngaynhan` date DEFAULT NULL,
  `thanhtoan` varchar(50) NOT NULL,
  `trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart`
--

INSERT INTO `tbl_cart` (`id_khachhang`, `code_cart`, `sdt`, `dc`, `ngaydat`, `ngaynhan`, `thanhtoan`, `trangthai`) VALUES
(4, 7683, '01266787', 'Thái Nguyên', '2023-06-08', '2023-06-08', 'Chuyển khoản', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart_info`
--

CREATE TABLE `tbl_cart_info` (
  `id_cart_infor` int(11) NOT NULL,
  `code_cart` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `sl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart_info`
--

INSERT INTO `tbl_cart_info` (`id_cart_infor`, `code_cart`, `id_sp`, `sl`) VALUES
(59, 7683, 7, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_dangky`
--

CREATE TABLE `tbl_dangky` (
  `id_khachhang` int(11) NOT NULL,
  `tentaikhoan` varchar(20) NOT NULL,
  `hoten` varchar(30) NOT NULL,
  `sodienthoai` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `matkhau` varchar(20) NOT NULL,
  `diachi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_dangky`
--

INSERT INTO `tbl_dangky` (`id_khachhang`, `tentaikhoan`, `hoten`, `sodienthoai`, `email`, `matkhau`, `diachi`) VALUES
(4, 'duonga6', 'Dương Đại Ka', '01266787', 'shen@gmail.com', '1', 'Thái Nguyên'),
(5, 'duonga7', 'Dương kakaa', '01266787', 'shenmurai1st@gmail.com', '1', '					TN			');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_hangsp`
--

CREATE TABLE `tbl_hangsp` (
  `id_hangsp` int(11) NOT NULL,
  `tenhangsp` varchar(30) DEFAULT NULL,
  `stt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_hangsp`
--

INSERT INTO `tbl_hangsp` (`id_hangsp`, `tenhangsp`, `stt`) VALUES
(1, 'Samsung', 1),
(2, 'IPhone', 2),
(3, 'OPPO', 3),
(4, 'Vsmart', 4),
(5, 'Xiaomi', 5),
(6, 'LG', 6),
(7, 'Lenovo', 7),
(8, 'OnePlus', 11),
(9, 'Realme', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_mucgia`
--

CREATE TABLE `tbl_mucgia` (
  `id_mucgia` int(11) NOT NULL,
  `mucgia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_mucgia`
--

INSERT INTO `tbl_mucgia` (`id_mucgia`, `mucgia`) VALUES
(11, 0),
(2, 6),
(3, 10),
(5, 20),
(6, 30);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `id_sp` int(11) NOT NULL,
  `ma_sp` varchar(50) NOT NULL,
  `ten_sp` varchar(50) NOT NULL,
  `id_hangsp` int(11) DEFAULT NULL,
  `gia` int(15) NOT NULL,
  `hinhanh` varchar(150) NOT NULL,
  `kt_mh` float NOT NULL,
  `camera` varchar(200) NOT NULL,
  `chipset` varchar(30) NOT NULL,
  `ram` int(11) NOT NULL,
  `rom` int(11) NOT NULL,
  `pin` int(11) NOT NULL,
  `sim` varchar(30) NOT NULL,
  `heDH` varchar(20) NOT NULL,
  `mota` varchar(1000) NOT NULL,
  `soluong` int(11) NOT NULL,
  `daban` int(11) NOT NULL DEFAULT 0,
  `trangthai` int(11) NOT NULL,
  `time_rammat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`id_sp`, `ma_sp`, `ten_sp`, `id_hangsp`, `gia`, `hinhanh`, `kt_mh`, `camera`, `chipset`, `ram`, `rom`, `pin`, `sim`, `heDH`, `mota`, `soluong`, `daban`, `trangthai`, `time_rammat`) VALUES
(4, 'ip_14_prm', 'IPhone 14 Pro Max', 2, 18000000, '1685802465_1_251_1.webp', 6.7, 'Camera chính: 48 MP, f/1.8, 24mm, 1.22µm, PDAF, OIS Camera góc siêu rộng: 12 MP, f/2.2, 13mm, 120˚, 1.4µm, PDAF Camera tele: 12 MP, f/2.8, 77mm (telephoto), PDAF, OIS, 3x optical zoom Cảm biến độ sâu ', 'Apple A16', 6, 128, 4323, '2 SIM (nano‑SIM và eSIM)', 'IOS 16', 'iPhone 14 Pro Max là mẫu flagship nổi bật nhất của Apple trong lần trở lại năm 2022 với nhiều cải tiến về công nghệ cũng như vẻ ngoài cao cấp, sang chảnh hợp với gu thẩm mỹ đại chúng. Những chiếc điện thoại đến từ nhà Táo Khuyết nhận được rất nhiều sự kỳ vọng của thị trường ngay từ khi chưa ra mắt', 10, 0, 1, '2023-05-01'),
(7, '', 'iPhone 14 128GB', 2, 19190000, '1685751856_3_51_1_7.webp', 6.1, 'Camera góc rộng: 12MPCamera góc siêu rộng: 12MP12MP, ƒ/1.9', 'Apple A15', 6, 128, 3279, '2 SIM (nano‑SIM và eSIM)', 'iOS 16', 'Theo đúng như dự kiến, đêm 8/9/2022 Apple đã chính thức giới thiệu sesier iPhone mới đến với người tiêu dùng. Mẫu điện thoại iPhone 14 mới ra mắt vẫn giữ được mức giá so với iPhone 13 trước đó nhưng vẫn có nhiều nâng cấp khác biệt. Điện thoại sở hữu màn hình Retina XDR OLED kích thước 6.1 inch cùng độ sáng vượt trội lên đến 1200 nits. Máy cũng sẽ được trang bị camera kép 12 MP phía sau cùng cảm biến điểm ảnh lớn, đạt 1.9 micron giúp cải thiện khả năng chụp thiếu sáng. Mẫu iPhone 14 mới cũng mang trong mình con chip Apple A15 Bionic phiên bản 5 nhân mang lại hiệu suất vượt trội.', 19, 6, 1, '2022-06-06'),
(8, '', 'iPhone 14 Pro 128GB', 2, 18700000, '1685802027_1_252.webp', 6.1, 'Camera chính: 48 MP, f/1.8, 24mm, OISCamera góc siêu rộng: 12 MP, f/2.2, 120˚, 1.4µmCamera tele: 12 MP, f/2.8, PDAF, OIS, 3x optical zoomCảm biến độ sâu TOF 3D LiDAR', 'Apple A16', 6, 128, 3200, '2 SIM (nano‑SIM và eSIM)', 'iOS 16', 'iPhone 14 Pro sở hữu màn hình Dynamic Island cùng công nghệ Super Retina XDR mang lại trải nghiệm hình ảnh ấn tượng. Camera trên iPhone 14 Pro cũng được nâng cấp lên đến 48MP với nhiều công nghệ chụp mang lại hình ảnh chuẩn nhiếp ảnh gia. Hiệu năng iPhone 14 Pro cũng mạnh mẽ với con chip hàng đầu Apple A16 Bionic giúp các thao tác diễn ra nhanh chóng, bộ nhớ RAM 6GB mang lại đa nhiệm mượt mà và ổn định trong mọi tác vụ.', 32, 0, 1, '2022-11-15'),
(9, '', 'iPhone 12 Pro Max 128GB', 2, 19200000, '1685751878_iphone-14-pro-max-den-thumb-600x600.jpg', 6.7, 'Camera chính: 12 MP, f/1.6, 26mm, 1.4µm, dual pixel PDAF, OISCamera tele: 12 MP, f/2.0, 52mm, 1/3.4', 'Apple A14', 6, 128, 3825, '2 SIM (nano‑SIM và eSIM)', 'iOS 14.1', 'Cứ mỗi năm, đến dạo cuối tháng 8 và gần đầu tháng 9 thì mọi thông tin sôi sục mới về chiếc iPhone mới lại xuất hiện. Apple năm nay lại ra thêm một chiếc iPhone mới với tên gọi mới là iPhone 12 Pro Max, đây là một dòng điện thoại mới và mạnh mẽ nhất của nhà Apple năm nay. Mời bạn tham khảo thêm một số mô tả sản phẩm bên dưới để bạn có thể ra quyết định mua sắm.', 12, 0, 1, '2021-03-09'),
(10, '', 'iPhone 12 64GB', 2, 14900000, '1685751888_iphone-14-storage-select-202209-6-1inch-y889.webp', 6.1, '12 MP, f/1.6, 26mm (wide), 1.4µm, dual pixel PDAF, OIS12 MP, f/2.4, 120˚, 13mm (ultrawide), 1/3.6', 'Apple A14', 4, 64, 3215, '2 SIM (nano‑SIM và eSIM)', 'iOS 14.1', 'Dù Apple vừa giới thiệu dòng điện thoại iPhone 13 series tuy nhiên iPhone 12 vẫn đang là một trong những sự lựa chọn hàng đầu ở thời điểm hiện tại. Chiếc flagship năm 2020 của \"Táo khuyết\" đang nhận được rất nhiều sự quan tâm của người dùng bởi mức giá dễ tiếp cận hơn so với thời điểm ra mắt, đồng thời được trang bị cấu hình, màn hình, camera ấn tượng trong tầm giá.', 18, 0, 1, '2022-07-04'),
(11, '', 'iPhone 12 Pro 256GB', 2, 19000000, '1685751898_4_187_1.webp', 6.1, '12 MP, f/1.6, 26mm (wide), 1.4µm, dual pixel PDAF, OIS12 MP, f/2.0, 52mm (telephoto), 1/3.4', 'Apple A14 ', 6, 256, 3245, ' 2 SIM (nano‑SIM và eSIM)', 'iOS 14.1', 'Mẫu iPhone 2020 mới nhất của Apple được thiết kế khung viền vuông sang trọng được nhiều người dùng yêu thích. Trong đó, phiên bản iPhone 12 Pro 256GB chính hãng VNA hứa hẹn là một trong những sự lựa chọn lý tưởng.', 14, 0, 1, '2020-06-24'),
(12, '', 'iPhone 11 64GB', 2, 10350000, '1685751907_0007808_iphone-14-pro-max-128gb.png', 6.1, 'Camera kép 12MP:- Camera góc rộng: ƒ/1.8 aperture- Camera siêu rộng: ƒ/2.4 aperture', 'A13', 4, 64, 3110, ' Nano-SIM + eSIM', 'iOS 13', 'iPhone 11 sở hữu hiệu năng khá mạnh mẽ, ổn định trong thời gian dài nhờ được trang bị chipset A13 Bionic. Màn hình LCD 6.1 inch sắc nét cùng chất lượng hiển thị Full HD của máy cho trải nghiệm hình ảnh mượt mà và có độ tương phản cao. Hệ thống camera hiện đại được tích hợp những tính năng công nghệ mới kết hợp với viên Pin dung lượng 3110mAh, giúp nâng cao trải nghiệm của người dùng.', 25, 0, 1, '2020-01-07'),
(13, '', 'iPhone 11 128GB', 2, 12080000, '1685752465_1685737959_sp1.jpg', 6.1, 'Camera kép 12MP:- Camera góc rộng: ƒ/1.8 aperture- Camera siêu rộng: ƒ/2.4 aperture', 'A13', 4, 128, 3110, 'Nano-SIM + eSIM', 'iOS 13', 'iP 11 128GB giá bao nhiêu là điều được nhiều iFan và các tín đồ công nghệ quan tâm. Từ thời điểm ra mắt cho đến nay, giá bán đã giảm sâu xuống còn khoảng hơn 12 triệu đồng, nhờ đó khách hàng có thể dễ dàng sở hữu. Tham khảo bảng giá iPhone 11 128GB chi tiết sau đây nhé!', 23, 0, 1, '2021-01-04'),
(15, 'SS_ZFlip_4', 'Samsung Galaxy Z Flip4 128GB', 1, 16990000, '1685809080_ss_ZF4.webp', 6.7, 'Camera trước : 10 MP, f/2.4 Camera sau : Camera góc rộng: 12 MP, f/1.8, PDAF, OIS Camera góc siêu rộng: 12 MP, f/2.2, 123˚', 'Snapdragon 8+ Gen 1 8 nhân', 8, 128, 3700, '2 SIM (nano‑SIM và eSIM)', 'Android 12', 'Tiếp tục là một mẫu smartphone màn hình gập độc đáo, đầy lôi cuốn và mới mẻ từ hãng công nghệ Hàn Quốc, dự kiến sẽ có tên là Samsung Galaxy Z Flip 4 với nhiều nâng cấp. Đây hứa hẹn sẽ là một siêu phẩm bùng nổ trong thời gian tới và thu hút được sự quan tâm của đông đảo người dùng với nhiều cải tiến từ ngoại hình, camera, bộ vi xử lý và viên pin được nâng cấp.', 10, 2, 1, '2022-02-08'),
(16, 'SS_ZFold4', 'Samsung Galaxy Z Fold4', 1, 31990000, '1685809600_ss_ZFold4.webp', 7.6, 'Camera sau  Camera chính: 50MP, f/1.8 Camera góc siêu rộng: 12MP, f/2.2 Camera tele: 10MP, f/2.4 (3x zoom) Camera trước  10MP (bên ngoài) + 4MP (dưới màn hình)', 'Snapdragon 8 Plus Gen 1', 12, 256, 4400, '2 SIM (nano‑SIM và eSIM)', 'Android 12', 'sự xuất hiện của điện thoại gập mới Samsung Galaxy Z Fold 4 lại càng hấp dẫn nhiều người dùng hơn khi sở hữu thiết kế gập màn hình mới cùng với những cải tiến cho trải nghiệm nhân đôi. Samsung Galaxy Fold 4 được cho là sẽ có nhiều điểm đổi mới, cải tiến về mặt thiết kế, hiệu năng và nhiều tính năng hấp dẫn khác so với thế hệ trước đó. Nhờ vậy, người dùng lại có thêm các trải nghiệm mới mẻ trong quá trình sử dụng siêu phẩm. Sau đây là những đánh giá chi tiết về sản phẩm dựa trên các thông tin rò rỉ trong thời gian gần đây!', 20, 7, 1, '2022-08-22'),
(17, 'SS_ZFold3', 'Samsung Galaxy Z Fold3 5G', 1, 22990000, '1685810314_ss_Fold3_5G.webp', 7.6, 'Camera sau  Camera góc rộng: 12 MP, f/1.8, Dual Pixel PDAF, OIS Camera tele: 12 MP, f/2.4, PDAF, OIS, 2x Zoom quang học Camera góc siêu rộng: 12 MP, f/2.2 Camera màn hình phụ: 10MP, f/2.2 Camera trước', 'Snapdragon 888 5G (5 nm)', 12, 256, 4400, '2 SIM (nano‑SIM và eSIM)', 'Android 11', 'Phiên bản Samsung Galaxy Z Fold3 lần này được ra mắt với độ hoàn thiện cao về thiết kế và hiệu năng. Mang đến cho người dùng một trải nghiệm cực kỳ thú vị hơn.Màn hình 7.6 inch 120Hz, màn hình phụ 6.2 inch\r\nĐiểm nổi bật nhất trên chiếc laptop này đó là hệ thống màn hình được trang bị. Cũng giống như thế hệ Fold 2 trước lần này Samsung Fold 3 cũng được trang bị một màn hình chính và một màn hình phụ rất tiện lợi.', 15, 8, 1, '2021-08-19'),
(18, 'SS_GLXs23_Ultra', 'Samsung Galaxy S23 Ultra 256GB', 1, 26990000, '1685891072_SS_23Unltra.webp', 6.8, 'Camera sau  Siêu rộng: 12MP F2.2 (Dual Pixel AF) Chính: 200MP F1.7 OIS ±3° (Super Quad Pixel AF) Tele 1: 10MP F4.9 (10X, Dual Pixel AF) OIS, Tele 2: 10MP F2.4 (3X, Dual Pixel AF) OIS Thu phóng chuẩn k', 'Snapdragon 8 Gen 2 (4 nm)', 8, 256, 5000, '2 Nano SIM hoặc 1 Nano + 1 eSI', 'Android', 'Sau sự đổ bộ thành công của Samsung Galaxy S22 những chiếc điện thoại dòng Flagship tiếp theo - Điện thoại Samsung Galaxy S23 Ultra là đối tượng được Samfans hết mực săn đón. Kiểu dáng thanh lịch sang chảnh kết hợp với những bước đột phá trong công nghệ đã kiến tạo nên siêu phẩm Flagship nhà Samsung.', 22, 10, 1, '2023-02-02'),
(19, 'SS_GLXs22_Ultra', 'Samsung Galaxy S22 Ultra (12GB - 256GB)', 1, 21290000, '1685891256_SS_22Ultra.webp', 6.8, 'Camera sau  108 MP, f/1.8 góc rộng 10 MP, f/4.9 10 MP, f/2.4 12 MP, f/2.2 góc siêu rộng Camera trước  40 MP, f/2.2', 'Snapdragon 8 Gen 1 (4 nm)', 12, 256, 5000, '2 Nano SIM hoặc 1 Nano + 1 eSI', 'Android 12, One UI 4', 'Điện thoại Samsung S22 Ultra phiên bản RAM 12GB cho cảm giác siêu mượt mà khi mở và đóng ứng dụng, đi kèm bộ nhớ trong 256GB cho bạn thoải mái lưu trữ những khung hình, thước phim chất lượng cao. Vi xử lý Qualcomm Snapdragon 8 Gen 1 hứa hẹn mang đến hiệu năng tuyệt đỉnh, xử lý mượt mà mọi tác vụ.', 10, 2, 1, '2022-07-12'),
(20, 'SS_GLX_A54', 'Samsung Galaxy A54 5G 8GB 128GB', 1, 9490000, '1685891653_SS_A54.webp', 6.4, 'Camera sau  Camera góc rộng: 50 MP, f/1.8, PDAF, OIS Camera góc siêu rộng: 12MP, f/2.2, 123˚, 1.12µm Camera macro: 5MP, f/2.4 Camera trước  Camera góc rộng: 32 MP, f/2.2, 26mm, 1/2.8\", 0.8µm', 'Exynos 1380 (5 nm)', 8, 128, 5000, '22 SIM (Nano-SIM)', 'Android 13', 'amsung Galaxy A54 5G có những điểm đột phá mới như: màn hình Super AMOLED 6.4 inch tràn viền vô cực Infinity-O, độ sáng đến 1000nits, tần số quét lên đến 120Hz. Samsung A54 cũng sở hữu cụm 3 camera phân giải cao 50.0 MP + 12.0 MP + 5.0 MP với tính năng ổn định kỹ thuật số và Auto-framing kết hợp chống rung OIS.', 10, 2, 1, '2023-03-10'),
(21, 'SS_GLX_A14', 'Samsung Galaxy A14 4G', 1, 3990000, '1685891785_SS_A14.webp', 6.6, 'Camera sau  Chính 50 MP & Phụ 5 MP, 2 MP Camera trước  13MP', 'Exynos 850 8 nhân', 4, 128, 5000, '22 SIM (Nano-SIM)', 'Android 13', 'Samsung Galaxy A14 4G có màn hình rộng 6.6 inch, tần số quét 60Hz, cụm camera 50MP+5MP+2MP và camera selfie 13MP. Dung lượng pin của máy lên đến 5.000 mAh, sử dụng cả ngày dài, khi gần cạn pin nhanh chóng nạp đầy thông qua củ sạc đi kèm. Nhờ vậy, người dùng có thể dễ dàng lướt web, đắm mình trong thế giới giải trí hay tận hưởng khoảnh khắc vui vẻ bên cạnh người thân, gia đình. ', 10, 5, 1, '2023-02-02'),
(22, 'SS_GLX_S23Plus', 'Samsung Galaxy S23 Plus 8GB 512GB', 1, 26990000, '1685891964_SS_S23_Plus.webp', 6.8, 'Camera sau  Camera chính góc rộng: 50 MP, f/1.8, Dual Pixel PDAF, OIS Camera tele: 10 MP, f/2, 3x optical zoom Camera góc siêu rộng:12 MP, f/2.2 Camera trước  12MP, f/2.2', 'Snapdragon 8 Gen 2 (4 nm)', 8, 256, 4700, '2 Nano SIM hoặc 1 Nano + 1 eSI', 'Android 13', 'ắt trọn khoảnh khắc đêm - Camera lên đến 50MP, zoom xa rõ nét, vi xử lí AI, công nghệ ảnh siêu chi tiết\r\nHiệu năng vượt trội - Snapdragon 8 Gen 2 8 nhân mạnh mẽ, RAM 8GB\r\nThời gian sử dụng không giới hạn - Pin 4700mAh sử dụng, sạc nhanh, tối ưu hoá thời gian sử dụng\r\nThiết kế bền bỉ, thân thiện - Màu sắc lấy cảm hứng từ thiên nhiên, chất liệu kính và lớp phim phủ PET tái chế', 12, 2, 1, '2023-02-04'),
(23, 'SS_GLX_S21_FE', 'Samsung Galaxy S21 FE 8GB 128GB', 1, 12490000, '1685892218_SS_S21_Fe.webp', 6.4, 'Samsung Galaxy S21 FE 8GB 128GB', 'Exynos 2100 (5 nm)', 8, 256, 4500, '22 SIM (Nano-SIM)', 'Android 12', 'Thiết kế cao cấp - Vẻ đẹp tinh tế cùng nhiều màu sắc thời thượng\r\nTrọn vẹn từng khung hình - Màn hình 6.4\"\", độ sáng cao cùng tần số quét 120Hz\r\nSắc nét từng khung hình - Bộ ba camera 12MP, hỗ trợ quay video 4K, chống rung điện từ EIS\r\nMượt mà mọi tác vụ - Chip Exynos 2100 tiến trình 5nm mạnh mẽ\r\nSamsung Galaxy S21 FE (8GB - 128GB) được cung cấp sức mạnh bởi con chip xử lý Exynos 2100 \"cây nhà lá vườn\" kết hợp với 8GB RAM mang đến hiệu suất hoạt động mạnh mẽ cùng bộ nhớ trong 128GB giúp người dùng có thể thoải mái lưu trữ hình ảnh, video dữ liệu.', 12, 4, 1, '2022-01-04'),
(24, 'SS_GLX_A73', 'Samsung Galaxy A73 128GB', 1, 9490000, '1685892398_SS_A73.webp', 6.7, 'Camera sau  Camera chính: 108 MP, f/1.8, PDAF, OIS Camera gó siêu rộng: 12 MP, f/2.2 Camera macro: 5 MP, f/2.4 Camera chân dung: 5 MP, f/2.4 Camera trước  32 MP, f/2.2', 'Snapdragon 778G 5G 8 nhân', 8, 128, 5000, '22 SIM (Nano-SIM)', 'Android 12', 'Camera chất lượng, bắt trọn từng khoảng khắc - Cụm 4 camera với cảm biến chính lên đến 108 MP\r\nThưởng thức không gian giải trí cực đỉnh - Màn hình lớn 6.7 inch, độ phân giải Full HD+, 120Hz mượt mà\r\nCấu hình Galaxy A73 5G được nâng cấp mạnh với chip Snapdragon 778G, RAM lên đến 8 GB\r\nChiến game thoải mái không lo gián đoạn - Viên pin lớn 5000 mAh, hỗ trợ sạc nhanh 25 W\r\nNếu nhu cầu lưu trữ của bạn cao hơn thì có thể tham khảo ngay Samsung A73 phiên bản 256GB bộ nhớ trong đang được phân phối độc quyền tại hệ thống CellphoneS với mức giá chênh lệch không quá nhiều so với bản 128GB.', 12, 3, 1, '2022-02-14'),
(25, 'ip_14_Plus', 'iPhone 14 Plus 128GB | Chính hãng VN/A', 2, 215900000, '1685946485_IP_14Plus.webp', 6.7, 'Camera sau  Camera chính: 12MP, 26 mm, ƒ/1.5 Camera góc siêu rộng: 12MP, 13 mm, ƒ/2.4, 120° Camera trước  12MP khẩu độ f/1.9, Autofocus', 'Apple A15 Bionic', 6, 128, 4325, '2 SIM (nano‑SIM và eSIM)', 'iOS 16', 'iPhone 14 Plus sở hữu màn hình Super Retina XDR OLED thiết kế tai thỏ, kích thước 6.7 inch, kết hợp công nghệ True Tone, HDR, Haptic Touch, Không chỉ vậy, sản phẩm còn trang bị chip A15 Bionic mạnh mẽ, RAM 6GB, bộ nhớ trong 128GB và chạy trên hệ điều hành iOS 16. Camera kép 12MP cải thiện khả năng chụp thiếu sáng, camera trước True Depth 12MP tự động lấy nét. Xem thêm chi tiết với thông tin sau đây!', 12, 4, 1, '2022-09-08'),
(26, 'ip_13_prm', 'iPhone 14 Plus sở hữu màn hình Super Retina XDR OL', 2, 26990000, '1685946654_ip_13prm.webp', 6.7, 'Camera sau  Camera góc rộng: 12MP, ƒ/1.5 Camera góc siêu rộng: 12MP, ƒ/1.8 Camera tele : 12MP, /2.8 Camera trước  12MP, ƒ/2.2', 'Apple A15', 6, 256, 4325, '2 SIM (nano‑SIM và eSIM)', 'iOS 15', 'iPhone 13 Pro Max 256GB được đánh giá là một trong những dòng iPhone có khả năng chụp ảnh siêu ấn tượng cùng với camera góc siêu rộng mang đến khả năng chụp ảnh thiếu sáng một cách đặc biệt. Không những thế, mà dòng iPhone này còn được đánh giá là có dung lượng bộ nhớ tốt, đáp ứng được đầy đủ các công việc hằng ngày\r\nXem thêm thông tin iPhone 13 Pro Max 512GB thiết kế đẳng cấp, mang lại trải nghiệm vượt trội cho người dùng', 20, 8, 1, '2023-01-23'),
(27, 'RM_C55', 'Realme C55 6GB 128GB', 9, 4090000, '1685948905_RM_C55.webp', 6.72, 'Camera sau  Camera chính 64 MP Camera phụ 2 MP Camera trước  8 MP, f/2.0', 'Helio G88', 6, 128, 5000, '2 SIM (Nano-SIM)', 'Android 13', 'Realme C55 có màn hình 6.72 inch, full HD, độ phân giải sắc nét, bộ nhớ lưu trữ của điện thoại lớn 6GB+128GB. Thương hiệu này chạy hệ điều hành quen thuộc Android 12, các tác vụ nhanh nhạy và mượt mà hơn. Con chip set được trang bị là Mediatek Helio G88 giúp các tác vụ ổn định hơn trong thời gian dài.', 10, 2, 1, '2022-02-09'),
(28, 'RM_10', 'realme 10 8GB 256GB', 9, 6390000, '1685949107_rm_10.webp', 6.4, 'Camera sau  Camera chính AI: 50MP, f/1.8 Camera chân dung: 2MP, f/2.4 Camera trước  16 MP, f/2.5', 'Helio G99 (6nm)', 8, 256, 5000, '2 SIM (Nano-SIM)', 'Android 12, Realme U', 'Realme 10 là sản phẩm mới tiếp theo mà Realme sở hữu một thiết kế sang trọng cùng cấu hình mạnh mẽ. Cụ thể, điện thoại Realme 10 được trang bị màn hình 6.4 inch với tấm nền Super AMOLED, tần số quét 90Hz mang lại hiển thị sống động, chuyển động mượt mà. Cấu hình điện thoại cũng ấn tượng với con chip Helio G99, bộ nhớ RAM lớn cùng viên pin 5000mAh cho thời gian sử dụng lâu dài.', 12, 4, 1, '2022-07-05'),
(29, 'RM_8', 'realme 8 5G', 9, 6290000, '1685949222_RM_8.webp', 6.5, 'Camera sau  Chính 48 MP & Phụ 2 MP, 2 MP Camera trước  16 MP, f/2.5, 1/3.0\", 1.0µm', 'MediaTek Dimensity 700 5G 8 nh', 8, 128, 5000, '2 SIM (Nano-SIM)', 'Android 11, Realme U', 'Điện thoại Realme 8 5G - Smartphone pin \"trâu\" hỗ trợ mạng 5G\r\nLinh hoạt, thời thượng và mạnh mẽ ở mọi yếu tố, Realme 8 5G không chỉ là bản nâng cấp đáng chú ý từ Realme 8, mà còn là chiếc smartphone hỗ trợ 5G với giá rẻ dành cho tất cả người dùng công nghệ hiện nay.', 12, 3, 1, '2021-06-05'),
(30, 'RM_9', 'realme 9 Pro Plus', 9, 5690000, '1685949362_RM_9.webp', 6.4, 'Camera sau  Camera chính: 50MP, f/1.8 Camera macro: 2MP, f/2.4 Camera góc rộng: 8MP, 119°, f/2.2 Camera trước  16MP, f/2.4', 'MediaTek Dimensity 920 5G', 8, 128, 4500, '2 SIM (Nano-SIM)', 'UI 3.0, Android 12', 'Realme là hãng điện thoại Trung Quốc nổi tiếng với các sản phẩm giá rẻ và tầm trung chất lượng. Mới đây hãng tiếp tục cho ra mắt sản phẩm mới mang tên Realme 9 Pro Plus. Mẫu điện thoại tầm trung này với thiết kế độc đáo, hiệu năng ổn định hứa hẹn là một sản phẩm đáng để trải nghiệm. Ngoài ra, bạn cũng có thể tham khảo thêm Realme 9 Pro với hệ thống camera, cấu hình ấn tượng cùng mức giá hấp dẫn.', 13, 4, 1, '2022-01-04'),
(31, 'RM_9_pro', 'realme 9 Pro', 9, 4590000, '1685950128_RM_9pro.webp', 6.6, 'Camera sau  Camera chính: 64MP, f/1.79 Camera góc rộng: 8MP, f/2.2 Camera macro: 2MP, f/2.4 Camera trước  16MP', 'Qualcomm Snapdragon 695 5G', 8, 128, 5000, '2 SIM (Nano-SIM)', 'Android 12, UI 3.0', 'Điện thoại Realme 9 Pro - Ấn tượng từ thiết kế đến hiệu năng\r\nTiếp theo Realme 9 thì hãng lại chuẩn bị cho ra mắt một phiên bản nâng cấp mang tên Realme 9 Pro với thiết kế ấn tượng cùng hàng loạt những trang bị độc đáo. Sản phẩm đã làm cho các Fan hâm bộ đứng ngồi không yên để chờ đón sự xuất hiện của chúng. Dưới đây là thông tin chi tiết về mẫu smartphone độc đáo này.', 12, 3, 1, '2022-07-07'),
(32, 'RM_9i', 'realme 9i 4GB 64GB', 9, 3590000, '1685950255_RM_9i.webp', 6.6, 'Camera sau  Camera chính: 50 MP, f/1.8, PDAF Camera macro: 2 MP, f/2.4 Camera chân dung: 2 MP, f/2.4 Camera trước  16 MP, f/2.1', 'Qualcomm SM6225 Snapdragon 680', 4, 64, 5000, '2 SIM (Nano-SIM)', 'Android 12, Realme U', 'Hiệu năng vượt trội - Chip Qualcomm Snapdragon 680 6nm, RAM 4GB\r\nBền bỉ cả ngày dài - Viên lớn 5000mAh, Sạc nhanh Dart 33W\r\nTrải nghiệm màn hình mượt mà, rõ nét - Kích thước siêu lớn 6,6\" cùng tần số quét 90Hz\r\nBắt trọn từng khung ảnh - Bộ 3 camera đẳng cấp 50MP ưu việt', 12, 3, 1, '2021-06-05'),
(33, 'RM_C55_6GB', 'realme C55 6GB 128GB', 9, 4090000, '1685950373_RM_C55.webp', 6.72, 'Camera sau  Camera chính 64 MP Camera phụ 2 MP Camera trước  8 MP, f/2.0', 'Helio G88', 6, 128, 5000, '2 SIM (Nano-SIM)', 'Android 13', 'Realme C55 có màn hình 6.72 inch, full HD, độ phân giải sắc nét, bộ nhớ lưu trữ của điện thoại lớn 6GB+128GB. Thương hiệu này chạy hệ điều hành quen thuộc Android 12, các tác vụ nhanh nhạy và mượt mà hơn. Con chip set được trang bị là Mediatek Helio G88 giúp các tác vụ ổn định hơn trong thời gian dài.', 12, 4, 1, '2022-04-07'),
(34, 'RM_C33', 'realme C33 4GB 64GB', 9, 3090000, '1685950543_RM_C33.webp', 6.5, 'Camera sau  Chính 50 MP & Phụ 0.3 MP Camera trước  5 MP', 'Unisoc T612', 4, 64, 5000, '2 SIM (Nano-SIM)', 'Android 12', 'Realme C33 là sản phẩm mới được gia nhập với dòng Realme C series, chiếc điện thoại mới này có màn hình rộng 6.5 inch, màn hình sở hữu tấm nền IPS LCD, độ phân giải HD+. Vi xử lý Unisoc T612 cùng hệ điều hành Android 12 dung lượng pin 5.000 mAh', 12, 3, 1, '2021-11-05'),
(35, 'RM_C30s', 'realme C30s 4GB 64GB', 9, 2590000, '1685950757_RM_C30s.webp', 6.5, 'Camera sau  8MP Camera trước  5MP', 'Unisoc SC9863A1', 4, 64, 5000, '2 SIM (Nano-SIM)', 'realme UI Go Edition', 'Thương hiệu đến từ ông lớn nhà Realme đã giúp model điện thoại Realme C30s sở hữu nhiều đặc điểm nổi bật như màn hình thiết kế chi tiết sắc nét. Ngoài ra, nếu bạn đang tìm kiếm một dòng điện thoại tầm trung và xem phim tốt, nghe nhạc hay, chơi game mượt thì Realme C30s chính là một trong những lựa chọn không nên bỏ qua. Thêm nữa, model C30s này còn đi kèm viên pin lớn đến 5000mAh. Vì vậy, bạn sẽ thoải mái sử dụng mà không cảm thấy lo lắng vì hết pin nữa đó. ', 12, 3, 1, '2021-10-09'),
(36, 'RM_C25Y', 'Realme C25Y', 9, 4590000, '1685950922_RM_C25Y.webp', 6.5, 'Camera sau  Camera góc rộng: 50 MP, f/1.8, PDAF Camera cận cảnh: 2 MP, f/2.4 Camera cảm biến độ sâu: 2 MP, f/2.4 Camera trước  8 MP, f/2.0', 'Spreadtrum T610 8 nhân', 4, 128, 5000, '2 SIM (Nano-SIM)', 'Android 11, Realme U', 'Realme liên tục khiến người dùng ấn tượng với những mẫu smartphone giá rẻ, độc đáo. Trong lần ra mắt này, Realme mang đến thị trường thiết kế mang tên Realme C25Y. Điểm nổi bật nhất đó chính là pin lớn, sạc nhanh và có ba camera sau. Điện thoại Realme nàyhắc chắn sẽ mang đến cho người dùng những trải nghiệm ấn tượng vượt trội so với mức giá thành.', 10, 0, 1, '2023-06-15'),
(37, 'OP_Reno8T', 'OPPO Reno8 T 5G (8GB - 128GB)', 3, 9690000, '1685962918_OP_R8T.webp', 6.7, 'Camera sau  Chính 108 MP & Phụ 2 MP, 2 MP Camera trước  32 MP', 'Snapdragon 695 5G 8 nhân', 16, 128, 4800, '2 SIM (Nano-SIM)', 'Coloros 13', 'OPPO Reno8 T sở hữu hiệu năng mạnh mẽ, trang bị bộ vi xử lý thế hệ mới Snapdragon 695, tấm nền AMOLED 6.7 inch, màn hình 1 tỉ màu mang lại chất lượng hình ảnh siêu sắc nét và sống động tới từng chi tiết.', 16, 3, 1, '2023-01-09'),
(38, 'OP_Find_N2Flip', 'OPPO Find N2 Flip', 3, 19990000, '1685963037_OP_N2_Flip.webp', 6.8, 'Camera sau  Camera góc rộng: 50MP, f/1.8, 23mm, PDAF Camera góc siêu rộng 8MP, f/2.2, 112˚ Camera trước  Camera góc rộng: 32MP, f/2.4, 22mm, AF', 'MediaTek 9000+ (4nm)', 8, 256, 4300, '2 SIM (Nano-SIM)', 'Android 13', 'OPPO Find N2 Flip có kích thước 3.26 inch ở màn hình ngoài và bên trong là 6.8 inch, đặc biệt là GẬP KHÔNG NÊP GẤP và công nghệ hình ảnh chuyên nghiệp - MariSilicon X. Ngoài ra smartphone sẽ được vận hành bởi con chip Dimensity 9000+, kèm dung lượng pin 4.300 mAh và sạc siêu nhanh Super VOOC 44W.', 12, 2, 1, '2022-09-16');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`code_cart`),
  ADD KEY `id_khachhang` (`id_khachhang`);

--
-- Chỉ mục cho bảng `tbl_cart_info`
--
ALTER TABLE `tbl_cart_info`
  ADD PRIMARY KEY (`id_cart_infor`),
  ADD KEY `code_cart` (`code_cart`,`id_sp`),
  ADD KEY `id_sp` (`id_sp`);

--
-- Chỉ mục cho bảng `tbl_dangky`
--
ALTER TABLE `tbl_dangky`
  ADD PRIMARY KEY (`id_khachhang`);

--
-- Chỉ mục cho bảng `tbl_hangsp`
--
ALTER TABLE `tbl_hangsp`
  ADD PRIMARY KEY (`id_hangsp`);

--
-- Chỉ mục cho bảng `tbl_mucgia`
--
ALTER TABLE `tbl_mucgia`
  ADD PRIMARY KEY (`id_mucgia`),
  ADD UNIQUE KEY `mucgia` (`mucgia`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `id_hangsp` (`id_hangsp`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_cart_info`
--
ALTER TABLE `tbl_cart_info`
  MODIFY `id_cart_infor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `tbl_dangky`
--
ALTER TABLE `tbl_dangky`
  MODIFY `id_khachhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_hangsp`
--
ALTER TABLE `tbl_hangsp`
  MODIFY `id_hangsp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `tbl_mucgia`
--
ALTER TABLE `tbl_mucgia`
  MODIFY `id_mucgia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD CONSTRAINT `tbl_cart_ibfk_1` FOREIGN KEY (`id_khachhang`) REFERENCES `tbl_dangky` (`id_khachhang`);

--
-- Các ràng buộc cho bảng `tbl_cart_info`
--
ALTER TABLE `tbl_cart_info`
  ADD CONSTRAINT `tbl_cart_info_ibfk_1` FOREIGN KEY (`code_cart`) REFERENCES `tbl_cart` (`code_cart`),
  ADD CONSTRAINT `tbl_cart_info_ibfk_2` FOREIGN KEY (`id_sp`) REFERENCES `tbl_sanpham` (`id_sp`);

--
-- Các ràng buộc cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD CONSTRAINT `tbl_sanpham_ibfk_1` FOREIGN KEY (`id_hangsp`) REFERENCES `tbl_hangsp` (`id_hangsp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
