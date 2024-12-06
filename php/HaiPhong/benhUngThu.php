<?php
    session_start();
    error_reporting(0);
    include ("../myclass/clslogin.php");
    $c = new login();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Bệnh Ung Thư </title>

    <link rel="stylesheet" href="../../css/tintuc.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

  
</head>

<body>
    <div class="container">
        <!-- Header -->
        <header>
            <div class="header">
                <div class="logo">MED<span class="highlight">DICAL</span></div>
                <div class="contact-info">
                    <div class="info">
                        <span class="icon">📞</span> HOTLINE <p>(237) 681-812-255</p>
                    </div>
                    <div class="info">
                        <span class="icon">⏰</span> GIỜ LÀM VIỆC <p>09:00 - 20:00 Everyday</p>
                    </div>
                    <div class="info">
                        <span class="icon">📍</span> ĐỊA CHỈ <p>0123 Some Place</p>
                    </div>
                    <div class="user">
                        <span class="icon-user">👤</span>
                        <?php
                            if(isset($_SESSION['ten'])){
                                $ten = $_SESSION['ten'];
                                echo '<span style="margin-right: 10px;">' . $ten . '</span>';
                                echo '<a href="../logout/index.php" class="user-link">Đăng xuất</a>';
                            } else {
                                echo '<a href="../login/index.php" class="user-link">Đăng nhập</a> / ';
                                echo '<a href="../register/register.php" class="user-link">Đăng ký</a>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </header>
        
        <!-- Navbar -->
        <nav>
            <div class="navbar">
                <a href="index.php">Trang chủ</a>
                <a href="#">Chuyên gia</a>
                <a href="#">Dịch vụ</a>
                <a href="#">Thành tựu</a>
                <div class="dropdown" id="toggle-news">
                    <a href="#">Tin tức</a>
                    <ul class="dropdown-menu" id="news-menu">
                        <li><a href="#">Tạp chí</a></li>
                        <li><a href="#">Hội nghị - Hội thảo</a></li>
                        <li><a href="#"> Đào tạo </a></li>
                    </ul>
                </div>
                <a href="#">Liên lạc</a>

                <?php
                    if (isset($_SESSION['vaiTro'])) {
                        switch ($_SESSION['vaiTro']) {
                            case 'Bệnh nhân':
                                echo '<a href="danhChoBenhNhan.php">Dành cho bệnh nhân</a>';
                                break;
                            case 'Bác sĩ':
                                echo '<a href="danhChoBacSi.php">Dành cho bác sĩ</a>';
                                break;
                            case 'Quản lý':
                                echo '<a href="danhChoQuanLy.php">Dành cho Quản lý</a>';
                                break;
                        }
                    }
                ?>
                
                <div class="search-booking">
                    <span class="icon">🔍</span>
                    <button type="button">Đặt lịch</button>
                </div>
            </div>
        </nav>

        <ul>
    <li>
    
        <!-- Bài viết bệnh tiểu đường -->
      
        <div class="t-news-container">
    <!-- Thanh bên trái -->
    <aside class="t-left-sidebar">
    <ul>
        <li><i class="fas fa-list"></i> <a href="tinTucBenhHoc.php">Tất cả</a></li>
        <li><i class="fas fa-heartbeat"></i> <a href="benhTim.php">Bệnh Tim Mạch</a></li>
        <li><i class="fas fa-stethoscope"></i> <a href="benhUngThu.php">Bệnh Ung Thư</a></li>
    </ul>
</aside>


    <!-- Nội dung chính -->
    <div class="t-main-content">
        <h1 class="t-news-title"> Ung thư là gì? Mọi thứ về bệnh có tỷ lệ mắc cao trên thế giới </h1>
        <div class="t-divider"></div>
        <div class="t-news-item">
            <h2> Bệnh ung thư là gì? </h2>
            <p>
            Ung thư là căn bệnh xảy ra khi có tế bào không bình thường xuất hiện, sinh trưởng mất kiểm soát và hợp thành một khối u.
             Các tế bào ung thư dần dần sẽ phá hủy và xâm lấn các mô lành trong cơ thể, xuất phát từ các cơ quan lân cận cho đến toàn cơ thể.
            </p>
            <p>
            Ngày nay, có hơn 200 bệnh ung thư được các nhà khoa học phát hiện, tên của bệnh sẽ được đặt theo bộ phận khởi phát khối u cũng như tính chất của bệnh. Chẳng hạn, 
            ung thư có nguồn gốc từ phổi được gọi là ung thư phổi hoặc ung thư phổi nguyên phát, khi lây đến gan sẽ gọi là bệnh ung thư gan thứ phát.
            </p>
            <p>
            Nguyên nhân gây bệnh rất đa dạng, tùy thuộc vào từng loại tiểu đường cụ thể. Tuy nhiên,
             dù mắc loại tiểu đường nào thì bệnh vẫn dẫn đến lượng đường trong máu cao, từ đó gây nên hàng loạt vấn đề sức khỏe nghiêm trọng.
            </p>

           <div class="image-tieuduong">
           <img src="../../img/ungthu1.jpg" alt="Hình ảnh người bệnh tiểu đường đang đo đường huyết">
            </div>
        
            <h3>Nguyên Nhân</h3>
                    <h4>Thuốc lá</h4>
            <p>  Thuốc lá
            Nguyên nhân dẫn đến bệnh ung thư ở phế quản phổi 90% là do thuốc lá. Ngoài ra, có ung thư vòm họng, thanh quản, miệng, thực quản, gan, dạ dày,... 
            Chất Hydrocarbon thơm có hàm lượng lớn trong khói thuốc lá, trên thực nghiệm chất gây ung thư phải kể đến là 3 - 4 Benzopyren. </p>

            <div class="image-tieuduong">
            <img src="../../img/ungthu2.jpg" alt="Hình ảnh người bệnh tiểu đường đang đo đường huyết">
            </div>
            
             <h4>Dinh dưỡng</h4>
             <p> Trong số nguyên nhân ung thư, dinh dưỡng chiếm tỷ trọng 35% . Một số bệnh ung thư liên quan đến dinh dưỡng như: ung thư gan, ung thư vú, ung thư thực quản, ung thư đại tràng, ung thư dạ dày,...
             Mối liên hệ giữa bệnh ung thư và dinh dưỡng để thể hiện qua 2 khía cạnh chủ yếu. Đầu tiên là sự xuất hiện của một số chất có nguy cơ ung thư trong thức ăn, các loại thực phẩm. Thứ hai là có liên hệ đến sinh học ung thư, đây là sự có mặt của những hoạt chất giữ vai trò quan trọng làm suy giảm khả năng miễn dịch. Đồng thời, khẩu phần ăn bị mất sự cân đối cũng là lý do gây ung thư.
             </p>
             <div class="image-tieuduong">
            <img src="../../img/ungthu3.jpg" alt="Hình ảnh người bệnh tiểu đường đang đo đường huyết">
            </div>
            
            <h2>Phương pháp điều trị bệnh ung thư</h2>
           <p>Dựa vào loại bệnh ung thư, kết quả chẩn đoán, mức độ và giai đoạn phát bệnh cùng với tình trạng sức khỏe tổng thể của người bệnh,... mà bác sĩ sẽ đưa ra phác đồ điều trị thích hợp. </p>
                    <p>Phẫu thuật: Có thể loại bỏ hoàn toàn tế bào ung thư bằng cách cắt toàn bộ hoặc 1 phần khối u, có thể loại bỏ cả những tế bào vẫn còn khỏe mạnh.</p>
                    <p>Hóa trị: Sử dụng các loại thuốc chuyên biệt do bác sĩ kê đơn để loại bỏ nhanh chóng các tế bào ung thư.</p>
                    <p>Liệu pháp miễn dịch: là phương pháp tăng cường hệ miễn dịch bằng cách bổ sung cho cơ thể nhiều kháng thể, từ đó loại bỏ khối u.</p>
        </div>
        

        <!-- Chủ đề phổ biến -->
       
        <h2>Chủ đề phổ biến</h2>
        <div class="popular-tags">
        <a href="#" class="tag">#ung thư</a>
        <a href="#" class="tag">#ung thư có chữa được không ?</a>
        <a href="#" class="tag">#Chăm Sóc Sức Khỏe</a>
        <a href="#" class="tag">#Dinh Dưỡng</a>
        </div>
                    <!-- Cập nhật và Chia sẻ -->
<div class="update-share">
    <div class="update-time">
        <p>Cập nhật lần cuối: <span class="time">18:15 29/11/2024</span></p>
    </div>

    <div class="share-icons">
        <p>Chia sẻ:</p>
        <a href="https://www.facebook.com/" class="social-icon facebook"><i class="fab fa-facebook-f"></i></a>
        <a href="https://x.com/?lang=vi&mx=2" class="social-icon twitter"><i class="fab fa-twitter"></i></a>
        <a href="https://www.pinterest.com/" class="social-icon pinterest"><i class="fab fa-pinterest"></i></a>
   
    </div>
</div>

        </div>
                    
        </div>
        </div>


        <!-- Contact Section -->
        <div class="contact">
            <div class="contact-section">
                <h1> Contact </h1>
                <div class="contact-info-1">
                    <div class="contact-box">
                        <i class="fas fa-phone-alt"></i>
                        <h3>HOTLINE</h3>
                        <p>(237) 681-812-255<br>(237) 666-331-894</p>
                    </div>
                    <div class="contact-box">
                        <i class="fas fa-map-marker-alt"></i>
                        <h3>ĐỊA CHỈ</h3>
                        <p>0123 abc</p>
                    </div>
                    <div class="contact-box">
                        <i class="fas fa-envelope"></i>
                        <h3>EMAIL</h3>
                        <p>fildineeesoe@gmail.com<br>myebstudios@gmail.com</p>
                    </div>
                    <div class="contact-box">
                        <i class="fas fa-clock"></i>
                        <h3>GIỜ LÀM VIỆC</h3>
                        <p>Thứ 2 - Thứ 7 09:00-20:00<br>Chỉ khẩn cấp vào Chủ nhật</p>
                    </div>
                </div>
            </div>
        </div>     

        <!-- Footer -->
        <footer>
            <div class="footer-content">
                <div class="footer-box">
                    <h2>MEDDICAL</h2>
                    <p>Dẫn đầu về chất lượng y tế xuất sắc, dịch vụ chăm sóc đáng tin cậy.</p>
                </div>
                <div class="footer-box">
                    <h3>Liên kết</h3>
                    <p><a href="#">Đặt lịch</a><br><a href="#">Bác sĩ</a><br><a href="#">Dịch vụ</a><br><a href="#">Giới thiệu</a></p>
                </div>
                <div class="footer-box">
                    <h3>Liên hệ</h3>
                    <p>Call: (237) 123<br>Email: abc@gmail.com<br>Địa chỉ: 0123abc</p>
                </div>
                <div class="footer-box">
                    <h3>Bản tin</h3>
                    <div class="newsletter">
                        <input type="email" placeholder="Enter your email address">
                        <button><i class="fa-solid fa-paper-plane"></i></button>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>© 2021 Hospital's name All Rights Reserved by PNTEC-LTD</p>
                <div class="icon-social">
                    <i class="fab fa-linkedin-in"></i>
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-instagram"></i>
                </div>
            </div>
        </footer>
    </div>


</body>
</html>
