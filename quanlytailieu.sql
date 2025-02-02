-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 27, 2024 lúc 05:03 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlytailieu`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baidang`
--

CREATE TABLE `baidang` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `baidang`
--

INSERT INTO `baidang` (`id`, `title`, `content`, `author`, `created_at`) VALUES
(1, 'Sách mới', 'Những cuốn sách thú vị 1234', 'Cô Hải 1', '2024-06-20 02:34:16'),
(2, 'Những cuốn sách tháng 06', 'Chí Phèo\r\nSố Đỏ', 'Cô Hải', '2024-06-20 03:29:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `docgia`
--

CREATE TABLE `docgia` (
  `madocgia` int(11) NOT NULL,
  `tendocgia` varchar(50) DEFAULT NULL,
  `diachi` varchar(30) DEFAULT NULL,
  `sodienthoai` varchar(10) DEFAULT NULL,
  `gmail` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `docgia`
--

INSERT INTO `docgia` (`madocgia`, `tendocgia`, `diachi`, `sodienthoai`, `gmail`) VALUES
(2, 'Phạm Thị Ánh Thu', 'Hải Phòng', '0938559955', 'thu@gmail'),
(4, 'Hồ Ngọc Hà', 'Quảng Ninh', '0938559966', 'ha@gmail.com'),
(5, 'Trần Quốc Đạt', 'Quảng Ninh', '0938559955', 'dat@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lienhe`
--

CREATE TABLE `lienhe` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lienhe`
--

INSERT INTO `lienhe` (`id`, `name`, `email`, `message`, `submitted_at`) VALUES
(5, 'PhamThiThuQuyen', 'tq09385599@gmail.com', '123', '2024-06-20 02:03:02'),
(6, 'PhamThiThuQuyen', 'tq09385599@gmail.com', '123', '2024-06-20 02:04:55'),
(7, 'PhamThiThuQuyen', 'tq09385599@gmail.com', '123', '2024-06-20 02:06:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhaxuatban`
--

CREATE TABLE `nhaxuatban` (
  `manhaxuatban` int(11) NOT NULL,
  `tennhaxuatban` varchar(30) NOT NULL,
  `namthanhlap` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhaxuatban`
--

INSERT INTO `nhaxuatban` (`manhaxuatban`, `tennhaxuatban`, `namthanhlap`) VALUES
(1, 'Kim Đồng', '1957'),
(2, 'Văn Học', '1957'),
(3, 'Giáo dục Việt Nam', '1957'),
(4, 'Giáo dục Việt Nam', '1957'),
(6, ' Nhà xuất bản Trẻ', '1981'),
(8, 'Nhà xuất bản Nhã Nam ', '2005');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sach`
--

CREATE TABLE `sach` (
  `masach` int(11) NOT NULL,
  `tensach` varchar(50) NOT NULL,
  `matacgia` int(11) NOT NULL,
  `matheloai` int(11) NOT NULL,
  `manhaxuatban` int(11) NOT NULL,
  `sotrang` int(11) NOT NULL,
  `trangthai` varchar(10) NOT NULL,
  `hinhanh` varchar(50) NOT NULL,
  `gioithieu` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sach`
--

INSERT INTO `sach` (`masach`, `tensach`, `matacgia`, `matheloai`, `manhaxuatban`, `sotrang`, `trangthai`, `hinhanh`, `gioithieu`) VALUES
(1, 'Lão Hạc', 1, 4, 1, 206, 'Còn', 'Lao-Hac.jpg', 'Lão Hạc là một truyện ngắn của nhà văn Nam Cao được viết năm 1943. Tác phẩm được đánh giá là một trong những truyện ngắn khá tiêu biểu của dòng văn học hiện thực, nội dung truyện đã phần nào phản ánh được hiện trạng xã hội Việt Nam trong giai đoạn trước Cách mạng tháng Tám.Lão Hạc, một người nông dân chất phác, hiền lành. Lão góa vợ và có một người con trai nhưng vì quá nghèo nên không thể lấy vợ cho người con trai của mình. Người con trai lão vì thế đã rời bỏ quê hương để đến đồn điền cao su làm ăn kiếm tiền. Lão luôn trăn trở, suy nghĩ về tương lai của đứa con. Lão sống bằng nghề làm vườn, mảnh vườn mà vợ lão đã mất bao công sức để mua về và để lại cho con trai lão. So với những người khác lúc đó, gia cảnh của lão khá đầy đủ, tuy nhiên do ốm yếu hơn hai tháng và cũng vì trận bão mà lão không có việc gì để làm. Lão đã rất dằn vặt bản thân mình khi mang một '),
(2, 'Điêu tàn', 37, 1, 1, 56, 'Còn', 'Tac-Pham-Dieu-Tan (1).jpg', 'Chế Lan Viên thì lại viết thêm rằng: “Làm thơ là làm sự phi thường. Thi sĩ không phải là Người. Nó là Người mơ, Người say, Người điên. Nó là Tiên, là Ma, là Quỷ, là Tinh, là Yêu. Nó thoát hiện tại. Nó xối trộn Dĩ vãng. Nó ôm trùm tương lai… Thế mà có người tự cho là hiểu được nó, rồi đem nó so sánh với Người, và chê nó là giả dối, không chân thật. Vâng, nó không chân thật, nó giả dối với Người. Với nó, cái gì nó nói đều có cả”. Đó chính là lý do để thơ Chế Lan Viên lại hấp dẫn độc giả đến thế, và cũng chính là lý do để nhiều người viết về thơ ông.'),
(3, 'Thơ Xuân Diệu', 36, 1, 2, 180, 'Còn', 'tho-xuan-dieu-pdf.jpg', 'Trong sự nghiệp sáng tác thơ văn của mình, Xuân Diệu được biết đến như là một nhà thơ lãng mạn trữ tình, “Nhà thơ mới nhất trong các nhà thơ mới” (Hoài Thanh), “Ông hoàng của thơ tình”. Xuân Diệu là thành viên của Tự Lực Văn Đoàn và cũng đã là một trong những chủ soái của phong trào “Thơ Mới”. Tác phẩm tiêu biểu của ông ở giai đoạn này: Thơ Thơ (1938), Gửi hương cho gió (1945), truyện ngắn Phấn thông vàng (1939), Trường ca (1945).  Xuân Diệu tham gia ban chấp hành, nhiều năm là ủy viên thường vụ Hội Nhà văn Việt Nam. Từ đó, Xuân Diệu trở thành một trong những nhà thơ hàng đầu ca ngợi Cách mạng, một “dòng thơ công dân”. Bút pháp của ông chuyển biến phong phú về giọng vẻ: có giọng trầm hùng, tráng ca, có giọng chính luận, giọng thơ tự sự trữ tình. Tiêu biểu là: Ngọn quốc kỳ (1945), Một khối hồng (1964), Thanh ca (1982), Tuyển tập Xuân Diệu (1983).  Mã hàng	8935095627370 Tên Nhà Cung Cấp	Huy Hoang Bookstore Tác giả	Xuân Diệu NXB	NXB Văn học Năm XB	2019 Trọng lượng (gr)	200 Kích Thước Bao '),
(4, 'Chí Phèo', 1, 1, 2, 208, 'Hết', 'Chi-Pheo.jpg', 'Chí Phèo phản ánh một hiện tượng xã hội ở nông thôn Việt Nam trước năm 1945, nông dân lao động lương thiện bị đẩy vào con đường tha hoá, lưu manh hoá. Anh Chí - nạn nhân điển hình cho số phận của những người nông dân lao động lương thiện khi chịu đựng sự tàn bạo của xã hội ngày ấy. Xã hội đó không chỉ tàn phá thể xác mà còn dằn vặt, cấu nghiến tâm hồn con người. Cuối cùng, những con người lương thiện ấy bị vùi dập đến mất cả nhân hình, nhân tính.  Chủ đề của tác phẩm là phê phán xã hội phong kiến xưa cũ lúc bấy giờ. Nhân vật trong truyện chính là con người, mà con người lại chính là nhân vật. Nhà văn Nam Cao cũng đã đề cao, khẳng định và trân trọng những phẩm chất tốt đẹp, cao quý của Chí Phèo, Thị Nở. Chí Phèo là một tác phẩm có giá trị hiện thực và giá trị nhân đạo sâu sắc, mới mẻ.'),
(5, 'Cho tôi xin một vé đi tuổi thơ', 10, 2, 6, 218, 'Còn', 'Cho-toi-mot-ve.png', 'Cho tôi xin một vé đi tuổi thơ là truyện ngắn của nhà văn Nguyễn Nhật Ánh. Tác phẩm là một trong những sáng tác thành công nhất của ông và nhận được Giải thưởng Văn học ASEAN của năm 2010.  Nguyễn Nhật Ánh viết ở mặt sau cuốn sách: \"Tôi viết cuốn sách này không dành cho trẻ em. Tôi viết cho những ai từng là trẻ em\". Trả lời phỏng vấn của báo Người lao động, ông nói \"đối tượng cảm thụ mà tôi muốn nhắm tới là người lớn\", với Cho tôi xin một vé đi tuổi thơ ông \"cho phép mình mở rộng biên độ đề tài và hình ảnh đến tối đa vì tôi viết về trẻ em nhưng là cho những ai từng là trẻ em đọc\".[1]'),
(6, 'Cái Dũng Của Thánh Nhân', 4, 1, 1, 168, 'Còn', 'Cai-dung-cua-thanh-nhan.jpg', 'Quan niệm cái “Dũng” của tác giả Thu Giang không phải là cái dũng cơ bắp, cái dũng sức mạnh hay cái dũng thấy chuyện bất bình giữa đường ra tay nghĩa hiệp. Cái dũng của thánh nhân đề cập ở đây là cái dũng về sự chiến thắng bản thân, chiến thắng sự nhỏ nhen ích kỷ để mong cầu một cái dũng thật sự mạnh mẽ xuất phát từ nội tâm, ái dũng siêu thoát khỏi những ràng buộc yếu hèn với thế giới vật chất. Cái dũng ở đây bàn đến cách ứng xử của con người trong xã hội và các phương pháp tu dưỡng để đạt đến một tinh thần điềm đạm, an nhiên trước mọi hoàn cảnh khó khăn sóng gió của cuộc đời.  Nội dung của nó không chỉ kể về những câu chuyện kể về sự dũng cảm của người xưa mà còn bàn phương pháp cụ thể để rèn luyện đến một tinh thần điềm đạm. Do đó, cuốn cẩm nang này cần được đem ứng dụng vào chính bản thân mỗi người và đời sống hàng ngày.  Giá sản phẩm trên Tiki đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khá');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tacgia`
--

CREATE TABLE `tacgia` (
  `matacgia` int(11) NOT NULL,
  `tentacgia` varchar(50) NOT NULL,
  `namsinh` year(4) DEFAULT NULL,
  `hinhanh` varchar(100) DEFAULT NULL,
  `ghichu` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tacgia`
--

INSERT INTO `tacgia` (`matacgia`, `tentacgia`, `namsinh`, `hinhanh`, `ghichu`) VALUES
(1, 'Nam Cao', '1917', 'Nha-van-Nam-Cao.png', 'Nam Cao là một nhà văn, nhà thơ, nhà báo và cũng là một chiến sĩ, liệt sỹ người Việt Nam. Ông là nhà văn hiện thực lớn, một nhà báo kháng chiến, một trong những nhà văn tiêu biểu nhất thế kỷ 20.'),
(2, 'Hồ Anh Thái', '1960', 'Tac-Gia-Ho-Anh-Thai.jpg', 'Hồ Anh Thái là một nhà văn đương đại của Việt Nam, ông được xem như một hiện tượng văn chương của thế hệ văn nhân thời hậu chiến sau 1975. Ông được bầu là chủ tịch Hội Nhà văn Hà Nội hai nhiệm kỳ'),
(4, 'Nguyễn Duy Cần', '1907', 'Tac-Gia-Nguyen_Duy_Can.jpg', 'Nguyễn Duy Cần (1907-1998), hiệu Thu Giang, là một học giả, nhà văn, nhà biên khảo và trước tác kỳ cựu vào bậc nhất Việt Nam giữa thế kỷ 20.Ông làm nghề viết sách, dạy học, lương y, nghiên cứu Đạo học, Kinh Dịch, với các biệt hiệu: Thu Giang, Hoàng Hạc, Bảo Quang Tử, Linh Chi… Ông sống cùng thời với các học giả và nhà văn như: Nguyễn Hiến Lê, Giản Chi, Hoàng Xuân Việt, Phạm Cao Tùng…Ông nổi bật không chỉ về số lượng tác phẩm đồ sộ mà còn ở độ sâu học thuật và sức ảnh hưởng về mặt tư tưởng đến các tầng lớp thanh niên trí thức của ông.'),
(6, 'Dale Carnegie', '0000', 'Tac-Gia-carnegie.jpg', 'Dale Breckenridge Carnegie (trước kia là Carnagey cho tới năm 1922 và có thể một thời gian muộn hơn) (24 tháng 11 năm 1888 – 1 tháng 11 năm 1955) là một nhà văn và nhà thuyết trình Mỹ và là người phát triển các lớp tự giáo dục, nghệ thuật bán hàng, huấn luyện đoàn thể, nói trước công chúng và các kỹ năng giao tiếp giữa mọi người. Ra đời trong cảnh nghèo đói tại một trang trại ở Missouri, ông là tác giả cuốn Đắc Nhân Tâm, được xuất bản lần đầu năm 1936, một cuốn sách hàng bán chạy nhất và được biết đến nhiều nhất cho đến tận ngày nay, nội dung nói về cách ứng xử, cư xử trong cuộc sống. Ông cũng viết một cuốn tiểu sử Abraham Lincoln, với tựa đề Lincoln con người chưa biết, và nhiều cuốn sách khác.'),
(8, 'Paulo Coelho', '1947', 'Tac-gia-pcbio.png', 'Paulo Coelho sinh tại Rio de Janeiro (Brasil). Ông học đại học trường luật, nhưng đã bỏ học năm 1970 để du lịch qua México, Peru, Bolivia và Chile, cũng như châu Âu và Bắc Phi. Hai năm sau, ông trở về Brasil và bắt đầu soạn lời nhạc pop. Ông cộng tác với những nhạc sĩ pop như Raul Seixas. Năm 1974, ông bị bắt giam một thời gian ngắn vì những hoạt động chống lại chế độ độc tài thời đó ở Brazil.Sách của ông đã bán ra hơn 86 triệu bản trên 150 nước và được dịch ra 56 thứ tiếng. Ông đã nhận được nhiều giải thưởng của nhiều nước, trong đó tác phẩm Veronika quyết chết (Veronika decide morrer) được đề cử cho Giải Văn chương Dublin IMPAC Quốc tế.'),
(10, 'Nguyễn Nhật Ánh', '1955', 'Tac-Gia-Nguyen-Nhat-Anh.jpg', 'Nguyễn Nhật Ánh (sinh ngày 7 tháng 5 năm 1955)[1] là một nam nhà văn người Việt Nam. Được xem là một trong những nhà văn hiện đại xuất sắc nhất Việt Nam hiện nay, ông được biết đến qua nhiều tác phẩm văn học về đề tài tuổi trẻ. Nhiều tác phẩm của ông được độc giả và giới chuyên môn đánh giá cao, đa số đều đã được chuyển thể thành phim.  Ông lần lượt viết về sân khấu, phụ trách mục tiểu phẩm, phụ trách trang thiếu nhi và hiện nay là bình luận viên thể thao trên báo Sài Gòn Giải phóng Chủ nhật với bút danh Chu Đình Ngạn. Ngoài ra, ông còn có những bút danh khác như Anh Bồ Câu, Lê Duy Cật, Đông Phương Sóc, Sóc Phương Đông.'),
(13, 'Harper Lee', '1926', 'Tac-gia-Lee.jpg', 'Nelle Harper Lee (28 tháng 4 năm 1926 – 19 tháng 2 năm 2016), thường được biết tới với tên Harper Lee, là một nữ nhà văn người Mỹ. Bà được biết tới nhiều nhất qua tiểu thuyết đầu tay Giết con chim nhại (To Kill a Mockingbird). Ngày 5 tháng 11 năm 2007, Harper Lee đã được tổng thống George W. Bush trao Huân chương Tự do Tổng thống Hoa Kỳ (Presidential Medal of Freedom), huân chương cao quý nhất dành cho công dân Hoa Kỳ, vì những đóng góp của bà cho văn học Mỹ.[1]  Vào tháng 2 năm 2015, luật sư của Lee xác nhận xuất bản cuốn tiểu thuyết thứ 2, Đặt người vọng canh (Go Set a Watchman). Được sáng tác vào giữa thập niên 1950, quyển sách phát hành vào tháng 7 năm 2015 như là phần tiếp theo của Giết con chim nhại.[2][3][4]'),
(17, 'Robert Kiyosaki', '1955', 'Tac-Gia-Robert-Kiyosaki.jpg', ''),
(31, 'Thạch Lam', '1910', 'Tac-Gia-Thach-Lam.jpg', ''),
(32, 'Vũ Trọng Phụng', '0000', 'Tac-Gia-Vu-Trong-Phung.jpg', ''),
(35, 'Ngô Tất Tố', '0000', '', ''),
(36, 'Xuân Diệu', '1916', 'Tac-Gia-Xuan-Dieu.jpg', 'Ngô Xuân Diệu (2 tháng 2 năm 1916 — 18 tháng 12 năm 1985), là nhà thơ, nhà báo, nhà văn viết truyện ngắn, nhà phê bình văn học và chính khách người Việt Nam. Ông là một trong những nhà thơ tiêu biểu trong phong trào Thơ mới đầu thế kỷ XX.  Được đánh giá là '),
(37, 'Chế Lan Viên', '1920', 'Tac-Gia-Che-Lan-Vien.jpg', 'Phan Ngọc Hoan, sinh ngày 20 tháng 10 năm 1920 (tức ngày 9 tháng 9 năm Canh Thân) tại xã Cam An, huyện Cam Lộ, tỉnh Quảng Trị.[1]  Ông lớn lên và theo học ở Quy Nhơn, đỗ bằng Thành chung (THCS hay cấp II hiện nay) thì thôi học, đi dạy tư kiếm sống. Có thể xem Quy Nhơn, Bình Định là quê hương thứ hai của Chế Lan Viên, nơi đã để lại những dấu ấn sâu sắc trong tâm hồn của thi sĩ tài ba.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `mataikhoan` int(11) NOT NULL,
  `madocgia` int(11) DEFAULT NULL,
  `tendangnhap` varchar(30) NOT NULL,
  `matkhau` varchar(30) NOT NULL,
  `thanphan` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`mataikhoan`, `madocgia`, `tendangnhap`, `matkhau`, `thanphan`) VALUES
(1, NULL, 'admin', '12345', 1),
(2, 4, 'ha2', '123456', 0),
(3, 5, 'dat', '123456', 0),
(4, 4, 'ha', '12345', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `matheloai` int(11) NOT NULL,
  `tentheloai` varchar(30) NOT NULL,
  `ghichutheloai` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`matheloai`, `tentheloai`, `ghichutheloai`) VALUES
(1, 'Văn học Việt Nam', 'Văn học dân gian là nền tảng của văn học viết, là chặng đầu của nền văn học dân tộc. Khi chưa có chữ viết, nền văn học Việt Nam chỉ có văn học dân gian; khi có chữ viết, nền văn học Việt Nam mới bao gồm hai bộ phận: văn học dân gian và văn học viết.'),
(2, 'Sách tâm lý, tình cảm', 'Sách tâm lý tình cảm thường là những cuốn truyện ngắn hay những cuốn tiểu thuyết dài kỳ. Trong các thể loại sách thì thể loại sách tâm lí tình cảm có lẽ là một trong những cuốn sách có doanh số cao nhất. Có lẽ bởi con người luôn tìm kiếm, mưu cầu về chuyện yêu thương và tình cảm vì vậy mà lựa chọn thể loại sách này.\r\n\r\nVà nội dung mà mọi người hay tìm kiếm nhất ở thể loại này là về những mối quan hệ tình cảm yêu đương, tình cảm giữa con cái và cha mẹ. Nhưng được kể dưới nhiều góc độ và hoàn cảnh khác nhau mà cho ra đời hàng vạn câu chuyện chưa bao giờ bị chung đụng.'),
(3, 'Sách tôn giáo', 'Sách tôn giáo là sách nói về tư tưởng tôn giáo, nguồn gốc ra đời. Đây nơi ghi chép các giáo lý, nguyên tắc và lời dạy bảo. Trong đó nêu rõ về những đạo lý và triết lý đạo đức, xã hội đến từ đâu. Và cách mà ta có thể sử dụng chúng, áp dụng chúng vào cuộc sống hàng ngày. Đôi khi nó còn là con đường để dẫn bạn đến lối suy nghĩ an lành và tích cực hơn. Sách tôn giáo thường hướng thiện, chỉ dẫn cho con người cách để hoà nhịp vào cuộc sống một cách nhẹ nhàng, an yên.'),
(4, 'Sách lịch sử', 'Để có được con người, đời sống, xã hội ngày nay thì cần phải có cả một quá trình. Vậy quá trình đã qua này được gọi là gì? Nó chính là lịch sử và để lịch sử không bị quên đi thì người ta phải ghi chép lại. Đây chính là nguồn gốc ra đời của sách lịch sử.\r\n\r\nSách lịch sử nói về những dấu mốc những sự kiện lịch sử đã qua. Nó vừa là bài học vừa là lời khuyên dạy để chúng ta học những cái tốt và lược bỏ đi những cái xấu không đi lại vào vết xe đổ.\r\n\r\nSách lịch sử có những dấu mốc thời gian và thời điểm cụ thể. Tại mỗi thời điểm lại có những con người, sự việc và sự kiện xảy ra khác nhau. Những cuốn sách này rất phù hợp cho những người yêu thích tìm hiểu lịch sử con người, văn hoá khắp nơi trên thế giới.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `truot`
--

CREATE TABLE `truot` (
  `id` int(11) NOT NULL,
  `tieude` varchar(100) NOT NULL,
  `anh` varchar(100) NOT NULL,
  `hoatdong` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `truot`
--

INSERT INTO `truot` (`id`, `tieude`, `anh`, `hoatdong`) VALUES
(1, 'Lợi ích đọc sách', 'slide1.png', 1),
(2, 'Những cuốn sách nên đọc', 'slide2.png', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baidang`
--
ALTER TABLE `baidang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `docgia`
--
ALTER TABLE `docgia`
  ADD PRIMARY KEY (`madocgia`);

--
-- Chỉ mục cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhaxuatban`
--
ALTER TABLE `nhaxuatban`
  ADD PRIMARY KEY (`manhaxuatban`);

--
-- Chỉ mục cho bảng `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`masach`),
  ADD KEY `matacgia` (`matacgia`,`matheloai`),
  ADD KEY `matheloai` (`matheloai`),
  ADD KEY `manhaxuatban` (`manhaxuatban`);

--
-- Chỉ mục cho bảng `tacgia`
--
ALTER TABLE `tacgia`
  ADD PRIMARY KEY (`matacgia`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`mataikhoan`),
  ADD KEY `madocgia` (`madocgia`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`matheloai`);

--
-- Chỉ mục cho bảng `truot`
--
ALTER TABLE `truot`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `baidang`
--
ALTER TABLE `baidang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `docgia`
--
ALTER TABLE `docgia`
  MODIFY `madocgia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `nhaxuatban`
--
ALTER TABLE `nhaxuatban`
  MODIFY `manhaxuatban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `sach`
--
ALTER TABLE `sach`
  MODIFY `masach` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tacgia`
--
ALTER TABLE `tacgia`
  MODIFY `matacgia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `mataikhoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `theloai`
--
ALTER TABLE `theloai`
  MODIFY `matheloai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `truot`
--
ALTER TABLE `truot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `sach`
--
ALTER TABLE `sach`
  ADD CONSTRAINT `sach_ibfk_1` FOREIGN KEY (`matacgia`) REFERENCES `tacgia` (`matacgia`),
  ADD CONSTRAINT `sach_ibfk_2` FOREIGN KEY (`matheloai`) REFERENCES `theloai` (`matheloai`),
  ADD CONSTRAINT `sach_ibfk_3` FOREIGN KEY (`manhaxuatban`) REFERENCES `nhaxuatban` (`manhaxuatban`);

--
-- Các ràng buộc cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `taikhoan_ibfk_1` FOREIGN KEY (`madocgia`) REFERENCES `docgia` (`madocgia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
