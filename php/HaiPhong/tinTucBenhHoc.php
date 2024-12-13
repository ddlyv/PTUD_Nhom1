<?php
	session_start();
    error_reporting(0);
	include ("../myclass/clslogin.php");
	$c=new login();
		
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin tức_bệnh học</title>
    <link rel="stylesheet" href="../../css/tintuc.css">
    <!-- Thêm Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
    <style>

    </style>
</head>
<body>
    <div class="container">
        <header>
            <div class="header">
                <div class="logo"><a style="text-decoration: none; color: black;" href="index.php">MED<span class="highlight">DICAL</a></span>
                </div>
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
                                    $ten=$_SESSION['ten'];
                                    echo'<span style="margin-right: 10px;">'.$ten.'</span>';
                                    echo '<a href="../logout/index.php" class="user-link">Đăng xuất</a>';
                                } 
                                else
                                {
                                    echo '<a href="../login/index.php" class="user-link">Đăng nhập</a> / ';
                                    echo '<a href="../register/register.php" class="user-link">Đăng ký</a>';
                                }
                            ?>
                        
                    </div>
                </div>
                
            </div>
        </header>
        <nav>
            <div class="navbar">
                <a href="../index.php">Trang chủ</a>
                <a href="chuyenGia.php">Chuyên gia</a>
                <a href="dichVu.php">Dịch vụ</a>
                <a href="thanhTuu.php">Thành tựu</a>
                <a href="tinTucBenhHoc.php">Tin Tức</a>
                <a href="lienLac.php">Liên lạc</a>
                <?php
                    // Kiểm tra và hiển thị mục theo vai trò
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
                    <a href="datLichKham.php"><button type="button">Đặt lịch</button></a>
                </div>
            </div>
        </nav>

   


        <div class="Picture">
             <img src="../../img/benhHoc.jpg" alt="Cover Image" class="image-benhHoc">
        </div>

        <!-- Chuyên mục Bệnh học -->
        <div class="news-section">
            
            <div class="news-title"> Chuyên Mục Bệnh Học </div>
            <div class="divider"></div> <!-- Đường gạch chia cắt -->

            <div class="news-item">
            <h2>
                <i class="fas fa-user-md" style="color: #0288d1; margin-right: 10px;"></i>
                    Bệnh Tiểu Đường: Nguyên Nhân Và Phương Pháp Điều Trị
            </h2>
                <p>Tiểu đường là một bệnh lý liên quan đến sự tăng cao lượng đường trong máu. Việc kiểm soát lượng đường trong máu có thể giúp giảm thiểu nguy cơ gặp phải các biến chứng nguy hiểm...</p>
                <a href="benhTieuDuong.php">Đọc thêm</a>
            </div>

            <div class="news-item">
            <h2>
                <i class="fas fa-stethoscope" style="color: #0288d1; margin-right: 10px;"></i>
                    Bệnh Tim Mạch: Biện Pháp Phòng Ngừa Và Chăm Sóc
            </h2>

                <p>Bệnh tim mạch có thể gây ra những vấn đề nghiêm trọng đến sức khỏe. Để bảo vệ trái tim của mình, việc thay đổi thói quen ăn uống và luyện tập thể dục là rất quan trọng...</p>
                <a href="benhTim.php">Đọc thêm</a>
            </div>

            <div class="news-item">
            <h2>
                <i class="fas fa-hospital" style="color: #0288d1; margin-right: 10px;"></i>
                    Những Điều Cần Biết Về Ung Thư
            </h2>
                <p>Ung thư hiện nay đã trở thành một trong những nguyên nhân hàng đầu gây tử vong. Tuy nhiên, nếu phát hiện sớm và có phương pháp điều trị đúng cách, nhiều loại ung thư có thể chữa khỏi...</p>
                <a href="benhUngThu.php">Đọc thêm</a>
            </div>
        </div>

        <!-- Contact Section -->
        <div class="contact">
            <div class="contact-section">
                <h1> Contact</h1>
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
