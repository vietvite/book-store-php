-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th10 21, 2019 lúc 11:01 AM
-- Phiên bản máy phục vụ: 10.4.10-MariaDB
-- Phiên bản PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `book_trading`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `books`
--

CREATE TABLE `books` (
  `id` varchar(10) COLLATE utf8_vietnamese_ci NOT NULL,
  `bookname` varchar(80) COLLATE utf8_vietnamese_ci NOT NULL,
  `author` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `categoryId` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL,
  `description` text COLLATE utf8_vietnamese_ci NOT NULL,
  `price` int(11) NOT NULL,
  `coverPrice` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `imageUrl` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `books`
--

INSERT INTO `books` (`id`, `bookname`, `author`, `categoryId`, `description`, `price`, `coverPrice`, `quantity`, `imageUrl`, `created_at`, `updated_at`) VALUES
(' zyegbrffv', 'Bài giảng cuối cùng', 'Randy Pausch', 'vanhoc', '“Chúng ta không đổi được những quân bài đã chia, chỉ có thể đổi cách chơi những quân bài đó.” Randy Pausch\r\n\r\nThực tế, đã có nhiều giáo sư được mời thuyết trình “Bài giảng cuối cùng” trước khi chia tay giảng đường. Khi đó họ thường chia sẻ về những thất bại cũng như những tinh hoa rút tỉa từ cuộc đời và sự nghiệp của mỗi cá nhân. Trong khi nghe thuyết trình, cử tọa bao giờ cũng day dứt trước câu hỏi: Giả như đây là cơ hội cuối cùng thì ta có thể gửi gắm thông điệp gì đến mọi người? Nếu ngày mai phải ra đi thì ta muốn cái gì sẽ là di sản để lại cho đời?\r\n\r\nKhi Randy Pausch, Giáo sư Tin học giảng dạy tại Carnegie Mellon, được yêu cầu thuyết trình một bài giảng như vậy, ông hình dung đó sẽ là buổi thuyết trình cuối cùng, bởi ông vừa được chẩn đoán mắc bệnh ung thư giai đoạn cuối. Nhưng bài giảng của ông - “Chạm tay vào ước mơ tuổi thơ” - không phải là về cái chết mà là về quá trình vượt qua các chướng ngại, về việc lan tỏa cách thức hiện thực hóa ước mơ đến người khác và không bao giờ để hoài phí bất kỳ khoảnh khắc nào trong đời (bởi “Thời gian là tất cả những gì bạn có. Một ngày nào đó, bạn sẽ nhận ra bạn có ít hơn là bạn nghĩ”). Đó là triết lý mà Randy đúc kết từ cuộc sống.\r\n\r\nTrong quyển sách này, Randy Pausch đã kết hợp nhuần nhụy giữa óc hài hước, văn phong cuốn hút và sự uyên thâm, đĩnh đạc, giúp cho bài giảng của ông trở thành một hiện tượng lưu dấu ấn trong lòng các thế hệ độc giả. Đây chắc chắn sẽ là cuốn sách được chuyền tay nhau bởi nhiều thế hệ tương lai.\r\n\r\n', 81000, 109000, 100, 'images/books/baigiangcuoicung.jpg', '2019-11-21 10:20:18', '0000-00-00 00:00:00'),
('24tgsdgs', 'Kỹ năng đọc sách hiệu quả', 'Yuji Akaba', 'kynang', 'Mỗi cuốn sách hay là một cuộc đời, một kho kinh nghiệm, được viết không chỉ một lần mà còn được viết đi viết lại hàng trăm lần trong nhiều năm. Bạn có thể dễ dàng đọc xong một cuốn sách hay chỉ trong vài tiếng đồng hồ, nhưng để nắm bắt hết giá trị của nó có thể mất đến vài năm.\r\n\r\nViệc đọc sách hiệu quả, sẽ đưa đến cho bạn một kho tri thức khổng lồ, giúp bạn khám phá thế giới. Để tận dụng được điều đó, bạn cần có những kỹ năng đọc sách hiệu quả dưới đây:\r\n\r\nXác định mục tiêu đọc sách\r\nTăng khả năng tập trung\r\nCải thiện khả năng ghi nhớ\r\nTăng cường tư duy logic\r\nKích thích tư duy sáng tạo\r\nNâng cao kỹ năng giao tiếp\r\nCẩm nang “Kỹ năng đọc sách hiệu quả” cung cấp những giải pháp tốt nhất khi đưa ra những kỹ năng cực kỳ đơn giản giúp bạn nâng cao khả năng đọc và phân tích tài liệu, qua đó bạn không chỉ học được thêm nhiều kiến thức, mà còn làm chủ được chúng để làm giàu cho cuộc sống cá nhân.', 70000, 100000, 100, 'images/books/kynangdocsachhieuqua.png', '2019-11-21 10:05:53', '0000-00-00 00:00:00'),
('3qtfsdvsr', 'Tuổi trẻ hoang dại', 'Nguyễn Ngọc Thạch', 'kynang', 'Một cuốn sách đơn giản của Nguyễn Ngọc Thạch, đặt sự hữu dụng tính tích cực lên hàng đầu. Sách bao gồm nhiều bài viết ngắn, nói lên cách nhìn nhận và suy nghĩ về cuộc sống, gia đình, công việc, cũng như cơn trầm cảm và khủng hoảng nửa đời người của tác giả, một người vừa đi qua tuổi trẻ và vào giai đoạn thứ ba của cuộc đời.\r\n\r\nSách được chia làm ba phần, cấu trúc rõ rệt.\r\n\r\nPhần một, là các bài viết mang tính kỹ năng mềm cho các bạn học sinh, sinh viên và các bạn trẻ mới bắt đầu trên con đường đi làm. Nó là quá trình đúc kết từ thực tế của Thạch trong hơn mười năm đi làm, từ vị trí nhân viên phục vụ nhà hàng cho đến giám đốc một công ty.\r\n\r\nĐó là các bài viết về gởi email, viết CV nhìn cho hấp dẫn, những chia sẻ về kinh nghiệm đi phỏng vấn xin việc lần đầu, những vui buồn khi còn là sinh viên và nhận công việc phục vụ quán ăn cho đến những lưu ý khi bước chân vào môi trường công sở. Những kỹ năng mềm cần thiết cho sinh viên nhưng ít trường đại học nào dạy.\r\n\r\nPhần hai, là những suy nghĩ về mối quan hệ giữa người với người và con người với xã hội. Thạch nói lên suy nghĩ của mình về câu hỏi, “Nhiều tiền để làm gì?”, về cách dùng đồng tiền làm sao cho vui. Về chuyện con người ta cứ phải sống theo đánh giá tiêu chuẩn của người xung quanh, của ông hàng xóm mà chưa quen với việc tự hỏi bản thân mình có hạnh phúc thật sự hay không. Về mối quan hệ bạn bè, đi du lịch cùng nhau hay chỉ đơn giản là… cho mượn tiền rồi làm sao đòi lại?\r\n\r\nPhần cuối cùng, là giai đoạn khủng hoảng nửa đời người của Thạch, khi qua ba mươi, người ta dễ lạc lối và hỏi bản thân mình rằng sẽ phải làm gì tiếp theo, khó tìm kiếm niềm vui trong cuộc sống. Và khi đó, con người ta phải học cách sống đơn giản hơn để cân bằng chính cảm xúc của mình.\r\n\r\nĐây là cuốn sách cần thiết và hữu dụng cho mọi người, cả những người trẻ đang háo hức vào đời nhưng vẫn đầy hoang mang lẫn những người đã bắt đầu vào giai đoạn tam thập nhi lập, trăn trở về hai chữ “thành công”.\r\n\r\nVà, đây sẽ là món quà ý nghĩa để các bậc phụ huynh dành tặng cho đứa con chuẩn bị trưởng thành của mình như hành trang trong những tháng ngày tuổi trẻ.', 66000, 95000, 100, 'images/books/tuoitrehoangdai.png', '2019-11-21 10:10:07', '0000-00-00 00:00:00'),
('anwbve', 'Hành trình về phương Đông', 'Baird T. Spalding - Nguyên Phong', 'vanhoc', 'Hành Trình Về Phương Đông mở ra một chân trời mới về Đông Tây gặp nhau, để khoa học Minh triết hội ngộ, để Hiện đại Cổ xưa giao duyên, để Đất Trời là một. Thế giới, vì vậy đã trở nên hài hòa hơn, rộng mở, diệu kỳ hơn và, do đó, nhân văn hơn.\r\nHành Trình Về Phương Đông kể về những trải nghiệm của một đoàn khoa học gồm các chuyên gia hàng đầu của Hội Khoa Học Hoàng Gia Anh được cử sang Ấn Độ nghiên cứu về huyền học và những khả năng siêu nhiên của con người. Suốt hai năm trời rong ruổi khắp các đền chùa Ấn Độ, chúng kiến nhiều pháp luật, nhiều cảnh mê tín dị đoan, thậm chí lừa đảủa nhiều pháp sư, đạo sĩọ được tiếp xúc với những vị thế, họ được chứng kiến, trải nghiệm, hiểu biết sâu sắc về các khoa học cổ xưa và bí truyền của văn hóa Ấn Độ như Yoga, thiền định, thuật chiêm duyên, nghiệp báo, luật nhân quả, cõi sống và cõi chế\r\nĐúng lúc một cuộc đối thoại cởi mở và chân thành đang sắp diễn ra với các đạo sĩ bậc thầy, thì đoàn nhận được tối hậu thu từ chính quyền Anh Quốc là phải ngừng ngay việc nghiên cứu, tức khắc hồi hương và bị buộc phải im lặng, không được phát ngôn về bất cứ điều gì mà họ đã chứng nghiệm. Sau cùng ba nhà khoa học trong đoàn đã chấp nhậ\r\n', 64000, 88000, 100, 'images/books/hanhtrinhvephuongdong.jpg', '2019-11-21 10:20:18', '0000-00-00 00:00:00'),
('asdzxczxcx', 'Suối nguồn', 'Ayn Rand', 'vanhoc', 'Mô tả Suối nguồn', 200000, 265000, 1000, 'images/books/suoinguon.jpg', '2019-10-23 09:35:01', '0000-00-00 00:00:00'),
('asdzxxxxcx', 'Bá tước Monte Cristo', 'Alexander Dumas', 'vanhoc', 'Mô tả Bá tước Monte Cristo', 200000, 265000, 1000, 'images/books/batuocmontecristo.jpg', '2019-10-23 09:37:05', '0000-00-00 00:00:00'),
('dgmtyj', 'Tuổi Trẻ Đáng Giá Bao Nhiêu', 'Rosie Nguyễn', 'kynang', 'Mô tả sách', 59000, 80000, 100, 'images/books/tuoitredanggiabaonhieu.jpg', '2019-11-12 17:16:39', '0000-00-00 00:00:00'),
('ehrdgfv', 'Mắt biếc', 'Nguyễn Nhật Ánh', 'vanhoc', 'Mắt biếc là một tác phẩm được nhiều người bình chọn là hay nhất của nhà văn Nguyễn Nhật Ánh. Tác phẩm này cũng đã được dịch giả Kato Sakae dịch sang tiếng Nhật để giới thiệu với độc giả Nhật Bản. \r\n\r\n“Tôi gửi tình yêu cho mùa hè, nhưng mùa hè không giữ nổi. Mùa hè chỉ biết ra hoa, phượng đỏ sân trường và tiếng ve nỉ non trong lá. Mùa hè ngây ngô, giống như tôi vậy. Nó chẳng làm được những điều tôi ký thác. Nó để Hà Lan đốt tôi, đốt rụi. Trái tim tôi cháy thành tro, rơi vãi trên đường về.”\r\n\r\n… Bởi sự trong sáng của một tình cảm, bởi cái kết thúc buồn, rất buồn khi xuyên suốt câu chuyện vẫn là những điều vui, buồn lẫn lộn …  \r\n\r\n', 75000, 90000, 100, 'images/books/matbiec.jpg', '2019-11-21 10:15:09', '0000-00-00 00:00:00'),
('fhnsrthfb', 'Trên Đường Băng', 'Tony Buổi Sáng', 'kynang', 'Mô tả trên đường băng', 55000, 80000, 100, 'images/books/trenduongbang.jpg', '2019-11-12 17:09:12', '0000-00-00 00:00:00'),
('ngw4gth', 'Lối Sống Tối Giản Của Người Nhật', 'Sasaki Fumio', 'kynang', 'Mô tả sách', 66000, 95000, 100, 'images/books/loisongtoigiancuanguoinhat.jpg', '2019-11-12 17:05:45', '0000-00-00 00:00:00'),
('q2wfd', 'Nghệ Thuật Tinh Tế Của Việc \"Đếch\" Quan Tâm', 'Mark Manson', 'kynang', 'Mô tả của sách', 63000, 100000, 200, 'images/books/nghethuattinhtecuaviecdechquantam.jpg', '2019-11-12 17:05:45', '0000-00-00 00:00:00'),
('q3egbdv4r', 'Tôi tự học', 'Nguyễn Duy Cần', 'kynang', 'Sách “Tôi tự học” của tác giả Nguyễn Duy Cần đề cập đến khái niệm, mục đích của học vấn đối với con người đồng thời nêu lên một số phương pháp học tập đúng đắn và hiệu quả. Tác giả cho rằng giá trị của học vấn nằm ở sự lĩnh hội và mở mang tri thức của con người chứ không đơn thuần thể hiện trên bằng cấp. Trong xã hội ngày nay, không ít người quên đi ý nghĩa đích thực của học vấn, biến việc học của mình thành công cụ để kiếm tiền nhưng thực ra nó chỉ là phương tiện để  đưa con người đến thành công mà thôi. Bởi vì học không phải để lấy bằng mà học còn để “biết mình” và để “đối nhân xử thế”.\r\n\r\nCuốn sách này tuy đã được xuất bản từ rất lâu nhưng giá trị của sách vẫn còn nguyên vẹn. Những tư tưởng, chủ đề của sách vẫn phù hợp và có thể áp dụng trong đời sống hiện nay. Thiết nghĩ, cuốn sách này rất cần cho mọi đối tượng bạn đọc vì không có giới hạn nào cho việc truy tầm kiến thức, việc học là sự nghiệp lâu dài của mỗi con người. Đặc biệt, cuốn sách là một tài liệu quý để các bạn học sinh – sinh viên tham khảo, tổ chức lại việc học của mình một cách hợp lý và khoa học. Các bậc phụ huynh cũng cần tham khảo sách này để định hướng và tư vấn cho con em mình trong quá trình học tập.', 41000, 60000, 100, 'images/books/toituhoc.jpg', '2019-11-21 10:07:27', '0000-00-00 00:00:00'),
('sfjhg3er', 'Nhà giả kim', 'Paulo Coelho', 'vanhoc', 'Tất cả những trải nghiệm trong chuyến phiêu du theo đuổi vận mệnh của mình đã giúp Santiago thấu hiểu được ý nghĩa sâu xa nhất của hạnh phúc, hòa hợp với vũ trụ và con người.\r\n\r\nTiểu thuyết Nhà giả kim của Paulo Coelho như một câu chuyện cổ tích giản dị, nhân ái, giàu chất thơ, thấm đẫm những minh triết huyền bí của phương Đông. Trong lần xuất bản đầu tiên tại Brazil vào năm 1988, sách chỉ bán được 900 bản. Nhưng, với số phận đặc biệt của cuốn sách dành cho toàn nhân loại, vượt ra ngoài biên giới quốc gia, Nhà giả kim đã làm rung động hàng triệu tâm hồn, trở thành một trong những cuốn sách bán chạy nhất mọi thời đại, và có thể làm thay đổi cuộc đời người đọc.\r\n\r\n“Nhưng nhà luyện kim đan không quan tâm mấy đến những điều ấy. Ông đã từng thấy nhiều người đến rồi đi, trong khi ốc đảo và sa mạc vẫn là ốc đảo và sa mạc. Ông đã thấy vua chúa và kẻ ăn xin đi qua biển cát này, cái biển cát thường xuyên thay hình đổi dạng vì gió thổi nhưng vẫn mãi mãi là biển cát mà ông đã biết từ thuở nhỏ. Tuy vậy, tự đáy lòng mình, ông không thể không cảm thấy vui trước hạnh phúc của mỗi người lữ khách, sau bao ngày chỉ có cát vàng với trời xanh nay được thấy chà là xanh tươi hiện ra trước mắt. ‘Có thể Thượng đế tạo ra sa mạc chỉ để cho con người biết quý trọng cây chà là,’ ông nghĩ.”\r\n\r\n', 53000, 69000, 100, 'images/books/nhagiakim.jpg', '2019-11-21 10:15:09', '0000-00-00 00:00:00'),
('w3egnbrg', 'Chuyện Con Mèo Dạy Hải Âu Bay', 'Luis Sepulveda', 'vanhoc', 'Mo ta', 36000, 50000, 2000, 'images/books/chuyenconmeodayhaiaubay.jpg', '2019-11-12 17:01:53', '0000-00-00 00:00:00'),
('w4twgsrf', 'Cà Phê Cùng Tony', 'Tony Buổi Sáng', 'kynang', 'Mô tả cafe Tony', 60000, 90000, 100, 'images/books/cafetony.jpg', '2019-11-12 17:10:14', '0000-00-00 00:00:00'),
('wrs3ghb4', 'Pháo đài số', 'Dan Brown', 'trinhtham', 'Mô tả của Pháo đài số', 139000, 250000, 100, 'images/books/phaodaiso.jpg', '2019-11-12 16:47:36', '0000-00-00 00:00:00'),
('wrshfbxv4', 'Nguồn cội', 'Dan Brown', 'trinhtham', 'Nguồn Cội - Origin\r\n\r\nRobert Langdon, giáo sư biểu tượng và biểu tượng tôn giáo đến từ trường đại học Harvard, đã tới Bảo tàng Guggenheim Bilbao để tham dự một sự kiện quan trọng - công bố một phát hiện \"sẽ thay đổi bộ mặt khoa học mãi mãi\".\r\n\r\nEdmond Kirsch là một tỷ phú bốn mươi tuổi, một nhà tiên tri. Những phát minh kỹ thuật cao và những dự đoán táo bạo đã làm cho anh trở thành một nhân vật nổi tiếng toàn cầu. Kirsch - cũng chính là một trong những sinh viên đầu tiên của Langdon tại đại học Harvard cách đây hai thập kỷ - sẽ tiết lộ một bước đột phá đáng kinh ngạc...\r\n\r\nNó sẽ trả lời hai câu hỏi cơ bản về sự tồn tại của con người:\r\n\r\n\"Chúng ta đến từ đâu?\" và \"Chúng ta đang đi về đâu?\"\r\n\r\nKhi sự kiện bắt đầu, Langdon và vài trăm quan khách bị cuốn hút bởi một bài thuyết trình độc đáo mà chính Langdon cũng nhận thấy rằng sẽ gây ra nhiều tranh cãi hơn những gì ông tưởng tượng. Nhưng sự kiện này đột nhiên biến thành cuộc hỗn loạn, và khám phá quý giá của Kirsch đang dần biến mất vĩnh viễn. Trước nguy cơ phải đối mặt với một mối đe doạ sắp xảy ra, Langdon bị buộc phải bỏ trốn để thoát khỏi Bilbao cùng Ambra Vidal - Hoàng hậu tương lai của Tây Ban Nha để tìm ra mật khẩu bí ẩn sẽ mở ra bí mật của Kirsch.\r\n\r\nĐể chiến thắng những bí mật được giấu kín của lịch sử và tôn giáo cực đoan, Langdon và Ambra phải trốn tránh một thế lực với sức mạnh dường như xuất phát từ chính Hoàng gia Tây Ban Nha... và đang cố tìm cách để giữ Edmond Kirsch im lặng. Trên một hành trình được đánh dấu bởi các tác phẩm nghệ thuật hiện đại và các ký hiệu bí ẩn, Langdon và Vidal đã tìm ra những manh mối cuối cùng đưa họ đối mặt với khám phá gây sốc của Kirsch... và sự thật mà từ lâu chúng ta đã tìm kiếm.', 139000, 250000, 100, 'images/books/nguoncoi.jpg', '2019-11-12 16:45:07', '0000-00-00 00:00:00'),
('zxczxczxcz', 'Hai số phận', 'Jeffrey Archer', 'vanhoc', 'Mô tả sách Hai số phận', 85000, 90000, 2000, 'images/books/haisophan.jpg', '2019-10-23 09:32:49', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `categoryId` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL,
  `categoryName` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`categoryId`, `categoryName`) VALUES
('bestsale', 'Best sale'),
('kinhdoanh', 'Kinh doanh'),
('kynang', 'Kỹ năng'),
('marketing', 'Marketing'),
('quantri', 'Quản trị'),
('taichinh', 'Tài chính'),
('trinhtham', 'Trinh thám'),
('vanhoc', 'Văn học'),
('yhoc', 'Y học');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_categories` (`categoryId`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryId`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_categories` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`categoryId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
