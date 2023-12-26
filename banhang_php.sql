-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 19, 2019 lúc 04:45 AM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `banhang_php`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `MaBinhLuan` int(11) NOT NULL,
  `TenDangNhap` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MaSanPham` int(11) NOT NULL,
  `NgayBinhLuan` date NOT NULL,
  `NoiDung` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`MaBinhLuan`, `TenDangNhap`, `MaSanPham`, `NgayBinhLuan`, `NoiDung`) VALUES
(1, 'hieu', 37, '2019-05-17', 'Sản phẩm dùng tạm được'),
(2, 'hieu', 45, '2019-05-17', 'Sản phẩm dùng tốt\r\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ct_dondat`
--

CREATE TABLE `ct_dondat` (
  `MaDonDat` int(11) NOT NULL,
  `MaSanPham` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ct_dondat`
--

INSERT INTO `ct_dondat` (`MaDonDat`, `MaSanPham`, `SoLuong`) VALUES
(1, 36, 1),
(1, 46, 1),
(1, 52, 1),
(2, 41, 1),
(2, 47, 1),
(2, 53, 1),
(3, 38, 1),
(3, 46, 1),
(3, 54, 1),
(4, 35, 1),
(4, 44, 1),
(4, 55, 1),
(5, 39, 1),
(5, 46, 1),
(5, 54, 1),
(6, 37, 1),
(6, 45, 1),
(6, 52, 1),
(7, 47, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgia`
--

CREATE TABLE `danhgia` (
  `MaSanPham` int(11) NOT NULL,
  `TenDangNhap` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NoiDung` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dondat`
--

CREATE TABLE `dondat` (
  `MaDonDat` int(11) NOT NULL,
  `TenDangNhap` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MaNhanVien` int(11) NOT NULL,
  `TrangThai` text COLLATE utf8_unicode_ci NOT NULL,
  `NoiGiao` text COLLATE utf8_unicode_ci NOT NULL,
  `NgayDat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dondat`
--

INSERT INTO `dondat` (`MaDonDat`, `TenDangNhap`, `MaNhanVien`, `TrangThai`, `NoiGiao`, `NgayDat`) VALUES
(1, 'dautuan', 1, '0', 'Hà Đông, Hà Nội', '2019-05-17'),
(2, 'duc', 1, '0', 'Hà Đông, Hà Nội', '2019-05-17'),
(3, 'hoan', 1, '0', 'Hà Đông, Hà Nội', '2019-05-17'),
(4, 'khoa', 1, '0', 'Hà Đông, Hà Nội', '2019-05-17'),
(5, 'tuan', 1, '0', 'Hà Đông, Hà Nội', '2019-05-17'),
(6, 'hieu', 3, '1', 'Hà Đông, Hà Nội', '2019-05-17'),
(7, 'hieu', 1, '0', 'HN', '2019-05-18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisp`
--

CREATE TABLE `loaisp` (
  `MaLoaiSP` int(11) NOT NULL,
  `TenLoai` text COLLATE utf8_unicode_ci NOT NULL,
  `MoTa` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisp`
--

INSERT INTO `loaisp` (`MaLoaiSP`, `TenLoai`, `MoTa`) VALUES
(1, 'Sạc dự phòng', 'pin sạc dự phòng 5000-12000mAh'),
(2, 'Tai nghe', 'tai nghe chụp tai, tai nghe bluetooth'),
(3, 'Loa', 'loa có dây, loa bluetooth');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNhanVien` int(11) NOT NULL,
  `HoTen` text COLLATE utf8_unicode_ci NOT NULL,
  `TenDangNhap` text COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` text COLLATE utf8_unicode_ci NOT NULL,
  `NgaySinh` date NOT NULL,
  `GioiTinh` text COLLATE utf8_unicode_ci NOT NULL,
  `DienThoai` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MaNhanVien`, `HoTen`, `TenDangNhap`, `MatKhau`, `NgaySinh`, `GioiTinh`, `DienThoai`) VALUES
(1, 'Phan Trung Hiếu', 'admin', '123456', '1998-01-01', 'M', '0911234567'),
(2, 'Nguyễn Đình Thắng', 'thang', '123456', '1998-03-02', 'M', '0911234567'),
(3, 'Trần Văn Đức', 'duccop', '123456', '1998-06-18', 'M', '0911234567');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSanPham` int(11) NOT NULL,
  `TenSanPham` text COLLATE utf8_unicode_ci NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `Anh` text COLLATE utf8_unicode_ci NOT NULL,
  `DonGia` decimal(10,0) NOT NULL,
  `ThongTin` text COLLATE utf8_unicode_ci NOT NULL,
  `TrangThai` text COLLATE utf8_unicode_ci NOT NULL,
  `MaLoaiSP` int(11) NOT NULL,
  `Anh2` text COLLATE utf8_unicode_ci NOT NULL,
  `Anh3` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaSanPham`, `TenSanPham`, `SoLuong`, `Anh`, `DonGia`, `ThongTin`, `TrangThai`, `MaLoaiSP`, `Anh2`, `Anh3`) VALUES
(34, 'Pin sạc dự phòng eSaver 5.000 mAh Y322', 50, 'pin11.jpg', '160000', 'Pin sạc dự phòng hiệu eSaver với dung lượng 5.000 mAh vừa đủ cho một ngày làm việc và sử dụng của bạn.', 'Mới', 1, 'pin12.jpg', 'pin13.jpg'),
(35, 'Pin sạc dự phòng 5000mAh eSaver LA A32 Đen', 50, 'anh21.jpg', '160000', 'Pin sạc dự phòng eSaver LA A32 Đen có dung lượng 5.000 mAh, kích thước nhỏ gọn, thiết kế đẹp mắt.', 'Mới', 1, 'anh22.jpg', 'anh23.jpg'),
(36, 'Pin sạc dự phòng 7500mAh AVA LA CT23 Trắng', 50, 'pin31.jpg', '200000', 'Pin sạc dự phòng 7500mAh AVA LA CT23 trắng có thiết kế nhỏ gọn, cứng cáp dễ dàng mang đi.', 'Mới', 1, 'pin32.jpg', 'pin33.jpg'),
(37, 'Pin sạc dự phòng 10000mAh AVA DS421-WB Trắng', 50, 'pin41.jpg', '280000', 'Pin sạc dự phòng 10000mAh AVA DS421-WB trắng có thiết kế đẹp mắt, nhỏ gọn.', 'Mới', 1, 'pin42.jpg', 'pin43.jpg'),
(38, 'Pin sạc dự phòng 10000mAh AVA TS-D151', 50, 'pin51.jpg', '280000', 'Pin sạc dự phòng 10000mAh AVA TS-D151 có thiết kế đẹp mắt với 2 màu xanh và trắng.', 'Mới', 1, 'pin52.jpg', 'pin53.jpg'),
(39, 'Pin sạc dự phòng Polymer 10000mAh AVA PJ JP191', 50, 'pin61.jpg', '320000', 'Pin sạc dự phòng Polymer 10000mAh AVA PJ JP191 với kiểu dáng nhỏ gọn, cùng dung lượng lớn tiện lợi sử dụng sạc cho thiết bị mà không cần tới nguồn điện', 'Mới', 1, 'pin62.jpg', 'pin63.jpg'),
(40, 'Pin sạc dự phòng 7500mAh eSaver LJ JP133', 50, 'pin71.jpg', '320000', 'Pin sạc dự phòng eSaver LJ JP133 có ngoại hình khá dễ thương', 'Mới', 1, 'pin72.jpg', 'pin73.jpg'),
(41, 'Pin sạc dự phòng 10000mAh eSaver LA A35 Đen', 50, 'pin81.jpg', '400000', 'Pin sạc dự phòng eSaver LA A35 Đen là phiên bản dung lượng lớn hơn với thiết kế đen xước cá tính', 'Mới', 1, 'pin82.jpg', 'pin83.jpg'),
(42, 'Tai nghe nhét trong Kanen IP-218', 50, 'tai11.jpg', '97000', 'Sử dụng được cho điện thoại, máy tính bảng, laptop, máy nghe nhạc...', 'Mới', 2, 'tai12.jpg', 'tai13.jpg'),
(43, 'Tai nghe EP Awei Q19Hi', 50, 'tai21.jpg', '120000', 'Chất lượng âm thanh đầu ra tốt, không bị méo hay vỡ tiếng', 'Mới', 2, 'tai22.jpg', 'tai23.jpg'),
(44, 'Tai nghe chụp tai Kanen IP-350 Tím', 50, 'tai31.jpg', '120000', 'Tai nghe chụp tai Kanen mã IP-350 có màu sắc dễ thương, kiểu dáng nhỏ gọn, âm thanh phát ra hay và không bị đau tai khi đeo.', 'Mới', 2, 'tai32.jpg', 'tai33.jpg'),
(45, 'Tai nghe nhét trong Kanen S70', 50, 'tai41.jpg', '160000', 'Tai nghe dạng móc vào vành tai sành điệu. Phù hợp để đeo khi tập thể dục hay hoạt động mạnh.', 'Mới', 2, 'tai-42.jpg', 'tai43.jpg'),
(46, 'Tai nghe chụp tai Kanen IP-952', 50, 'tai51.jpg', '240000', 'Màu sắc nổi bật, bắt mắt. Lớp đệm tai dày và êm, giúp đeo tai thoải mái và hạn chế bị rách.', 'Mới', 2, 'tai52.jpg', 'tai53.jpg'),
(47, 'Tai nghe Chụp tai Sony MDR - ZX310AP', 50, 'tai61.jpg', '890000', 'Thiết kế dạng gập, gọn nhẹ để nghe nhạc mọi nơi. Màng loa phe-rít 30 mm cho âm thanh cân bằng, mạnh mẽ. Vành tai nghe có lớp đệm mang lại cảm giác thoải mái khi nghe.', 'Mới', 2, 'tai62.jpg', 'tai63.jpg'),
(48, 'Tai nghe Samsung Pro BN920C', 50, 'tai71.jpg', '950000', 'Đệm tai được thiết kế mềm mại, linh hoạt. Cung cấp hơn 9 giờ nghe nhạc, 9 giờ đàm thoại và 300 giờ cho thời gian chờ. Chất lượng âm thanh tuyệt hảo nhờ công nghệ giảm tiếng ồn NR và EC. Kết nối nam châm giữa hai đầu tai nghe của Level U sẽ giữ tai nghe khi không sử dụng. Dung lượng pin 200mAh (lõi pin Li-ion). Thời gian sạc trung bình khoảng 2 giờ.', 'Mới', 2, 'tai72.jpg', 'tai73.jpg'),
(49, 'Tai nghe Bluetooth Roman R551N Trắng', 50, 'tai81.jpg', '240000', 'Thiết kế màu trắng tinh tế, đường vân tạo điểm nhấn trên bề mặt. Có thể kết nối cùng 1 lúc 2 thiết bị. Công nghệ bluetooth 4.1 cho khoảng cách kết nối tốt lên đến 10 m.', 'Mới', 2, 'tai82.jpg', 'tai83.jpg'),
(50, 'Loa Bluetooth Selfie iCutes MB-M515 Gấu Xám', 50, 'loa11.jpg', '80000', 'Loa Bluetooth Selfie iCutes MB-M515 hình chú Gấu Koala Xám dễ thương, âm thanh phát ra rất to, nút ấn hỗ trợ chụp ảnh cho điện thoại.', 'Mới', 3, 'loa12.jpg', 'loa13.jpg'),
(51, 'Loa vi tính Fenda V320', 50, 'loa21.jpg', '200000', 'Loa vi tính Fenda V320 nhỏ gọn, có thể đặt ở bất cứ đâu', 'Mới', 3, 'loa22.jpg', 'loa23.jpg'),
(52, 'Loa Bluetooth iCutes MB-M818 Cún', 50, 'loa31.jpg', '240000', 'Loa Bluetooth iCutes MB-M818 có kiểu dáng rất dễ thương', 'Mới', 3, 'loa32.jpg', 'loa33.jpg'),
(53, 'Loa Bluetooth iCutes MB-M916 Cú Đen', 50, 'loa41.jpg', '320000', 'Loa Bluetooth iCutes MB-M916 Cú Đen nhỏ gọn, tiện lợi mang theo Kiểu dáng của loa gọn gàng, vỏ cao su hạn chế trầy xước khi bỏ vào ba lô mang đi', 'Mới', 3, 'loa42.jpg', 'loa43.jpg'),
(54, 'Loa Bluetooth Mifa BV150', 50, 'loa51.jpg', '240000', 'Loa Bluetooth Mifa BV150 có khả năng chống nước, chất lượng âm thanh ​tốt cùng màu sắc bắt mắt.', 'Mới', 3, 'loa52.jpg', 'loa53.jpg'),
(55, 'Loa Bluetooth Awei Y200', 50, 'loa61.jpg', '360000', 'oa Bluetooth Awei Y200 có nút ấn dạng cảm ứng, âm thanh phát ra lớn và trầm ấm, vang vọng trong không gian phòng lớn.', 'Mới', 3, 'loa62.jpg', 'loa63.jpg'),
(56, 'Loa Bluetooth Amethyst MD3', 50, 'loa71.jpg', '450000', 'Loa Bluetooth Amethyst MD3 có hình dáng khối rubic vuông lạ mắt, âm thanh phát ra lớn, có dây xách tiện mang theo khi đi dã ngoại.', 'Mới', 3, 'loa72.jpg', 'loa73.jpg'),
(57, 'Loa vi tính Fenda F203G - 2.1', 50, 'loa81.jpg', '440000', 'Thiết kế nhỏ gọn, vừa vặn khi đặt trên bàn vi tính hay phòng ngủ nhỏ. Có thể tự điều chỉnh chất lượng Bass theo ý muốn. Công suất 11W, loa cho âm thanh lớn và sống động. Chất liệu gỗ giúp cho âm thanh có độ vang vọng rất tốt.', 'Mới', 3, 'loa82.jpg', 'loa83.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhvien`
--

CREATE TABLE `thanhvien` (
  `TenDangNhap` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` text COLLATE utf8_unicode_ci NOT NULL,
  `HoTen` text COLLATE utf8_unicode_ci NOT NULL,
  `NgaySinh` date NOT NULL,
  `GioiTinh` text COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` text COLLATE utf8_unicode_ci NOT NULL,
  `DienThoai` text COLLATE utf8_unicode_ci NOT NULL,
  `Email` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thanhvien`
--

INSERT INTO `thanhvien` (`TenDangNhap`, `MatKhau`, `HoTen`, `NgaySinh`, `GioiTinh`, `DiaChi`, `DienThoai`, `Email`) VALUES
('dautuan', '123456', 'Đâu Mạnh Tuấn', '1998-05-03', 'M', 'HN', '0981234567', 'tuandm@gmail.com'),
('duc', '123456', 'Trần Văn Đức', '1998-06-18', 'M', 'Huế', '0911234567', 'duc@gmail.com'),
('hieu', '123456', 'Phan Trung Hiếu', '1998-01-01', 'M', 'HN', '0911234567', 'hieuad@gmail.com'),
('hoan', '123456', 'Tống Đình Hoàn', '1998-03-09', 'M', 'HN', '0981234567', 'hoan@gmail.com'),
('khoa', '123456', 'Lê Ngọc Khoa', '1998-06-24', 'M', 'HN', '0981234567', 'khoa@gmail.com'),
('tuan', '123456', 'Trương Ngọc Tuấn', '1998-05-16', 'M', 'HN', '0981234567', 'tuan@gmail.com');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`MaBinhLuan`),
  ADD KEY `TenDangNhap` (`TenDangNhap`),
  ADD KEY `MaSanPham` (`MaSanPham`);

--
-- Chỉ mục cho bảng `ct_dondat`
--
ALTER TABLE `ct_dondat`
  ADD PRIMARY KEY (`MaDonDat`,`MaSanPham`),
  ADD KEY `ctdondat_sanpham` (`MaSanPham`);

--
-- Chỉ mục cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`MaSanPham`,`TenDangNhap`),
  ADD KEY `danhgia_thanhvien` (`TenDangNhap`);

--
-- Chỉ mục cho bảng `dondat`
--
ALTER TABLE `dondat`
  ADD PRIMARY KEY (`MaDonDat`),
  ADD KEY `TenDangNhap` (`TenDangNhap`),
  ADD KEY `MaNhanVien` (`MaNhanVien`);

--
-- Chỉ mục cho bảng `loaisp`
--
ALTER TABLE `loaisp`
  ADD PRIMARY KEY (`MaLoaiSP`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNhanVien`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSanPham`),
  ADD KEY `MaLoaiSP` (`MaLoaiSP`);

--
-- Chỉ mục cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD PRIMARY KEY (`TenDangNhap`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `MaBinhLuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `dondat`
--
ALTER TABLE `dondat`
  MODIFY `MaDonDat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `loaisp`
--
ALTER TABLE `loaisp`
  MODIFY `MaLoaiSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MaNhanVien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_sanpham` FOREIGN KEY (`MaSanPham`) REFERENCES `sanpham` (`MaSanPham`),
  ADD CONSTRAINT `binhluan_thanhvien` FOREIGN KEY (`TenDangNhap`) REFERENCES `thanhvien` (`TenDangNhap`);

--
-- Các ràng buộc cho bảng `ct_dondat`
--
ALTER TABLE `ct_dondat`
  ADD CONSTRAINT `ctdondat_dondat` FOREIGN KEY (`MaDonDat`) REFERENCES `dondat` (`MaDonDat`),
  ADD CONSTRAINT `ctdondat_sanpham` FOREIGN KEY (`MaSanPham`) REFERENCES `sanpham` (`MaSanPham`);

--
-- Các ràng buộc cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `danhgia_sanpham` FOREIGN KEY (`MaSanPham`) REFERENCES `sanpham` (`MaSanPham`),
  ADD CONSTRAINT `danhgia_thanhvien` FOREIGN KEY (`TenDangNhap`) REFERENCES `thanhvien` (`TenDangNhap`);

--
-- Các ràng buộc cho bảng `dondat`
--
ALTER TABLE `dondat`
  ADD CONSTRAINT `dondat_nhanvien` FOREIGN KEY (`MaNhanVien`) REFERENCES `nhanvien` (`MaNhanVien`),
  ADD CONSTRAINT `dondat_thanhvien` FOREIGN KEY (`TenDangNhap`) REFERENCES `thanhvien` (`TenDangNhap`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_loaisp` FOREIGN KEY (`MaLoaiSP`) REFERENCES `loaisp` (`MaLoaiSP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
