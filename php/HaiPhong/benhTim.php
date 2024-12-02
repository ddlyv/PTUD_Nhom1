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
    <title> Bệnh Tim</title>

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
                                echo '<a href="logout/index.php" class="user-link">Đăng xuất</a>';
                            } else {
                                echo '<a href="login/index.php" class="user-link">Đăng nhập</a> / ';
                                echo '<a href="register/register.php" class="user-link">Đăng ký</a>';
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
                        <li><a href="#">Đào tạo</a></li>
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
    
        <!-- Bài viết bệnh tim -->
      
        <div class="t-news-container">
    <!-- Thanh bên trái -->
    <aside class="t-left-sidebar">
    <ul>
        <li><i class="fas fa-list"></i> <a href="tinTucBenhHoc.php">Tất cả</a></li>
        <li><i class="fas fa-heartbeat"></i> <a href="benhTieuDuong.php">Bệnh Tiểu Đường </a></li>
        <li><i class="fas fa-stethoscope"></i> <a href="benhUngThu.php">Bệnh Ung Thư </a></li>
    </ul>
</aside>


    <!-- Nội dung chính -->
    <div class="t-main-content">
        <h1 class="t-news-title"> Bệnh tim mạch: Triệu chứng, nguyên nhân và cách điều trị</h1>
        <div class="t-divider"></div>
        <div class="t-news-item">
        <div class="image-tieuduong">
           <img src="../../img/tim1.jpg" alt="Hình ảnh người bệnh tiểu đường đang đo đường huyết">
            </div>
            <h2>Bệnh tim mạch là gì? Dấu hiệu sớm nhất và cách điều trị </h2>
            <p>
            Tim mạch là bệnh lý xuất hiện âm thầm nhưng để lại nhiều hậu quả nghiêm trọng đối với tính mạng. 
            Trong những năm trở lại đây, tỷ lệ tử vong do các bệnh tim mạch ngày một tăng ở các nước đang phát triển, trong đó có Việt Nam. Hiện nay, trung bình cứ 4 người lớn ở Việt Nam, có ít nhất 1 – 
            2 người đã mang nguy cơ mắc bệnh tim mạch. Vậy bệnh tim mạch là gì? Dấu hiệu sớm nhất và cách phòng ngừa như thế nào?
            </p>
            <p>
            Bệnh tim mạch là các tình trạng liên quan đến sức khỏe của trái tim, sự hoạt động của các mạch máu gây suy yếu khả năng làm việc của tim. Các bệnh tim mạch bao gồm: 
            các bệnh mạch máu như bệnh động mạch vành, bệnh cơ tim, loạn nhịp tim và suy tim.
            </p>
            <p>
            Bệnh tim mạch gây hẹp, xơ cứng và tắc nghẽn mạch máu, làm gián đoạn hoặc không cung cấp đủ Oxy đến não và các bộ phận khác 
            trong cơ thể. 
            Từ đó khiến các cơ quan bị ngừng trệ hoạt động, phá hủy từng bộ phận dẫn đến tử vong.
            </p>
        
        
            <h2>Những bệnh tim thường gặp</h2>
            <h4 class="blue-text"> Bệnh mạch vành </h4>
            <p>Bệnh động mạch vành là tình trạng tích tụ những mảng xơ vữa hoặc Cholesterol lên thành động mạch khiến lòng động mạch bị hẹp, giảm khả năng lưu thông máu, hạn chế việc cung cấp oxy và chất dinh dưỡng cho các cơ quan trên cơ thể. 
            Mảng xơ vữa phát triển lớn dần theo thời gian làm cho tim suy yếu dần.</p>
            <h4 class="blue-text">Tai biến mạch máu não (đột quỵ) </h4>
            <p>Tai biến mạch máu não xuất hiện khi tuần hòa máu lên não bị gián đoạn, suy giảm nghiêm trọng, gây thiếu oxy, dinh dưỡng mô não, chết tế bào não dẫn đến các di chứng nặng nề cho bệnh nhân, thậm chí tử vong.
             </p>
            <h4 class="blue-text"> Bệnh động mạch ngoại biên (PAD) </h4>
            <p>Bệnh động mạch ngoại biên là tình trạng xảy ra khi mảng bám từ chất béo, cholesterol, canxi, mô sợi và các chất khác tích tụ trong các động mạch mang máu đến não, các cơ quan và các chi gây xơ vữa động mạch. 
                Qua thời gian mảng bám cứng lại, làm hẹp các động mạch.</p>
            <p>Các dạng bệnh ít phổ biến hơn gồm tiểu đường đơn gene (monogenic diabetes), 
            tiểu đường do xơ nang (cystic fibrosis-related diabetes), do thuốc, tiểu đường do viêm tụy, u tụy, phẫu thuật tụy, v.v…</p>

            <h3>Nguyên Nhân</h3>
            <p> Hút thuốc là một trong những nguyên nhân của bệnh tim mạch</p>
            <div class="image-tieuduong">
            <img src="../../img/tim2.jpg" alt="Hình ảnh người bệnh tiểu đường đang đo đường huyết">
            </div>
            <h2>Chẩn đoán và điều trị</h2>
            <h4> Những phương pháp điều trị bệnh tiểu đường</h4>
            <img src="../../img/tim3.jpg" alt="Hình ảnh người bệnh tiểu đường đang đo đường huyết">
            <p> Ăn uống lành mạnh: Bạn sẽ cần tập trung vào chế độ ăn nhiều trái cây, rau, protein nạc và ngũ cốc nguyên hạt. Đồng thời, cắt giảm chất béo bão hòa, carbohydrate tinh chế và đồ ngọt.</p>
            
        </div>
        

        <!-- Chủ đề phổ biến -->
       
        <h2>Chủ đề phổ biến</h2>
        <div class="popular-tags">
        <a href="#" class="tag">#tim mạch</a>
        <a href="#" class="tag">#Chăm Sóc Sức Khỏe</a>
        <a href="#" class="tag">#Dinh Dưỡng</a>
        </div>
                    <!-- Cập nhật và Chia sẻ -->
        <div class="update-share">
        <div class="update-time">
        <p>Cập nhật lần cuối: <span class="time">17:16 29/11/2024</span></p>
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
                <h1> Liên Hệ </h1>
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
