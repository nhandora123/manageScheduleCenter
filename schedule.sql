-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 28, 2020 lúc 08:17 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `schedule`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `class`
--

CREATE TABLE `class` (
  `idClass` char(25) NOT NULL,
  `nameClass` varchar(50) NOT NULL,
  `numberStudent` int(20) NOT NULL,
  `timeStartTeach` time NOT NULL,
  `timeEndTeach` time NOT NULL,
  `dateStart` date NOT NULL,
  `dateEnd` date NOT NULL,
  `address` varchar(25) NOT NULL,
  `emailTeacher` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `class`
--

INSERT INTO `class` (`idClass`, `nameClass`, `numberStudent`, `timeStartTeach`, `timeEndTeach`, `dateStart`, `dateEnd`, `address`, `emailTeacher`) VALUES
('HCM-C12-C-PA-79-BLTS-0001', 'cde', 5, '14:00:00', '13:39:52', '2020-06-24', '2020-07-22', 'Quận 3', 'nhan1'),
('HCM-C12-C-PA-79-BLTS-0002', 'abc', 3, '16:12:39', '25:12:39', '2020-06-23', '2020-07-21', 'Bình Thạnh', 'nhan1'),
('HCM-C7-C-PA-911-BLG-012', 'Bé làm game (9-11t)', 4, '01:13:00', '03:13:00', '2020-06-29', '2020-08-28', 'Tan Phu', 'nhan1'),
('HCM-C7-C-PA-911-BLG-0120', 'Thế giới công nghệ', 5, '15:12:00', '19:12:00', '2020-07-01', '2020-07-29', 'Tân Phú ', 'Như Ý'),
('HCM-C7-C-PA-911-BLG-014', 'Bé làm game (9-11t)', 3, '11:19:00', '03:19:00', '2020-06-30', '2020-08-05', 'Binh Tan', 'nhan4'),
('HCM-C7-C-PA-911-BLG-015', 'Bé làm game (9-11t)', 2, '01:24:00', '05:24:00', '2020-07-03', '2020-07-31', 'Tan Binh', 'nhan1'),
('HCM-C7-C-PA-911-BLG-016', 'Bé làm game (9-11t)', 4, '12:49:00', '21:49:00', '2020-07-04', '2020-08-08', 'Quận 9', 'nhan1'),
('HCM-C7-C-PA-911-BLG-017', 'Bé làm game (9-11t)', 4, '12:49:00', '21:49:00', '2020-07-05', '2020-09-06', 'Quận 9', 'nhan1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `class-subject`
--

CREATE TABLE `class-subject` (
  `idClass` char(25) NOT NULL,
  `idSubject` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `member`
--

CREATE TABLE `member` (
  `idClass` char(25) NOT NULL,
  `idStudent` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `schedule`
--

CREATE TABLE `schedule` (
  `idClass` varchar(25) NOT NULL,
  `checking` tinyint(1) NOT NULL,
  `dateTeach` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `schedule`
--

INSERT INTO `schedule` (`idClass`, `checking`, `dateTeach`) VALUES
('HCM-C12-C-PA-79-BLTS-0001', 1, '2020-07-08'),
('HCM-C12-C-PA-79-BLTS-0001', 1, '2020-07-09'),
('HCM-C12-C-PA-79-BLTS-0001', 1, '2020-07-14'),
('HCM-C12-C-PA-79-BLTS-0001', 2, '2020-07-15'),
('HCM-C12-C-PA-79-BLTS-0001', 1, '2020-07-19'),
('HCM-C12-C-PA-79-BLTS-0001', 2, '2020-07-22'),
('HCM-C12-C-PA-79-BLTS-0001', 1, '2020-07-29'),
('HCM-C12-C-PA-79-BLTS-0002', 1, '2020-07-07'),
('HCM-C12-C-PA-79-BLTS-0002', 2, '2020-07-14'),
('HCM-C12-C-PA-79-BLTS-0002', 1, '2020-07-21'),
('HCM-C12-C-PA-79-BLTS-0002', 1, '2020-07-23'),
('HCM-C12-C-PA-79-BLTS-0002', 1, '2020-07-24'),
('HCM-C7-C-PA-911-BLG-012', 1, '2020-07-20'),
('HCM-C7-C-PA-911-BLG-012', 1, '2020-07-27'),
('HCM-C7-C-PA-911-BLG-012', 1, '2020-08-03'),
('HCM-C7-C-PA-911-BLG-0120', 1, '2020-07-29'),
('HCM-C7-C-PA-911-BLG-014', 1, '2020-07-21'),
('HCM-C7-C-PA-911-BLG-015', 2, '2020-07-24'),
('HCM-C7-C-PA-911-BLG-016', 1, '2020-07-18'),
('HCM-C7-C-PA-911-BLG-016', 1, '2020-07-25'),
('HCM-C7-C-PA-911-BLG-017', 1, '2020-07-26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `student`
--

CREATE TABLE `student` (
  `idStudent` char(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `emailParent` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subject`
--

CREATE TABLE `subject` (
  `idSubject` char(25) NOT NULL,
  `nameSubject` varchar(50) NOT NULL,
  `level` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `email` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(25) NOT NULL,
  `phoneNumber` int(10) NOT NULL,
  `permission` varchar(10) NOT NULL,
  `image` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`email`, `password`, `fullname`, `phoneNumber`, `permission`, `image`) VALUES
('admin', '$2y$10$20ettEiuKGCcduHQTRpfruRmQx.zjRFFvipNSmXiLGdSufR6gYl86', 'Nam', 9090090, 'operator', 1),
('nhan1', '$2y$10$lHy43zJPZBBf7rptClpnreYIwc0P/ymHkgoD5kOtQjkOIyAhbZR2a', 'Nhân', 9090090, 'teacher', 1),
('nhan4', '$2y$10$KV3HYnKlhbHjybttZgJsQOb8lcNzJIFilw/VBobQxJZaWsjbmW2DS', 'Nam', 9090090, 'teacher', 0),
('nhan5', '$2y$10$HVLMV0Vl5px11.kQancbBeiH3rjghMwySJqFCPUvrc4mNJsgrZKnG', 'Nhan', 9090090, 'teacher', 1),
('nhan6', '$2y$10$2OeJesa8uufVp9LnjwPOK.BBIiXJDvy3lbapuxCjz1yTq88IWwp4i', 'Nam', 9090090, 'teacher', 1),
('Như Ý', '$2y$10$gWPYcXjR3aM59sn1U.EHE.uKZHdW3hbB8QeBCQhTC0PdAftW1hZcG', 'Như Ý', 9090090, 'teacher', 1),
('NhuY', '$2y$10$/sL7OqUZYhMN4Lb3hJ9JcuqFnDKi2.Shpzy6CdUFXwUZ6SA6OpRXq', 'Ruyi', 9090090, 'teacher', 0),
('Ykhung', '$2y$10$YT9gCl4KDCCF5aJt12QHl.rINdbKaOYXyor5kRMalWyAsclqqT4sW', 'YNhu', 9090090, 'teacher', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`idClass`),
  ADD KEY `FK_Class_Teacher` (`emailTeacher`);

--
-- Chỉ mục cho bảng `class-subject`
--
ALTER TABLE `class-subject`
  ADD PRIMARY KEY (`idClass`,`idSubject`),
  ADD KEY `PK_CLASS-SUBJECT_SUBJECT` (`idSubject`);

--
-- Chỉ mục cho bảng `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`idClass`,`idStudent`),
  ADD KEY `PK_MEMBER_STUDENT` (`idStudent`);

--
-- Chỉ mục cho bảng `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`idClass`,`dateTeach`) USING BTREE;

--
-- Chỉ mục cho bảng `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`idStudent`);

--
-- Chỉ mục cho bảng `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`idSubject`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `FK_Class_Teacher` FOREIGN KEY (`emailTeacher`) REFERENCES `user` (`email`);

--
-- Các ràng buộc cho bảng `class-subject`
--
ALTER TABLE `class-subject`
  ADD CONSTRAINT `PK_CLASS-SUBJECT_CLASS` FOREIGN KEY (`idClass`) REFERENCES `class` (`idClass`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PK_CLASS-SUBJECT_SUBJECT` FOREIGN KEY (`idSubject`) REFERENCES `subject` (`idSubject`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `PK_MEMBER_CLASS` FOREIGN KEY (`idClass`) REFERENCES `class` (`idClass`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PK_MEMBER_STUDENT` FOREIGN KEY (`idStudent`) REFERENCES `student` (`idStudent`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `FK_SCHEDULE_CLASS` FOREIGN KEY (`idClass`) REFERENCES `class` (`idClass`),
  ADD CONSTRAINT `fk_schedule` FOREIGN KEY (`idClass`) REFERENCES `class` (`idClass`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
