-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 29, 2021 lúc 04:49 AM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ooad`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `MaHoaDon` int(1) NOT NULL,
  `MaSanPham` int(1) NOT NULL,
  `SoLuong` int(1) NOT NULL,
  `DonGia` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`MaHoaDon`, `MaSanPham`, `SoLuong`, `DonGia`) VALUES
(1, 1, 1, 300000),
(1, 2, 1, 350000),
(2, 3, 1, 350000),
(2, 4, 1, 300000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietphieunhap`
--

CREATE TABLE `chitietphieunhap` (
  `MaPhieuNhap` int(1) NOT NULL,
  `MaSanPham` int(1) NOT NULL,
  `SoLuong` int(1) NOT NULL,
  `DonGia` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietphieunhap`
--

INSERT INTO `chitietphieunhap` (`MaPhieuNhap`, `MaSanPham`, `SoLuong`, `DonGia`) VALUES
(1, 1, 2, 200000),
(1, 2, 3, 300000),
(2, 3, 4, 300000),
(2, 4, 3, 200000),
(3, 5, 3, 300000),
(3, 6, 5, 300000),
(4, 7, 5, 200000),
(4, 8, 3, 300000),
(5, 9, 5, 400000),
(5, 10, 4, 300000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHoaDon` int(1) NOT NULL,
  `MaNhanVien` int(1) NOT NULL,
  `MaPhieuGiam` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TongTien` int(5) NOT NULL,
  `NgayLap` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`MaHoaDon`, `MaNhanVien`, `MaPhieuGiam`, `TongTien`, `NgayLap`) VALUES
(1, 2, 'NEWYEAR', 3250000, '2021-12-29'),
(2, 4, NULL, 650000, '2021-12-15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNhanVien` int(1) NOT NULL,
  `TenDangNhap` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `HoTen` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SoDienThoai` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ChucVu` int(1) NOT NULL,
  `TrangThai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MaNhanVien`, `TenDangNhap`, `HoTen`, `DiaChi`, `SoDienThoai`, `Email`, `MatKhau`, `ChucVu`, `TrangThai`) VALUES
(1, 'huynhloc', 'Trương Huỳnh Lộc', '13 Liên khu 10-11, P. Bình Trị Đông, Q. Bình Tân', '0937336222', 'huynhloctruong@gmail.com', '123', 1, 1),
(2, 'uyennhi', 'Nguyễn Thị Uyển Nhi', '15 Liên khu 10-11, P. Bình Trị Đông, Q. Bình Tân', '0933444589', 'nguyenthiuyennhi@gmail.com', '123', 0, 1),
(3, 'phuongnguyen', 'Nguyễn Thị Phượng', '14 Liên khu 10-11, P. Bình Trị Đông, Q. Bình Tân', '0956788954', 'nguyenthiphuong@gmail.com', '123', 0, 1),
(4, 'minhnhat', 'Trần Minh Nhật', '16 Liên khu 10-11, P. Bình Trị Đông, Q. Bình Tân', '0988456369', 'tranminhnhat@gmail.com', '123', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieugiamgia`
--

CREATE TABLE `phieugiamgia` (
  `MaPhieuGiam` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `PhanTram` float NOT NULL,
  `NgayBatDau` date NOT NULL,
  `NgayKetThuc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phieugiamgia`
--

INSERT INTO `phieugiamgia` (`MaPhieuGiam`, `PhanTram`, `NgayBatDau`, `NgayKetThuc`) VALUES
('NEWYEAR', 0.5, '2021-12-29', '2022-01-17'),
('NOEL', 0.4, '2021-12-01', '2021-12-25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieunhap`
--

CREATE TABLE `phieunhap` (
  `MaPhieuNhap` int(1) NOT NULL,
  `MaNhanVien` int(1) NOT NULL,
  `MaThuongHieu` int(1) NOT NULL,
  `TongTien` int(5) NOT NULL,
  `NgayNhap` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phieunhap`
--

INSERT INTO `phieunhap` (`MaPhieuNhap`, `MaNhanVien`, `MaThuongHieu`, `TongTien`, `NgayNhap`) VALUES
(1, 2, 1, 1300000, '2021-12-01'),
(2, 3, 2, 1800000, '2021-11-05'),
(3, 4, 3, 2400000, '2021-12-17'),
(4, 1, 4, 1900000, '2021-12-29'),
(5, 1, 5, 3200000, '2021-12-29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSanPham` int(1) NOT NULL,
  `TenSanPham` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MaThuongHieu` int(1) NOT NULL,
  `SoLuong` int(1) NOT NULL,
  `DonGia` int(1) NOT NULL,
  `HinhAnh` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaSanPham`, `TenSanPham`, `MaThuongHieu`, `SoLuong`, `DonGia`, `HinhAnh`) VALUES
(1, 'Tee HappyAniversary Yellow', 1, 10, 300000, 'aniversary01.jpg'),
(2, 'Aniversary Big Logo', 1, 9, 350000, 'aniversary02.jpg'),
(3, 'HappyAniversary Special Fire', 2, 10, 350000, 'aniversary03.jpg'),
(4, 'HappyAniversary Church', 2, 10, 300000, 'aniversary04.jpg'),
(5, 'BIG-LOGO-LVENTS', 3, 10, 400000, 'BIG-LOGO-LVENTS.jpg'),
(6, 'GUN GUN KIMI', 3, 10, 350000, 'product-tops04-e.jpg'),
(7, 'HOLLIDAY SUMMER', 4, 10, 300000, 'Holiday_Summer.jpg'),
(8, 'HOLLIDAY FUNNY', 4, 10, 350000, 'Holiday_Summer-Fun.jpg'),
(9, 'ANGLES-RAINBOW', 5, 10, 450000, 'Hoodies-Angles.jpg'),
(10, 'Hoodie-Orange', 5, 10, 350000, 'Hoodie-Orange.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuonghieu`
--

CREATE TABLE `thuonghieu` (
  `MaThuongHieu` int(1) NOT NULL,
  `TenThuongHieu` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thuonghieu`
--

INSERT INTO `thuonghieu` (`MaThuongHieu`, `TenThuongHieu`) VALUES
(1, 'Hades'),
(2, 'Now'),
(3, 'SGS'),
(4, 'Hugu'),
(5, 'Davies');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`MaHoaDon`,`MaSanPham`),
  ADD KEY `FK_MaSanPham_ChiTietHoaDon` (`MaSanPham`);

--
-- Chỉ mục cho bảng `chitietphieunhap`
--
ALTER TABLE `chitietphieunhap`
  ADD PRIMARY KEY (`MaPhieuNhap`,`MaSanPham`),
  ADD KEY `FK_MaSanPham_ChiTietPhieuNhap` (`MaSanPham`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MaHoaDon`),
  ADD KEY `FK_MaNhanVien_HoaDon` (`MaNhanVien`),
  ADD KEY `FK_MaPhieuGiam_HoaDon` (`MaPhieuGiam`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNhanVien`,`TenDangNhap`);

--
-- Chỉ mục cho bảng `phieugiamgia`
--
ALTER TABLE `phieugiamgia`
  ADD PRIMARY KEY (`MaPhieuGiam`);

--
-- Chỉ mục cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`MaPhieuNhap`),
  ADD KEY `FK_MaNhanVien_PhieuNhap` (`MaNhanVien`),
  ADD KEY `FK_MaThuongHieu_PhieuNhap` (`MaThuongHieu`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSanPham`),
  ADD KEY `FK_MaThuongHieu_SanPham` (`MaThuongHieu`);

--
-- Chỉ mục cho bảng `thuonghieu`
--
ALTER TABLE `thuonghieu`
  ADD PRIMARY KEY (`MaThuongHieu`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MaHoaDon` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MaNhanVien` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  MODIFY `MaPhieuNhap` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSanPham` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `thuonghieu`
--
ALTER TABLE `thuonghieu`
  MODIFY `MaThuongHieu` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `FK_MaHoaDon_ChiTietHoaDon` FOREIGN KEY (`MaHoaDon`) REFERENCES `hoadon` (`MaHoaDon`),
  ADD CONSTRAINT `FK_MaSanPham_ChiTietHoaDon` FOREIGN KEY (`MaSanPham`) REFERENCES `sanpham` (`MaSanPham`);

--
-- Các ràng buộc cho bảng `chitietphieunhap`
--
ALTER TABLE `chitietphieunhap`
  ADD CONSTRAINT `FK_MaPhieuNhap_ChiTietPhieuNhap` FOREIGN KEY (`MaPhieuNhap`) REFERENCES `phieunhap` (`MaPhieuNhap`),
  ADD CONSTRAINT `FK_MaSanPham_ChiTietPhieuNhap` FOREIGN KEY (`MaSanPham`) REFERENCES `sanpham` (`MaSanPham`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `FK_MaNhanVien_HoaDon` FOREIGN KEY (`MaNhanVien`) REFERENCES `nhanvien` (`MaNhanVien`),
  ADD CONSTRAINT `FK_MaPhieuGiam_HoaDon` FOREIGN KEY (`MaPhieuGiam`) REFERENCES `phieugiamgia` (`MaPhieuGiam`);

--
-- Các ràng buộc cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD CONSTRAINT `FK_MaNhanVien_PhieuNhap` FOREIGN KEY (`MaNhanVien`) REFERENCES `nhanvien` (`MaNhanVien`),
  ADD CONSTRAINT `FK_MaThuongHieu_PhieuNhap` FOREIGN KEY (`MaThuongHieu`) REFERENCES `thuonghieu` (`MaThuongHieu`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `FK_MaThuongHieu_SanPham` FOREIGN KEY (`MaThuongHieu`) REFERENCES `thuonghieu` (`MaThuongHieu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
