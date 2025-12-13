-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 13, 2025 at 02:30 PM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `price` float NOT NULL,
  `status` text NOT NULL,
  `description` text,
  `author` text,
  `publisher` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `image`, `price`, `status`, `description`, `author`, `publisher`) VALUES
(1, 'Atomic Habits – Thói Quen Nguyên Tử', 'https://th.bing.com/th/id/OIP.pM7qAmywbJLMN53j42PPFwHaFj?w=254&h=190&c=7&r=0&o=7&dpr=1.3&pid=1.7&rm=3', 129000, '0', 'Atomic Habits - Thay Đổi Tí Hon Hiệu Quả Bất Ngờ (Tái Bản 2023)\r\n\r\n• Wall Street Journal Bestseller, USA Today Bestseller, Publisher’s Weekly Bestseller\r\n\r\n• Nằm trong Top 20 tựa sách thể loại non-fiction bán chạy và được tìm đọc nhiều nhất của Amazon suốt 40 tuần tính đến tháng 9/2019\r\n\r\nMột thay đổi tí hon có thể biến đổi cuộc đời bạn không?\r\n\r\nHẳn là khó đồng ý với điều đó. Nhưng nếu bạn thay đổi thêm một chút? Một chút nữa? Rồi thêm một chút nữa? Đến một lúc nào đó, bạn phải công nhận rằng cuộc sống của mình đã chuyển biến nhờ vào một thay đổi nhỏ…\r\n\r\nVà đó chính là sức mạnh của thói quen nguyên tử.\r\n\r\nTác giả:\r\n\r\nJames Clear là tác giả người Mỹ, nhiếp ảnh gia, nhà khởi nghiệp, và là người sáng tạo The Habits Academy.\r\n\r\nAnh nghiên cứu về những thói quen, việc đưa ra quyết định và sự cải tiến liên tục. Trang jamesclear.com có hàng triệu lượt truy cập mỗi tháng.\r\n\r\nBài viết của James Clear được đăng trên New York Times, Entrepreneur, Time… Anh cũng là diễn giả thường xuyên tại các công ty nằm trong bảng xếp hạng Fortune 500.', 'James Clear', 'Thế Giới'),
(2, 'One Piece Tập 108', 'https://cdn1.fahasa.com/media/catalog/product/o/n/one-piece_tap-108_bia-gap_mockup.jpg', 28000, '1', 'One Piece - Tập 108 - “Thà Chết Còn Hơn”\r\n\r\nNhóm của Luffy lên kế hoạch thoát khỏi đảo Tương lai, thế nhưng Hải quân đã cho chiến hạm bao vây khắp hòn đảo. Chỉ huy chiến dịch là Đô đốc Kizaru!! Đằng sau còn có Ngũ Lão tinh, báo hiệu một trận chiến với quy mô chưa từng thấy sắp sửa diễn ra…\r\n\r\nNhững chiến phiêu lưu trên đại dương xoay quanh “ONE PIECE” lại bắt đầu!!', 'Eiichiro Oda', 'Kim Đồng'),
(3, 'Tâm Lý Học Tội Phạm', 'https://th.bing.com/th/id/OIP.Wd3lL6MJqq3xDH7W-SBI_wHaHa?w=187&h=187&c=7&r=0&o=7&dpr=1.3&pid=1.7&rm=3', 135000, '1', 'TÂM LÝ HỌC TỘI PHẠM - PHÁC HỌA CHÂN DUNG KẺ PHẠM TỘI\r\n\r\nTội phạm, nhất là những vụ án mạng, luôn là một chủ đề thu hút sự quan tâm của công chúng, khơi gợi sự hiếu kỳ của bất cứ ai. Một khi đã bắt đầu theo dõi vụ án, hẳn bạn không thể không quan tâm tới kết cục, đặc biệt là cách thức và động cơ của kẻ sát nhân, từ những vụ án phạm vi hẹp cho đến những vụ án làm rúng động cả thế giới.\r\n\r\nLấy 36 vụ án CÓ THẬT kinh điển nhất trong hồ sơ tội phạm của FBI, “Tâm lý học tội phạm - phác họa chân dung kẻ phạm tội” mang đến cái nhìn toàn cảnh của các chuyên gia về chân dung tâm lý tội phạm. Trả lời cho câu hỏi: Làm thế nào phân tích được tâm lý và hành vi tội phạm, từ đó khôi phục sự thật thông qua các manh mối, từ hiện trường vụ án, thời gian, dấu tích,… để tìm ra kẻ sát nhân thực sự. \r\n\r\nĐằng sau máu và nước mắt là các câu chuyện rợn tóc gáy về tội ác, góc khuất xã hội và những màn đấu trí đầy gay cấn giữa điều tra viên và kẻ phạm tội. Trong số đó có những con quỷ ăn thịt người; những cô gái xinh đẹp nhưng xảo quyệt; và cả cách trả thù đầy man rợ của các nhà khoa học,… Một số đã sa vào lưới pháp luật ngay khi chúng vừa ra tay, nhưng cũng có những kẻ cứ vậy ngủ yên hơn hai mươi năm. \r\n\r\nBằng giọng văn sắc bén, “Tâm lý học tội phạm - phác họa chân dung kẻ phạm tội” hứa hẹn dẫn dắt người đọc đi qua các cung bậc cảm xúc từ tò mò, ngạc nhiên đến sợ hãi, hoang mang tận cùng. Chúng ta sẽ lần tìm về quá khứ để từng bước gỡ những nút thắt chưa được giải, khiến ta \"ngạt thở\" đọc tới tận trang cuối cùng. \r\n\r\nHy vọng cuốn sách sẽ giúp bạn có cái nhìn sâu sắc, rõ ràng hơn về bộ môn tâm lý học tội phạm và có thể rèn luyện thêm sự tư duy, nhạy bén.', 'Diệp Hồng Vũ', 'NXB Thanh Niên'),
(4, 'Cà Phê Cùng Tony', 'https://cdn1.fahasa.com/media/catalog/product/8/9/8934974182238_1.jpg', 179000, '1', 'Cà phê cùng Tony\r\n\r\nCó đôi khi vào những tháng năm bắt đầu vào đời, giữa vô vàn ngả rẽ và lời khuyên, khi rất nhiều dự định mà thiếu đôi phần định hướng, thì CẢM HỨNG là điều quan trọng để bạn trẻ bắt đầu bước chân đầu tiên trên con đường theo đuổi giấc mơ của mình.\r\n\r\nCà phê cùng Tony là tập hợp những bài viết của tác giả Tony Buổi Sáng. Đúng như tên gọi, mỗi bài nhẹ nhàng như một tách cà phê, mà bạn trẻ có thể nhận ra một chút gì của chính mình hay bạn bè mình trong đó: Từ chuyện lớn như định vị bản thân giữa bạn bè quốc tế, cho đến chuyện nhỏ như nên chú ý những phép tắc giao thông thông thường. Chúng tôi tin rằng những người trẻ tuổi luôn mang trong mình khát khao vươn lên và tấm lòng hướng thiện, và có nhiều cách để động viên họ biến điều đó thành hành động. Nếu như tập sách nhỏ này có thể khơi gợi trong lòng bạn đọc trẻ một cảm hứng tốt đẹp, như tách cà phê thơm vào đầu ngày nắng mới, thì đó là niềm vui lớn của NXB Trẻ và tác giả Tony Buổi Sáng.', 'Tony buổi sáng', 'Trẻ'),
(5, 'Attack On Titan Tập 32', 'https://cdn1.fahasa.com/media/catalog/product/n/x/nxbtre_full_06342025_023406.jpg', 45000, '1', 'Attack On Titan - Tập 32\r\n\r\nSau nhiều năm sống yên ổn sau những bức tường thành cao lừng lững, loài người đã bắt đầu cảm nhận được nguy cơ diệt vong đến từ một giống loài khổng lồ mang tên Titan. Dù muốn dù không, họ buộc phải đứng lên, và đã đứng lên một cách đầy quyết tâm, mạnh mẽ để chống lại những kẻ thù hùng mạnh nhất.\r\n\r\nThế rồi họ dần nhận ra bản chất thật sự của những kẻ thù khổng lồ kia...', 'Hajime Isayama', 'Trẻ'),
(6, 'Người Giàu Có Nhất Thành Babylon', 'https://cdn1.fahasa.com/media/flashmagazine/images/page_images/nguoi_giau_co_nhat_thanh_babylon/2024_01_20_12_47_45_1-390x510.jpg', 51000, '1', 'Người Giàu Có Nhất Thành Babylon\r\n\r\nThành cổ Babylon được biết đến là nơi khởi minh rực rỡ nhất thời cổ đại, nơi có những thành quách đồ sộ, dân cư đông đúc và các hoạt động giao thương diễn ra nhộn nhịp. Vậy, những người ở Babylon đã làm thế nào để trở thành thương gia, làm thế nào để trở thành người giàu nhất? Điều gì đã khiến họ có thể làm chủ vận mệnh và làm chủ tài chính khi chỉ là những nô lệ thấp kém?\r\n\r\nCuốn sách Người giàu có nhất thành Babylon sẽ mang đến cho độc giả những câu chuyện về bí mật của sự giàu có, được kể qua lời của những nô lệ, thương gia, thợ thuyền đến từ 4.000 năm trước.\r\n\r\nHọ sẽ tiết lộ cho bạn những nguyên tắc quan trọng để sở hữu tiền - vàng và tăng sinh lợi nhuận từ số vốn ban đầu. Nếu bạn đang tìm kiếm sự giàu có, hãy nhớ rằng, tiền không được phép đứng yên, nó phải tham gia vào dòng chảy thị trường, tạo ra lợi ích cho chủ sở hữu. Những phương pháp này sẽ khiến bạn phải bất ngờ vì nó không khó khăn, vô cùng đơn giản nhưng lại dễ dàng bị bỏ qua hoặc vô tình quên lãng đi mất tính căn bản của việc làm giàu.\r\n\r\nCuốn sách Người giàu có nhất thành Babylon được viết bởi George Samuel Clason - doanh nhân thành công với Clason Map và Clason Publishing. Clason Map là nơi cho ra đời bản đồ giao thông đầu tiên của Hoa Kỳ và Canada, sau đó phá sản trong cuộc Đại khủng hoảng. Năm 1926, George Samuel Clason bắt đầu xuất bản những câu chuyện của mình, chúng được các chủ doanh nghiệp và những ai muốn thành công trong việc làm giàu hào hứng đón nhận.', 'George Samuel Clason', 'Văn Học'),
(7, 'Thám Tử Lừng Danh Conan tập 1', 'https://cdn1.fahasa.com/media/catalog/product/i/m/image_182222_1.jpg', 28000, '1', 'Thám Tử Lừng Danh Conan - Tập 1\r\n\r\nKudo Shinichi là một cậu thám tử học sinh năng nổ với biệt tài suy luận có thể sánh ngang với Sherlock Holmes! Một ngày nọ, khi mải đuổi theo những kẻ khả nghi, cậu đã bị chúng cho uống một loại thuốc kì lạ khiến cho cơ thể bị teo nhỏ. Vậy là một thám tử tí hon xuất hiện với cái tên giả: Edogawa Conan!!\r\n\r\nGosho Aoyama\r\n\r\nXin chào, tôi là Aoyama đây!!\r\n\r\nTừ nhỏ tôi đã rất thích truyện trinh thám. Một khi vào hiệu sách, cứ thoáng thấy chữ “Holmes” hay tên một thám tử nổi tiếng nào đó là hai tay tự động vồ lấy. Vậy nên tôi đã cố vắt óc suy nghĩ để cho ra đời tác phẩm này. Liệu bạn có thể phá được vụ án trước Conan không nhỉ…', 'Gosho Aoyama', 'Kim Đồng'),
(8, 'Tâm Lý Học Toàn Thư', 'https://cdn1.fahasa.com/media/catalog/product/n/x/nxbtre_full_22502023_095056_1.jpg', 123000, '1', 'Tâm Lý Học Toàn Thư \r\n\r\nMột cô gái trẻ xăm mình và xỏ khoen là bình thường ở thời hiện tại, nhưng nếu cô gái sinh vào thời ông bà của cô, chắc hẳn, cô đã bị xem là bất thường hoặc mắc chứng rối loạn tâm lý nào đó. Bản thân chúng ta, đôi khi có những cảm xúc hay hành vi bột phát và cũng có lúc băn khoăn tự hỏi: “Liệu mình có đang bình thường?”. Thật ra, các câu hỏi “Thế nào là bất thường?”; “Rối loạn tâm thần là gì?”; “Yếu tố nào cấu thành bệnh tâm thần?” là những vấn đề liên tục phát triển trong các nghiên cứu về tâm lý học. Khoa học về các rối loạn tâm lý hay “tâm bệnh học” thường ám chỉ một lĩnh vực bất thường của tâm lý.\r\n\r\nNhững rối loạn tâm thần gây ra những mức độ buồn khổ khác nhau khiến cuộc sống của chúng ta bị ảnh hưởng. Nhiều trẻ em đang lớn lên với những khó khăn tâm lý ảnh hưởng đến hoạt động thường ngày và khả năng học tập. Nhưng đến mức độ nào thì trở thành bệnh và cần được trị liệu? Trị liệu tâm lý đã đủ hay còn cần đến trị liệu thể chất? Kể từ khởi đầu của thế kỷ 20, xã hội đã xem xét rối loạn tâm thần theo nhiều cách khác nhau: một căn bệnh về não, một sản phẩm của chấn thương từ sớm ở tuổi thơ, thậm chí là hệ quả của trải nghiệm học tập sai. Câu chuyện về rối loạn tâm thần trong xã hội hiện đại là một câu chuyện kể sống động về các nhà trị liệu và các nhà khoa học trong cuộc vật lộn với những vấn đề phức tạp, không có giải pháp dễ dàng nào.\r\n\r\nKể từ giữa thế kỷ 20, chúng ta đã có những tiến triển khổng lồ trong ứng phó với rối loạn tâm thần, nhưng những thách đố vẫn còn đó. Càng học được nhiều điều về rối loạn tâm thần và thích ứng nó với xã hội, ta sẽ càng nhận ra những giải pháp lý tưởng hiếm thấy. Tuy nhiên, xã hội vẫn có trách nhiệm phát hiện càng nhiều giải pháp càng tốt, và dùng kiến thức đó để ứng phó hiệu quả hơn với các rối loạn. Chỉ bằng cách am hiểu những khía cạnh khoa học và luật pháp của rối loạn tâm thần, chúng ta mới đưa ra được những quyết định tốt về những vấn đề phức tạp mà chúng ta sẽ luôn phải đối đầu.', 'Nhiều Tác Giả', 'Trẻ'),
(9, 'Tự Lực Văn Đoàn', 'https://cdn1.fahasa.com/media/catalog/product/i/m/image_228635.jpg', 178000, '1', 'Tác phẩm\r\n\r\nTự Lực văn đoàn với Vấn đề phụ nữ ở nước ta là một công trình khảo cứu được biên soạn công phu bởi nhóm chuyên gia thuộc Viện Văn học Việt Nam. Tác phẩm thuộc Tủ sách Phụ nữ tùng thư – Tủ sách Giới và Phát triển của Nhà xuất bản Phụ nữ VN, từ khi khởi lập đến nay vốn đã và đang được ghi nhận tích cực từ độc giả và giới chuyên môn.\r\n\r\nNhắc đến mối liên quan giữa Tự Lực văn đoàn với vấn đề nữ quyền, hẳn độc giả khó có thể không nhắc đến bộ tứ tiểu thuyết lừng danh Nửa chừng xuân (Khái Hưng), Đoạn tuyệt (Nhất Linh), Lạnh lùng (Nhất Linh), Thoát ly (Khái Hưng). Cho đến nay, bộ tứ này vẫn “đáng được xem là những tác phẩm tiêu biểu nhất, những tiếng nói mạnh mẽ và quyết liệt nhất, trong cuộc đấu tranh đòi các quyền phụ nữ và nữ quyền ở Việt Nam lúc bấy giờ. Những tác phẩm ấy đã vượt ra ngoài khuôn khổ của trang sách, của các thụ hưởng nghệ thuật, để tác động vào đời sống, động viên và cổ vũ những cô gái mới khẳng định giá trị cá nhân cá thể của mình, biết yêu quý trân trọng tuổi xuân, để “lạnh lùng” mà “đoạn tuyệt” và “thoát ly” chế độ và luân lý cũ, vốn chỉ bóp nghẹt tự do và giam hãm người phụ nữ vào trong không gian và sự chuyên chế của gia đình trưởng giả truyền thống.” (Đoàn Ánh Dương). Nhưng không chỉ có thế, Tự Lực văn đoàn còn góp những tiếng nói thiết thực hơn, với một phong cách hóm hỉnh không thể lẫn, vào phong trào nữ quyền đang dấy lên mạnh mẽ lúc bấy giờ.\r\n\r\nTập hợp và tuyển chọn từ các bài báo đăng trên tờ báo nổi tiếng của nhóm Tự Lực văn đoàn là Phong hóa và sau là Ngày nay, cuốn sách này gồm các bài viết chuyên về vấn đề phụ nữ. Khác với hình dung của nhiều người, hình thức nữ giới được đặc biệt chú trọng trong các đề xuất cách tân, là điểm đặc biệt thú vị của “nữ quyền kiểu Tự Lực”, mà điển hình là chuyên đề lừng danh về Y phục phụ nữ của họa sĩ Le mur Nguyễn Cát Tường, làm dấy lên cả “một cuộc cách mạng” mà lịch sử thời trang Việt Nam ghi nhận như một mốc son hiếm có. Bên cạnh việc hướng dẫn chải chuốt sửa soạn hình dong sao cho thanh lịch và hợp thời (một cách khó có thể chi tiết hơn), những bài viết bàn về công, ngôn, hạnh xuất hiện đều đặn và khá nhiệt thành trong việc kêu gọi các bà các cô thoát bỏ cái cổ hủ lạc hậu, đón chào tiếp thu cái mới, tân tiến. Điểm hấp dẫn không thể bỏ qua nữa là các bài viết thời sự, tường thuật các hoạt động diễn thuyết “nhời đàn bà”, một hoạt động nổi đình nổi đám thời đó, các sự kiện thời trang, lễ lạt... mà ở đó sức mạnh của phong trào giải phóng nữ giới thể hiện rõ rệt sắc nét hơn cả.', 'Đoàn Ánh Dương, Nguyễn Minh Huệ, Vũ Thị Thanh Loan, Đào Thị Hải Thanh', 'NXB Phụ Nữ Việt Nam'),
(10, 'Không Gia Đình', 'https://tse1.mm.bing.net/th/id/OIP.Bh9XhyafDnD9RMWcWctvTwHaHa?cb=ucfimg2&ucfimg=1&rs=1&pid=ImgDetMain&o=7&rm=3', 100000, '1', 'Thở xa lắm, giữa lòng nước Pháp thế kỷ XIX, có một câu chuyện...\r\n\r\nCâu chuyện về cậu bé bất hạnh Rémi lang bạt trên dặm trường thiên lý, dấn thân giữa tất cả những bần cùng đói khổ và những xa hoa lộng lẫy. Cậu thiếu niên nhỏ tuổi đã đi qua biết bao miền quê, thấy biết bao cảnh đời, mỗi bước chân đều in dấu ấn của những câu chuyện kỳ lạ, có lúc hoan hỉ mừng vui, có khi thê lương đau đớn nhưng luôn lấp lánh tình người. Cuộc hành trình của Rémi với đoàn xiếc khỉ, chó, với những người thợ mỏ, với cậu bé hát rong người Ý đưa người đọc trải nghiệm mọi cung bậc cảm xúc: thích thú, bất ngờ, hồi hộp, thương tâm, thậm chí cả tuyệt vọng và dạy cho ta - những người chưa, đang, hay đã trưởng thành - những bài học thấm thía về ý chí, nghị lực và lao động chân chính...\r\n\r\nBàn về Không gia đình không cần bất cứ lời bình luận hoa mỹ nào khác, chỉ gói gọn trong hai từ: Kinh điển!\r\n\r\n-----\r\n\r\nTÁC GIẢ\r\n\r\nHector Malot (1830 - 1907) là một nhà văn chuyên viết tiểu thuyết người Pháo, được bạn đọc khắp nơi yêu mến. Ông gây được tiếng vang lớn ngay từ tác phẩm đầu tay - Những người tính (Les Amants), và giữ được phong độ ổn định trong suốt sự nghiệp cầm bút với hơn bảy mươi tác phẩm. Đặc biệt các tiểu thuyết như Không gia đình (1878), Trong gia đình (1893), Romian Kalbris (1869) là người bạn đồng hành của nhiều thế hệ độc giả nhỏ tuổi.\r\n\r\nCác tác phẩm tiêu biểu:\r\n\r\n- Les Victimes d\'Amour (bộ 3 quyển)\r\n\r\n- Romain Kalbris (1869)\r\n\r\n- Không gia đình (Sans famille - 1878)\r\n\r\n- Baccara (1886)\r\n\r\n- Trong gia đình (En Famille - 1893)\r\n\r\n-----\r\n\r\nTRÍCH DẪN\r\n\r\n\"... Cảnh vắng lặng ấy khiến cho tôi đâm sợ. Sợ gì? Tôi không biết. Một nỗi sợ hãi mơ hồ lẫn với một nỗi buồn vô hạn làm cho nước mắt tôi chảy giàn giụa. Tôi cảm thấy hình như tôi sắp chết tại chỗ này...\"', 'Hector Malot', 'NXB Văn Học'),
(11, 'Súng Vi Trùng Và Thép', 'https://cdn1.fahasa.com/media/catalog/product/8/9/8935270703837.jpg', 288000, '1', '“Súng, vi trùng và thép: Định mệnh của các xã hội loài người” là cuốn sách khoa học phổ thông thứ hai và nổi tiếng nhất của Jared Diamond, được xuất bản lần đầu trên thế giới vào năm 1997. \r\n\r\nCuốn sách đã trở thành cuốn sách bán chạy nhất trên thế giới thời điểm đó, được dịch ra 33 thứ tiếng và nhận được nhiều giải thưởng, trong đó có một giải Pulitzer, một giải thưởng Sách Khoa học Aventis và giải thưởng Khoa học Phi Beta Kappa năm 1997. Một bộ phim tài liệu truyền hình nhiều tập dựa trên cuốn sách đã được Hiệp hội Địa lý Quốc gia sản xuất vào năm 2005.\r\n\r\nĐến nay, \"Súng, vi trùng và thép\" đã bán được hàng triệu bản và vẫn được xem là một công trình nền tảng về địa lý liên ngành, toàn diện và đột phá. \r\nYuval Harari đã lấy cảm hứng từ chính cuốn sách này của Jared Diamond để sáng tác ra một cuốn sách nổi tiếng không kém: “Sapiens: Lược sử về loài người”. Colin Renfrew – Thành viên Quốc hội Vương quốc Liên hiệp Anh và Bắc Ireland nhận xét: “Diamond đã viết nên một tác phẩm với tầm tri thức đặc biệt xuất sắc. Đây là một trong những công trình quan trọng nhất và đáng đọc nhất về loài người”.\r\n\r\nNhân dịp tác phẩm nhận được Giải A Sách Quốc gia 2021, chúng tôi tái bản bìa mới, chỉnh sửa một số lỗi và đặc biệt là có bổ sung thêm index. Các đường vân trên bìa biểu trưng cho dòng chảy thời gian, dòng chảy văn minh của nhân loại, đồng thời kết nối quá khứ với hiện tại.\r\n\r\nNội dung cuốn sách giải thích vì sao các nền văn minh Á – Âu (bao gồm cả Bắc Phi) lại tồn tại được, cũng như đã chinh phục các nền văn minh khác, cùng lúc ông bác bỏ các lý thuyết về sự thống trị của các nền văn minh Á –Âu dựa trên trí tuệ, đạo đức hay ưu thế di truyền. Jared Diamond lập luận rằng, sự khác biệt về quyền lực và công nghệ giữa các xã hội loài người có nguồn gốc từ sự khác biệt về môi trường, trong đó sự khác biệt này được khuếch đại không ngừng. Qua đó, ông giải thích tại sao Tây Âu, chứ không phải các nền văn minh khác trong thế giới Á – Âu như Trung Quốc, lại trở thành các thế lực thống trị.\r\n\r\nMục đích của cuốn sách này là cung cấp một lược sử về tất cả mọi người trong khoảng 13.000 năm trở lại đây. Câu hỏi đã khiến tôi viết ra cuốn sách này là: tại sao lịch sử đã diễn ra trên mỗi châu lục một khác? Nếu như câu hỏi này lập tức khiến bạn nhún vai cho rằng bạn sắp phải đọc một luận văn phân biệt chủng tộc thì, xin thưa, không phải vậy. Như bạn sẽ thấy, những lời đáp cho câu hỏi này tuyệt không bao hàm những sự khác biệt về chủng tộc. Cuốn sách này tập trung truy tìm những giải thích tối hậu và đẩy lùi chuỗi nhân quả lịch sử càng xa bao nhiêu càng tốt bấy nhiêu.\r\nTuy cuốn sách này nói cho cùng là về lịch sử và tiền sử, song chủ đề của nó không chỉ có giá trị hàn lâm mà còn có tầm quan trọng to lớn về thực tiễn và chính trị. Lịch sử những tương tác giữa các dân tộc khác nhau chính là cái đã định hình thế giới hiện đại thông qua sự chinh phục, bệnh truyền nhiễm và diệt chủng. Các xung đột đó tạo ra những ảnh hưởng lâu dài mà sau nhiều thế kỷ vẫn chưa thôi tác động, vẫn đang tích cực tiếp diễn ở một số khu vực nhiều vấn đề nhất của thế giới ngày nay.', 'Jared Diamond', 'Thế Giới'),
(12, 'Tranh Truyện Dân Gian Việt Nam - Tấm Cám', 'https://cdn1.fahasa.com/media/catalog/product/t/r/tranh-truyen-dan-gian-viet-nam_tam-cam_tb-2023.jpg', 16000, '1', 'Tranh Truyện Dân Gian Việt Nam: Tấm Cám\r\n\r\nCha mất sớm, Tấm bị mẹ kế và cô em Cám hành hạ đủ điều. Tủi phận nhưng Tấm chẳng biết phải làm sao. Ngày nọ, Bụt thương cô gái hiền thảo, đã tặng cho Tấm những món quà đặc biệt. Nhờ vậy, dẫu phải trải qua nhiều sóng gió, cuối cùng Tấm vẫn trở về, sống đầm ấm và hạnh phúc. Câu chuyện “Tấm Cám” gói ghém ước nguyện bao đời của dân ta, rằng cái thiện sẽ thắng cái ác, ở hiền sẽ gặp lành.\r\n\r\nNhững câu chuyện dân gian giúp các em giàu thêm mơ ước, biết sống đẹp và trân trọng truyền thống cha ông. Cùng tìm đọc hơn 100 cuốn Tranh truyện dân gian Việt Nam do NXB Kim Đồng ấn hành!', 'Mai Long, Hồng Hà', 'Kim Đồng'),
(13, 'Trí Khôn Của Ta Đây', 'https://cdn1.fahasa.com/media/catalog/product/t/r/tri-khon-cua-ta-day-b_a-1.jpg', 27000, '1', 'Truyện \"Trí khôn của ta đây\" là truyện cổ tích Việt Nam giải thích vì sao hổ có vằn, trâu mất răng, và con người làm chủ muôn loài nhờ trí thông minh vượt trội sức mạnh thể chất.', 'Phạm Văn Hưng, Minh Miu', 'Phụ Nữ Việt Nam'),
(14, 'Perman - Cậu Bé Siêu Nhân - Tập 1', 'https://cdn1.fahasa.com/media/catalog/product/p/e/perman-cau-be-sieu-nhan_tap-1_bia.jpg', 25000, '1', 'Perman - Cậu Bé Siêu Nhân - Tập 1\r\n\r\nThêm một xê-ri vô cùng được yêu thích từ tác giả Fujiko F Fujo - \"cha đẻ\" của Doraemon - sắp sửa lên kệ!! Suwa Mitsuo - một học sinh tiểu học bình thường bỗng được người ngoài hành tinh BIRDMAN ủy thác làm PERMAN số 1! Cùng các đồng đội là Số 2, Perko và Peryan, chuỗi ngày bận rộn làm người hùng bảo vệ chính nghĩa của nhóm bạn bắt đầu...!\r\n\r\n---\r\n\r\nNăm 1966, bộ truyện bắt đầu được đăng dài kì trên tạp chí “Shogaku Sannensei/Yonensei” số tháng 12; Năm 1967 chuyển sang đăng trên tạp chí Weekly Shonen Sunday số 2; Tháng 4 năm 1967, tập Anime đầu tiên được phát sóng trên TV (đài TBS); Năm 1970, bản tankobon đầu tiên với trọn bộ 4 tập được phát hành bởi Mushi Pro Shoji; Năm 1979, bản tankobon trọn bộ 7 tập được phát hành bởi Tentomushi Comics, Shogakukan; Tháng 3 năm 1983, phim hoạt hình ngắn “Perman: Birdman đã đến!!” được công chiếu; Năm 1983, truyện tiếp tục được đăng dài kì trên tạp chí CoroCoro Comic từ số tháng 4; Tháng 4 năm 1983, phần 2 của loạt phim Anime được chiếu trên TV (Đài TV Asahi); Năm 2003-2004, bộ phim lẻ “Pa-Pa-Pa the Movie: Perman” được công chiếu. Kể từ khi ra đời, bộ truyện đã trở thành một tác phẩm tiêu biểu của tác giả Fujiko F Fujio và được độc giả vô cùng yêu mến.', 'Fujiko F Fujio', 'Kim Đồng'),
(15, 'Naruto - Tập 1 - Uzumaki Naruto', 'https://cdn1.fahasa.com/media/catalog/product/n/a/naruto---tap-1---tb-2022_1.jpg', 285000, '1', 'Naruto - Tập 1: Uzumaki Naruto\r\n\r\nChuyện xảy ra ở làng Lá với nhân vật chính là Naruto, học sinh trường đào tạo Ninja, chuyên đi quấy rối khắp làng!!\r\n\r\nNaruto có một ước mơ to lớn là đạt được danh hiệu Hokage - Một vị trí dành cho Ninja ưu tú nhất - Và vượt qua các Ninja tiền nhiệm.\r\n\r\nTuy nhiên, bí mật về thân thế của Naruto là…!?', 'Masashi Kishimoto', 'Kim Đồng'),
(16, 'OVERLORD - Tập 5', 'https://cdn1.fahasa.com/media/catalog/product/l/o/lord-5-_manga_---b_a-1.jpg', 35000, '1', 'Sau khi xử lý nhanh gọn sào huyệt của bọn cướp, Shalltear cũng dễ dàng đánh bại gã Brain nhưng lại mất kiểm soát do Blood Frenzy bị kích hoạt. Khi nhận ra mình đã để sổng một con người, Shalltear chạm trán một nhóm bí ẩn có khả năng chiến đấu đáng gờm. Cô kịp tung đòn phản công nhưng lại trúng phép thao túng tinh thần.\r\n\r\nPhát hiện ra sự việc, Ainz quyết định đơn thương độc mã chiến đấu với Shalltear, mặc cho Albedo phản đối.\r\n\r\nShalltear vốn là niệm chú sư hệ tín ngưỡng mạnh áp đảo Undead nên có thể coi là khắc tinh của Ainz. Chưa kể Shalltear còn dùng tới cả át chủ bài mạnh nhất là Einherjar nên Ainz rơi vào tình thế ngàn cân treo sợi tóc.\r\n\r\nTập 5 này là màn lật ngược tình thế đầy bất ngờ của Ainz, tiếp theo là kế hoạch táo bạo nhằm củng cố sức mạnh cho Nazarick: tấn công làng của Lizardman (người thằn lằn).', 'Maruyama Kugane, Miyama Hugin, Oshio Satoshi', 'NXB Hồng Đức');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `order_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `total_amount` decimal(10,2) NOT NULL,
  `status` varchar(50) DEFAULT 'Pending',
  `recipient_name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `shipping_address` text NOT NULL,
  `payment_method` varchar(50) DEFAULT 'COD',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_date`, `total_amount`, `status`, `recipient_name`, `phone`, `shipping_address`, `payment_method`) VALUES
(2, 2, '2025-12-13 18:30:42', 63500.00, 'Pending', 'user1', 'Số điện thoại mặc đị', 'Địa chỉ mặc định của người dùng (nếu có)', 'COD'),
(3, 2, '2025-12-13 18:32:40', 53500.00, 'Pending', 'user1', '33333333333', 'ffffffff', 'COD'),
(4, 1, '2025-12-13 18:39:52', 86000.00, 'Pending', 'admin', '33', '22', 'COD');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `book_id` int NOT NULL,
  `quantity` int NOT NULL,
  `price_at_time` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `book_id` (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `book_id`, `quantity`, `price_at_time`) VALUES
(2, 2, 16, 1, 35000.00),
(3, 2, 15, 1, 28500.00),
(4, 3, 15, 1, 28500.00),
(5, 3, 14, 1, 25000.00),
(6, 4, 12, 1, 16000.00),
(7, 4, 16, 2, 35000.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '$2y$10$f1h1S2vg6VUz4SQQAnAkju9eHUhHFycW2ClKmJQk5.Yqw9NRIyZH2', 'admin'),
(2, 'user1', 'user123', 'user'),
(4, 'duy', '$2y$10$.52/oC.DkH.Fmb0casw0q.JW9K1VGHp7OkOFIr5WxgBCYu3rM7rOu', 'user');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
