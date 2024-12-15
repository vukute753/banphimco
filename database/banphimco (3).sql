-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 14, 2024 lúc 02:08 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `banphimco`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `madonhang` varchar(10) NOT NULL,
  `masanpham` char(10) NOT NULL,
  `soluong` int(11) DEFAULT NULL,
  `trangthaidanhgia` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`madonhang`, `masanpham`, `soluong`, `trangthaidanhgia`) VALUES
('DH013', 'M026', 2, '1'),
('DH014', 'M021', 1, '1'),
('DH014', 'M023', 1, '1'),
('DH014', 'M029', 3, '1'),
('DH015', 'M014', 1, '1'),
('DH016', 'M007', 1, '0'),
('DH016', 'M019', 1, '0'),
('DH017', 'M015', 1, '0'),
('DH018', 'M014', 1, '0'),
('DH018', 'M017', 2, '0'),
('DH019', 'M023', 3, '1'),
('DH020', 'M023', 1, '1'),
('DH021', 'M022', 2, '0'),
('DH022', 'M023', 1, '1'),
('DH022', 'M026', 1, '0'),
('DH023', 'M023', 1, '0'),
('DH024', 'M016', 1, '1'),
('DH024', 'M023', 1, '1'),
('DH025', 'M023', 5, '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgiasanpham`
--

CREATE TABLE `danhgiasanpham` (
  `id` int(11) NOT NULL,
  `makhachhang` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `masanpham` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `madonhang` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `diemdanhgia` tinyint(4) NOT NULL,
  `noidung` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaytao` datetime DEFAULT current_timestamp(),
  `hinhanh` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhgiasanpham`
--

INSERT INTO `danhgiasanpham` (`id`, `makhachhang`, `masanpham`, `madonhang`, `diemdanhgia`, `noidung`, `ngaytao`, `hinhanh`) VALUES
(2, 'KH004', 'M026', 'DH013', 5, 'Hàng dỏm', '2024-12-12 00:00:00', 'caret-up-solid.svg'),
(3, 'KH004', 'M021', 'DH014', 3, 'khog', '2024-12-12 00:00:00', ''),
(4, 'KH004', 'M023', 'DH014', 3, 'aaaaaaaaaa', '2024-12-12 00:00:00', ''),
(5, 'KH004', 'M029', 'DH014', 0, 'không ok', '2024-12-12 00:00:00', ''),
(6, 'KH004', 'M023', 'DH019', 5, 'ok', '2024-12-12 00:00:00', ''),
(7, 'KH004', 'M023', 'DH020', 4, ' cung ok do\r\n', '2024-12-13 00:00:00', ''),
(8, 'KH005', 'M023', 'DH022', 5, 'kôkokoko', '2024-12-13 00:00:00', ''),
(9, 'KH004', 'M023', 'DH024', 1, 'Giao sai san pham', '2024-12-14 00:00:00', '2b9c9c7d-a457-481f-9312-b89b0d2fd82c.webp'),
(10, 'KH004', 'M016', 'DH024', 1, 'Giao khong dung', '2024-12-14 00:00:00', 'bao đựng bàn phím.png'),
(11, 'KH004', 'M014', 'DH015', 1, 'Sai sản phẩm', '2024-12-14 00:00:00', 'dầu lube.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `madonhang` char(10) NOT NULL,
  `makhachhang` char(10) DEFAULT NULL,
  `ngaydathang` date DEFAULT NULL,
  `tonggia` float DEFAULT NULL,
  `phuongthucthanhtoan` varchar(100) DEFAULT NULL,
  `trangthai` varchar(255) NOT NULL DEFAULT 'Chờ xác nhận',
  `tongsanpham` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`madonhang`, `makhachhang`, `ngaydathang`, `tonggia`, `phuongthucthanhtoan`, `trangthai`, `tongsanpham`) VALUES
('DH013', 'KH004', '2024-12-12', 200000, 'Thanh toán khi nhận hàng', 'Đã giao hàng', 2),
('DH014', 'KH004', '2024-12-12', 4900000, 'Thanh toán khi nhận hàng', 'Đã giao hàng', 5),
('DH015', 'KH004', '2024-12-12', 8000, 'Thanh toán khi nhận hàng', 'Đã giao hàng', 1),
('DH016', 'KH004', '2024-12-12', 1590000, 'Thanh toán khi nhận hàng', 'Đã giao hàng', 2),
('DH017', 'KH004', '2024-12-12', 8500, 'Thanh toán khi nhận hàng', 'Đã giao hàng', 1),
('DH018', 'KH004', '2024-12-12', 1128000, 'Thanh toán khi nhận hàng', 'Đã giao hàng', 3),
('DH019', 'KH004', '2024-12-12', 1800000, 'Thanh toán khi nhận hàng', 'Đã giao hàng', 3),
('DH020', 'KH004', '2024-12-13', 600000, 'Thanh toán khi nhận hàng', 'Đã giao hàng', 1),
('DH021', 'KH005', '2024-12-13', 11200000, 'Thanh toán khi nhận hàng', 'Đã giao hàng', 2),
('DH022', 'KH005', '2024-12-13', 700000, 'Thanh toán chuyển khoản', 'Đã giao hàng', 2),
('DH023', 'KH005', '2024-12-13', 600000, 'Thanh toán chuyển khoản', 'Đã giao hàng', 1),
('DH024', 'KH004', '2024-12-14', 1290000, 'Thanh toán khi nhận hàng', 'Đã giao hàng', 2),
('DH025', 'KH004', '2024-12-14', 3000000, 'Thanh toán chuyển khoản', 'Chờ xác nhận', 5);

--
-- Bẫy `donhang`
--
DELIMITER $$
CREATE TRIGGER `donhang_before_insert` BEFORE INSERT ON `donhang` FOR EACH ROW BEGIN
    DECLARE next_id INT;
    SET next_id = (SELECT IFNULL(MAX(CAST(SUBSTRING(madonhang, 3) AS SIGNED)), 0) + 1 FROM donhang);
    SET NEW.madonhang = CONCAT('DH', LPAD(next_id, 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `magiohang` varchar(10) NOT NULL,
  `makhachhang` varchar(10) NOT NULL,
  `masanpham` varchar(10) NOT NULL,
  `soluong` int(11) NOT NULL,
  `gia` float DEFAULT NULL,
  `hinhanh` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`magiohang`, `makhachhang`, `masanpham`, `soluong`, `gia`, `hinhanh`) VALUES
('GH001', 'KH002', 'M022', 1, 5600000, '2311202314648z4908743529314_90248729d4582b9904c3f9331ddd0681.jpg'),
('GH002', 'KH003', 'M021', 1, 2500000, '2311202314516z4908735699403_52c2c5d5b4ec85fd194824b80aae28de.jpg'),
('GH003', 'KH003', 'M016', 1, 690000, '23112023135223WUkds Majin Buu keycaps.jpg');

--
-- Bẫy `giohang`
--
DELIMITER $$
CREATE TRIGGER `giohang_before_insert` BEFORE INSERT ON `giohang` FOR EACH ROW BEGIN
    DECLARE next_id INT;
    SET next_id = (SELECT IFNULL(MAX(CAST(SUBSTRING(magiohang, 3) AS SIGNED)), 0) + 1 FROM giohang);
    SET NEW.magiohang = CONCAT('GH', LPAD(next_id, 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `makhachhang` varchar(10) NOT NULL,
  `tendangnhap` varchar(100) NOT NULL,
  `matkhau` varchar(255) DEFAULT NULL,
  `hoten` varchar(50) DEFAULT NULL,
  `diachi` varchar(150) DEFAULT NULL,
  `sodienthoai` varchar(15) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `ngaytao` date DEFAULT NULL,
  `ngaysinh` date DEFAULT NULL,
  `gioitinh` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`makhachhang`, `tendangnhap`, `matkhau`, `hoten`, `diachi`, `sodienthoai`, `email`, `ngaytao`, `ngaysinh`, `gioitinh`) VALUES
('KH001', 'hienvu', '$2y$10$SFyyCcY0LFpEkUH45mdrxeZp/7PW6295fGW/a1Yl3TCUm7z9DvlqO', 'Nguyễn Hiền Vũ', 'Ngã Bảy Hậu Giang', '868085320', 'hienvu@gmail.com', '2023-11-24', '2003-01-07', 'Nam'),
('KH002', 'hienhien', '$2y$10$ntffedhYsTVpQaxIvie.3.3QQe.uYP.7IU1U6kpyyJ.iIJ3Kkv6wa', 'Vũ Hiền', NULL, '2147483647', 'hien@gmail.com', '2024-03-22', NULL, NULL),
('KH003', 'hienvu1', '$2y$10$ZYnFLWIwjFYQ/CKHyMzB.O.LaYbKS0v8q6zGY.uSNbeIKAsUPKdB6', 'Hiền Vũ', NULL, '868085322', 'hienvu1@gmail.com', '2024-12-08', NULL, NULL),
('KH004', 'hienvudeptrai', '$2y$10$O8pOozs0g06pEtVkNvB5GeL/Kvhc7uMPemEOMYzN.9Q/N0JAaQPCe', 'Hiền Vũ', 'Cần Thơ, Ninh Kiều, Hậu Giang', '0862085321', 'hienvudeptrai@gmail.com', '2024-12-10', NULL, 'Nam'),
('KH005', 'vudeptrai', '$2y$10$cLEnvW2NJYM2qopdC./KpuREpnHHH3H5ujklZkWPDAtOMTdmvLODG', 'Nguyễn Hiền Vũ', NULL, NULL, 'vudeptrai@gmail.com', '2024-12-13', NULL, NULL);

--
-- Bẫy `khachhang`
--
DELIMITER $$
CREATE TRIGGER `khachhang_before_insert` BEFORE INSERT ON `khachhang` FOR EACH ROW BEGIN
    DECLARE next_id INT;
    SET next_id = (SELECT IFNULL(MAX(CAST(SUBSTRING(makhachhang, 3) AS SIGNED)), 0) + 1 FROM khachhang);
    SET NEW.makhachhang = CONCAT('KH', LPAD(next_id, 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `maloai` int(11) NOT NULL,
  `tenloai` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`maloai`, `tenloai`) VALUES
(1, 'Bàn Phím Cơ'),
(2, 'Kit'),
(3, 'KeyCaps'),
(4, 'Phụ Kiện'),
(6, 'Switch'),
(7, 'Dầu lube'),
(13, 'Túi đựng bàn phím');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `masanpham` varchar(10) NOT NULL,
  `tensanpham` varchar(50) DEFAULT NULL,
  `gia` float DEFAULT NULL,
  `hinhanh` text DEFAULT NULL,
  `mota` varchar(1000) DEFAULT NULL,
  `loai` int(11) DEFAULT NULL,
  `soluong` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`masanpham`, `tensanpham`, `gia`, `hinhanh`, `mota`, `loai`, `soluong`) VALUES
('M004', 'Kit Bàn Phím Cơ Custom Akko SPR 75 (full nhôm, spr', 2800000, '23112023133026z4908642774610_4299863c3ad4b3a815547fc91bb689cf.jpg', 'AKKO SPR75 là kit bàn phím cơ full nhôm hứa hẹn sẽ rất hot trong tầm giá hơn 4 triệu Đồng nhờ những ưu điểm sau:\r\nFull nhôm, được anode tỉ mỉ, kĩ lưỡng\r\nMạch xuôi, không có LED do sử dụng flex-cut ENIG PCBA -> trải nghiệm gõ sẽ tối ưu\r\nSử dụng cơ chế spring mount rất đặc biệt, gia tặng độ nhún và làm mềm mại đều âm hơn\r\nFull foam và phụ kiện đi kèm\r\nLayout 75% nhỏ gọn, thuận tiện mang vác đi lại\r\nKIT bàn phím  AKKO SPR75 Có mid-frame và cả tạ đáy gia tăng tính thẩm mỹ.\r\nKèm sẵn 2 Plate là POM và FR4 phù hợp với nhiều lựa chọn của người dùng', 1, 0),
('M005', '[In Stock] Zoom TKL (Wild Green)', 4650000, '23112023133257z4908649698109_2b370114e31bff9b4b820082640fb156.jpg', 'Zoom TKL (Wild Green) là một bàn phím cơ nổi bật với thiết kế nhỏ gọn và màu sắc độc đáo. Với bố cục TKL (Tenkeyless) - bỏ đi số phím, bàn phím này giúp tiết kiệm không gian trên bàn làm việc và tăng khả năng di chuyển.\r\n\r\nMàu sắc Wild Green của Zoom TKL thể hiện sự tươi sáng và hiện đại. Với một tông màu xanh lá cây đậm và tươi mát, bàn phím này tạo ra một cái nhìn tươi mới và nổi bật trên bất kỳ bàn làm việc nào.\r\n\r\nZoom TKL được trang bị công nghệ bàn phím cơ chất lượng cao, mang lại trải nghiệm gõ phím chính xác và nhạy bén. Các switch (cơ cấu chuyển đổi) có thể được lựa chọn, bao gồm các loại switch phổ biến như Cherry MX hoặc Gateron, để phù hợp với sở thích và phong cách gõ phím của người dùng.', 1, 0),
('M006', 'Coffee Cup Keycap', 900000, '23112023133517keycap.jpg', 'Coffee Cup Keycap là một keycap (nút bấm) dành cho bàn phím cơ, được thiết kế theo hình dạng và hình ảnh của một cốc cà phê. Đây là một phụ kiện thú vị và độc đáo để cá nhân hóa bàn phím của bạn và thể hiện sở thích cá nhân với cà phê.\r\n\r\nCoffee Cup Keycap thường được làm từ chất liệu nhựa hoặc nhựa cao su, với màu sắc và chi tiết tương tự như một cốc cà phê thực tế. Chi tiết bao gồm quai cốc, hình dáng và các chi tiết như nắp, quai cốc và tay cầm.\r\n\r\nKeycap này có kích thước và hình dạng tương thích với bàn phím cơ chuẩn, cho phép bạn thay thế một hoặc nhiều keycap trên bàn phím của mình. Việc thay thế keycap có thể dễ dàng và không yêu cầu kỹ năng đặc biệt.', 3, 0),
('M007', 'ABM066 Keyboard KIT', 990000, '23112023133618z4908666173491_751e1bbe89b7d57511fc8da733095b40.jpg', 'ABM066 Keyboard KIT là một bộ phím cơ DIY (làm tự thủ công) có thiết kế tùy chỉnh và linh hoạt. Được gọi là \"KIT\" (bộ phím DIY) vì nó cung cấp các linh kiện cơ bản để bạn tự lắp ráp và tuỳ chỉnh bàn phím cơ của riêng mình.\r\n\r\nBộ phím ABM066 Keyboard KIT bao gồm các thành phần chính như PCB (Printed Circuit Board), plate (tấm kim loại hoặc nhựa để gắn switch), keycap (nút bấm), và các switch (cơ cấu chuyển đổi). Điều này cho phép bạn tự lựa chọn cá', 2, 0),
('M008', 'Neo65 Keyboard', 6500000, '23112023133732neo65KeyBoard.jpg', 'Neo65 Keyboard là một bàn phím cơ với thiết kế gọn nhẹ và tích hợp các tính năng hiện đại. Với tên gọi \"Neo65\", nó thể hiện sự hiện đại và tiên tiến trong ngành bàn phím cơ.\r\n\r\nNeo65 có kích thước 65% - tức là nó loại bỏ các phím số (numpad) và phím điều hướng, giúp tiết kiệm không gian trên bàn và tạo sự di động. Mặc dù có kích thước nhỏ gọn, Neo65 vẫn giữ được sự thoải mái khi gõ phím bằng cách giữ lại các phím chức năng cần thiết và sắp xếp lại các phím còn lại một cách hợp lý.', 1, 0),
('M009', 'BD60 Keyboard', 5800000, '23112023133841BD60KeyBoard.jpg', 'BD60 Keyboard là một bàn phím cơ tự lắp ráp với thiết kế 60% compact và tích hợp nhiều tính năng tùy chỉnh. BD60 được đánh giá cao trong cộng đồng bàn phím cơ DIY (làm tự thủ công) nhờ sự linh hoạt và khả năng tùy chỉnh của nó.\r\n\r\nBD60 có kích thước 60%, loại bỏ các phím số (numpad) và phím điều hướng để tiết kiệm không gian trên bàn và tạo sự di động. Mặc dù nhỏ gọn, nó vẫn giữ được sự thoải mái khi gõ phím bằng cách giữ lại các phím chức năng cần thiết và sắp xếp lại các phím còn lại một cách hợp lý.', 1, 0),
('M010', 'Tropical water v2', 11000, '23112023134132Tropical water v2.jpg', 'Công tắc bàn phím cơ - Tropical Waters V2 Switch\r\n\r\nTropical Waters thì có lẽ không cần phải giới thiệu quá nhiều nữa. Đây là một trong những switch được rất nhiều người yêu thích và săn lùng.\r\nSau sự thành công của V1, Keebhut đã tiếp thu nhận xét từ người dùng và thay đổi phần được feedback nhiều nhất, đó là lò xo quá nặng. Các thành phần còn lại được giữ nguyên, mang lại trải nghiệm gõ mượt mà, ít wobble với âm thanh to nhưng trầm.', 6, 0),
('M011', 'Tropical Water V1', 25000, '23112023134255Tropical Water V1.jpg', 'Công tắc bàn phím cơ - Tropical Waters V2 Switch\r\n\r\nTropical Waters thì có lẽ không cần phải giới thiệu quá nhiều nữa. Đây là một trong những switch được rất nhiều người yêu thích và săn lùng.\r\n', 6, 0),
('M012', 'KTT Kang White', 2498, '23112023134420KTT Kang White.jpg', 'Thông số:\r\n\r\n - Loại switch: Linear - 3 PIN\r\n\r\n- Chất liệu Stem: POM - Top housing: Polycarbonate - Bottom housing: Nylon\r\n\r\n- Lực nhấn: 60g\r\n\r\n- Hành trình: 4.0mm\r\n\r\nÂm thocky pha creamy', 6, 0),
('M013', 'Z1 switch', 2498, '23112023134542z1.jpg', 'Switch Z1 của nhà MZ\r\nLực khích hoạt 32g, lực đáy 37g.\r\nStem LY\r\nTop:  PC\r\nBot:   PA66\r\nLực khích hoạt 40g, lực đáy 45g.\r\nLực khích hoạt 48g, lực đáy 53g.', 6, 0),
('M014', 'Feker x Matcha Switches', 8000, '23112023134719Feker x Matcha Switches.jpg', 'Feker x Matcha Switches là một loại công tắc (switches) dùng trong bàn phím cơ (mechanical keyboards). Đây là một sản phẩm hợp tác giữa hai thương hiệu nổi tiếng trong cộng đồng cơ đồ họa, đó là Feker và Matcha.\r\n\r\nFeker x Matcha Switches có thiết kế dựa trên công nghệ switch cơ truyền thống, nhưng được cải tiến để cung cấp trải nghiệm gõ phím tốt hơn và đáng chú ý.', 1, 0),
('M015', 'KTT Matcha', 8500, '23112023134822KTT Matcha.jpg', 'sản xuất bởi KTT, một switch được đánh giá rất cao ở tầm giá này\r\n\r\n Thông số kỹ thuật\r\n- tactile \r\n -Vo bang polycarbonate\r\n - Thân POM\r\n - 40g lực nhấn \r\n - 45g chạm đáy\r\n - 3 chân', 6, 0),
('M016', 'WUkds Majin Buu keycaps', 690000, '23112023135223WUkds Majin Buu keycaps.jpg', 'Manufacturer: WUkds          \r\nProfile: MOA         \r\nMaterial: PBT\r\nNumber of Keys: 141 Keys\r\nKeycap thickness: 1.5mm\r\n\r\nLấy cảm hứng từ nhân vật hoạt hình trong 1 bộ anime nổi tiếng của Nhật Bản\r\nChủ đề của keycap này là Buu, nhân vật mũm mĩm, dễ thương và tốt bụng của chúng ta, trông vô hại với con người và động vật, rất dễ thương. Tính cách đã thêm rất nhiều biểu cảm dễ thương của Buu và một số món tráng miệng mà cậu ấy thích ăn khi là một tín đồ ẩm thực\r\nMàu sắc tổng thể là màu hồng, vùng chữ có màu hồng đậm, còn lại có màu hồng nhạt, vàng và trắng kem để trang trí.', 1, 0),
('M017', 'Keycap Cherry Jamon ABS Doubleshot', 560000, '23112023135415Keycap Cherry Jamon ABS Doubleshot.jpg', 'Keycap dạng thấp với phần mặt trên phẳng đều. Riêng hàng cuối có độ nghiêng lớn để lấy lại thăng bằng và đỡ lại cảm giác mỏi nơi người dùng.  \r\nVề kết cấu chung thì Cherry profile hầu như khá giống OEM, nhưng các phím thấp hơn và độ dốc được tinh chỉnh lại để phù hợp với toàn cục. Kiểu kết cấu được sắp xếp lại này giúp cho các phím Cherry profile cho cảm giác gõ nhẹ nhàng êm ái hơn hẳn so với OEM, âm thanh phát ra cũng rõ ràng sắc nét hơn nếu so sánh cùng chất liệu và trọng lượng.', 3, 0),
('M018', 'Keycap Cherry 8008-2 ABS Doubleshot', 560000, '2311202314024z4908727564805_b8782bd3831478945cb8f788892b8c40.jpg', ' Profile: Cherry\r\n- Chất liệu: ABS\r\n- Công nghệ in: Doubleshot\r\n- Số lượng nút: 175 nút\r\n- Xuất xứ: Trung Quốc\r\n-Phân phối: Sói Gear\r\n1. Profile Cherry - Hiệu ứng thị giác tuyệt vời\r\nProfile Cherry với độ cao và thiết kế có thể nói là đẹp mắt nhất trong các profile. Màu sắc của bộ keycap này cực kỳ phù hợp cho các góc setup.\r\n2. ABS Doubleshot\r\nKeycap ABS lên màu tuyệt đẹp, mịn màng và kiểu ký tự Doubleshot hoàn thiện tốt\r\n3. Số lượng nút 135 nút\r\nVới số lượng này, người dùng có thể chơi thoải mái các layout cơ bản của bàn phím trên thị trường', 3, 0),
('M019', 'Keycap Walker Cherry Super Mario PBT Dyesub', 600000, '2311202314159z4908729581415_995de386d0a89c5de7257f213beee8d7.jpg', '- Profile: CHERRY\r\n- Chất liệu:PBT\r\n- Công nghệ in: Dyesub\r\n- Số lượng nút: Cân thoải mái các layout trên thị trường\r\n- Xuất xứ: Trung Quốc', 3, 0),
('M020', 'StarAlice Keyboard KIT', 6150000, '2311202314325z4908732495027_02006f84165ada9fd4967efa95509613.jpg', '1. Case Nhôm CNC 6063\r\n2. Structure: Leaf Spring\r\n3. Tùy chọn mặc định: Tạ (Counter weight) SS PVD Mirror, Foam các loại, PCB 1 mode, có Màn hình\r\n4. Màu sắc Top và Bot Case: Anod-Wine Red, E-Light Blue, E-Purple, E-Rice, E-Milk White, E-Pink, E-Matcha Green, E-Cool White, E-Retro Red, E-Deep Purple, E-Yellow\r\n(Có thể lựa chọn và phối màu Bot + Top Case tùy ý)\r\n5. Có thể Upgrade thêm Chamfer: Silver, Gold, Pine Green\r\n6. Có thể Upgrade thêm hiệu ứng óng ánh (Flash)\r\n7. Màu Counter weight: PVD Black, Blue, Gold, Prism\r\n8. PCB: 1.2mm Flex Cut\r\n- Standard: 1 mode - NON FLEX CUT - Support QMK và VIA\r\n- Upgrade: 3 modes - FLEX CUT - Dùng phần mềm của hãng\r\n(Do ban đầu hãng chỉ làm mạch Flex Cut, nhưng Sói Gear đã xin hãng làm Non-Flex Cut cho bản 1 mode, chưa thể xin cho bản 3 modes)\r\n9. Plate mặc định: Chọn 1 trong 4 loại: PC, POM, FR4, Alu\r\n10. Add-ons: \r\n- Kê tay\r\n- PCB 1 mode\r\n- PCB 3 modes\r\n- Plate POM, PC, FR4, Alu\r\n\r\n', 2, 0),
('M021', 'FINALKEY V81 PLUS Keyboard (KIT)', 2500000, '2311202314516z4908735699403_52c2c5d5b4ec85fd194824b80aae28de.jpg', '- Case nhôm Full CNC\r\n- Gồm 3 màu case: Trắng, Đen, Đỏ, Xanh Dương\r\n- Công nghệ sơn : Spray ( Trắng và Đen ) và Anod ( Đỏ và Xanh Dương ) \r\n- Kết nối 3 chế độ: Cắm dây, 2.4G, Blutooth\r\n- PCB: Hotswap, Support VIA, Không LED, tương thích WIN/MAC\r\n- Stab: Hỗ trợ Platemount và Screw-in (Stab đi kèm là Plate mount)\r\n-  Plate: PC\r\n-  Mặt trước có chỗ cất Recever, nắp che hút nam châm bằng PVD.', 1, 0),
('M022', 'ZOOM65 V2 x Soul Land Series by Meletrix', 5600000, '2311202314648z4908743529314_90248729d4582b9904c3f9331ddd0681.jpg', '- Keyboard Layout: 65%\r\n- Mounting Style: Gasket Mount\r\n- Case Finish: Anodized with chamfer(E-White for Qian Ren Xue), pattern radium carving + infilling\r\n- PCB Version: Hot-swap, multi-layout Bluetooth /VIA PCB with per-key RGB\r\n- PCB: 1.2mm thickness, with daughterboard\r\n- Default Plate: PC\r\n- Connection Method: Wireless (Wired & Bluetooth 5.2)\r\n- Bluetooth Support: Can be paired up to 3 devices\r\n- System Supported: Windows, Mac, iOS, Android\r\n- Bottom Plate：\r\n+ ZOOM65 V2 x Tang San Assembled Edition---Glass Mirror+ UV printing\r\n+ ZOOM65 V2 x Xiao Wu Assembled Edition---Anodized Alu\r\n+ ZOOM65 V2 x Qian Ren Xue Assembled Edition---PVD Mirror Gold\r\n- External Weight: Sandblasted aluminum+UV Printing\r\nĐẶC BIỆT: Zoom65 V2 x Soul Land là phiên bản được lắp ráp sẵn với tạ trong, WS Morandi Switch và Keycap Đấu La Đại Lục PBT Dyesub 1.7mm', 1, 0),
('M023', 'Keycap Christmas Evi', 600000, '2311202314747z4908757399375_865c4a82f0c3df40dda940f1067955a7.jpg', '- Chất liệu: PBT Dyesub\r\n- Profile: MDA hoặc Cherry\r\n- Số nút: 138 nút hoặc 158 nút', 1, 0),
('M026', 'Túi đựng bàn phím cơ layout 65% và 75% và TKL và F', 100000, '8122024132543bao đựng bàn phím.png', 'Túi nỉ đựng bàn phím cơ layout 65% và 75% Finder A\r\nkích thước túi 34x17x4cm - size 65 và 75\r\n\r\n* Chất liệu vải nỉ bền, thời trang\r\n* Bảo vệ chống shock, rơi rớt, tiện mang di chuyển bàn phím cơ\r\n* Khách hàng vui lòng xem kĩ kích thước túi và bàn phím của mình trước khi đặt hàng\r\n\r\nChơi và sưu tầm bàn phím cơ đang là một trào lưu thịnh hành hiện nay, các bạn trẻ có thể bỏ hàng chục triệu để sở hữu, mod một chiếc bàn phím cơ độc đáo cho mình. Tuy nhiên, túi, hộp đựng bàn phím cơ thì lại khá khan hiếm trên thị trường. Shop Lucas Combo đã nghiên cứu, đặt hàng nhiều mẫu túi, hộp đựng bàn phím cơ để dành tặng cho khách hàng mua Bàn phím cơ for Mac tại shop và đồng thời cũng bán cho khách hàng có nhu cầu. Túi, Bao nỉ đựng Bàn phím cơ của shop có đủ size để đựng vừa các sản phẩm của các thương hiệu bàn phím cơ nổi tiếng và phổ biến hiện nay như Realforce, Filco, Keychron, Akko, DareU, LeoPold, Lofree, Logitech…\r\n\r\nMô Tả Sản Phẩm:\r\n\r\nChất liệu: Vải nỉ, bền, thời trang\r\n\r\nCó dây thun để cố định', 13, 10),
('M027', 'Túi đựng bàn phím Kelowna', 70000, '81220241326222b9c9c7d-a457-481f-9312-b89b0d2fd82c.webp', 'Túi đựng bàn phím Layout 60/68 và layout TKL 87\r\n\r\nChất liệu da kết hợp với vải nỉ\r\n\r\nBảo vệ tối đa cho chiếc bàn phím thân yêu của bạn.\r\n\r\nXuất xứ: Trung Quốc\r\n\r\nBảo hành: không', 13, 10),
('M028', 'Túi đựng bàn phím cơ Glorious Keyboard Case - Hàng', 800000, '812202413273024.05.2021-pcx-tui-dung-bpc-Glorious-1024x576.png', 'Phong Cách Xanh - Nhà phân phối chính hãng Glorious tại Việt Nam\r\n\r\n======================================\r\n\r\n\r\n\r\nTương thích với dòng GMMK Pro và các dòng sản phẩm phím cơ có kích thước từ 330mm x 130mm x 30mm trở xuống\r\n\r\n\r\n\r\nTúi đựng bàn phím cơ Glorious Case là sự lựa chọn hoàn hảo cho những ai muốn bảo vệ chiếc bàn phim cơ yêu quý của mình . Thiết kế dày dặn , cứng cáp , tương thích với dòng GMMK Pro và các dòng sản phẩm phím cơ có kích thước từ 330mm x 130mm x 30mm trở xuống . Túi đựng bàn phím cơ Glorious Case sẽ làm hài lòng các khách hàng khó tính nhất.\r\n\r\n\r\n\r\nĐẸP - LỊCH SỰ - BẢO VỆ BÀN PHÍM HẾT CỠ\r\n\r\nThiết kế cho bàn phím Glorious GMMK Pro\r\n\r\nTích hợp ngăn kéo đựng phụ kiện bên trong.\r\n\r\n\r\n\r\nTHIẾT KẾ BẢO VỆ TOÀN DIỆN\r\n\r\nBên ngoài: đạng đúc cứng, bảo vệ khỏi những cú rơi, bụi và những tác nhân khác.\r\n\r\nBên trong: đai cố định bàn phím, đai lấy nhanh bàn phím ra khỏi case. Tích hợp túi đựng phụ kiện bên trong và dây kéo chống kẹt.\r\n\r\nVà không thể thiếu tay xách túi được tích hợp', 13, 10),
('M029', 'Túi/ Hộp Đựng Bảo Vệ Chống Shock Bàn Phím Cơ KBD75', 600000, '8122024132845Hộp-dựng-bàn-phím-cơ-KBDFans-4.png', 'Sản phẩm cao cấp giúp bảo vệ tuyệt đối bàn phím cơ của bạn. Mọi chi tiết từ chất liệu EVA bên ngoài, tới lớp vải, đệm chống shock bên trong và quai cầm túi khi di chuyển đều mang lại cảm giác hài lòng tuyệt đối. Lưu ý, sản phẩm dành cho các lay-out bàn phím cơ 75% hoặc 84 phím hoặc chênh lệch một ít tuỳ vào từng hãng. Để chính xác nhất, bạn vui lòng kiểm tra kích thước của bàn phím và kích thước túi đựng.\r\nChất liệu: Vỏ ngoài EVA, mút, vải chống shock.\r\n\r\nThương hiệu: KBDFans\r\nChống shock chuẩn khít với từng size bàn phím cơ\r\nKích thước: 36 x 19 x 7 cm', 13, 10);

--
-- Bẫy `sanpham`
--
DELIMITER $$
CREATE TRIGGER `sanpham_before_insert` BEFORE INSERT ON `sanpham` FOR EACH ROW BEGIN
    DECLARE next_id INT;
    SET next_id = (SELECT IFNULL(MAX(CAST(SUBSTRING(masanpham, 3) AS SIGNED)), 0) + 1 FROM sanpham);
    SET NEW.masanpham = CONCAT('M', LPAD(next_id, 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `mataikhoan` varchar(10) NOT NULL,
  `tendangnhap` varchar(100) NOT NULL,
  `matkhau` varchar(255) DEFAULT NULL,
  `hoten` varchar(50) DEFAULT NULL,
  `diachi` varchar(150) DEFAULT NULL,
  `sodienthoai` int(12) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `quyen` varchar(20) DEFAULT 'Nhân viên',
  `ngaytao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`mataikhoan`, `tendangnhap`, `matkhau`, `hoten`, `diachi`, `sodienthoai`, `email`, `quyen`, `ngaytao`) VALUES
('TK001', 'admin', '$2y$10$b4KY1lAJ1snX/uK7w2DCVO7q6gmQCwEleLuO4CRbogWkFqTMPjfDi', 'Lê Vĩ Khang', 'Ấp Vĩnh Tây 2, Vĩnh Phong, Vĩnh Thuận, Kiên Giang', 949068911, 'lvkhang2100885@student.ctuet.edu.vn', '1', '2023-11-13'),
('TK002', 'aaaaaaaaaaaaaaaa', '$2y$10$JjpmoYucY077YV9ChgfpOeaDUX1cWUYyYL6XlC2Ub5d4IMY8qiHhq', 'Lê Vĩ Khang', 'VT-KG', 949068911, 'lvkhang2100885@student.ctuet.edu.vn', '0', '2023-11-13'),
('TK003', 'thinh', '$2y$10$r4pZ2XEH3NERu5dTcPWn6OpgERBsIKbA/rc3FVYrG97S3.MFtfZAe', 'Đoàn Gia Thịnh', 'Sóc Trăng', 123456789, 'dgt@gmail.com', '1', '2023-11-22');

--
-- Bẫy `taikhoan`
--
DELIMITER $$
CREATE TRIGGER `taikhoan_before_insert` BEFORE INSERT ON `taikhoan` FOR EACH ROW BEGIN
    DECLARE next_id INT;
    SET next_id = (SELECT IFNULL(MAX(CAST(SUBSTRING(mataikhoan, 3) AS SIGNED)), 0) + 1 FROM taikhoan);
    SET NEW.mataikhoan = CONCAT('TK', LPAD(next_id, 3, '0'));
END
$$
DELIMITER ;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`madonhang`,`masanpham`),
  ADD KEY `masanpham` (`masanpham`);

--
-- Chỉ mục cho bảng `danhgiasanpham`
--
ALTER TABLE `danhgiasanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_danhgiasanpham_khachhang` (`makhachhang`),
  ADD KEY `fk_danhgiasanpham_sanpham` (`masanpham`),
  ADD KEY `fk_danhgiasanpham_donhang` (`madonhang`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`madonhang`),
  ADD KEY `makhachhang` (`makhachhang`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`magiohang`),
  ADD KEY `masanpham` (`masanpham`),
  ADD KEY `makhachhang` (`makhachhang`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`makhachhang`);

--
-- Chỉ mục cho bảng `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`maloai`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`masanpham`),
  ADD KEY `loai` (`loai`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danhgiasanpham`
--
ALTER TABLE `danhgiasanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `loai`
--
ALTER TABLE `loai`
  MODIFY `maloai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`madonhang`) REFERENCES `donhang` (`madonhang`),
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`masanpham`) REFERENCES `sanpham` (`masanpham`);

--
-- Các ràng buộc cho bảng `danhgiasanpham`
--
ALTER TABLE `danhgiasanpham`
  ADD CONSTRAINT `fk_danhgiasanpham_donhang` FOREIGN KEY (`madonhang`) REFERENCES `donhang` (`madonhang`),
  ADD CONSTRAINT `fk_danhgiasanpham_khachhang` FOREIGN KEY (`makhachhang`) REFERENCES `khachhang` (`makhachhang`),
  ADD CONSTRAINT `fk_danhgiasanpham_sanpham` FOREIGN KEY (`masanpham`) REFERENCES `sanpham` (`masanpham`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`makhachhang`) REFERENCES `khachhang` (`makhachhang`);

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`masanpham`) REFERENCES `sanpham` (`masanpham`),
  ADD CONSTRAINT `giohang_ibfk_2` FOREIGN KEY (`makhachhang`) REFERENCES `khachhang` (`makhachhang`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`loai`) REFERENCES `loai` (`maloai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
