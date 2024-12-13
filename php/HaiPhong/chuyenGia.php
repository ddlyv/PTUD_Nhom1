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
    <title>Chuyên Gia- Bác Sĩ </title>
    <link rel="stylesheet" href="../../css/tintuc.css">
    <!-- Thêm Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
</head>
     <style>

     
        .doctor {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            background: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .doctor img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-right: 20px;
            object-fit: cover;
        }
        .doctor h3 {
            margin: 0 0 10px;
            color: #0066cc;
        }
        .doctor p {
            margin: 0;
        }
 
        .logo {
            font-size: 24px;
        }
        .user {
            display: flex;
            align-items: center;
        }
        .user-link {
            color: #fff;
            margin-left: 10px;
            text-decoration: none;
        }
        .user-link:hover {
            text-decoration: underline;
        }
  
        nav a {
            margin-right: 15px;
            text-decoration: none;
            color: #0066cc;
        }
        nav a:hover {
            text-decoration: underline;
        }
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
                <a href="tinTucBenhHoc.php">Tin Tức </a>
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
             <img src="../../img/chuyengia.jpg" alt="Cover Image" class="image-benhHoc">
        </div>

        <!-- Chuyên mục Chuyên Gia  -->
        <div class="news-section">
            
            <div class="news-title"> Chuyên Gia -  Bác Sĩ </div>
            <div class="divider"></div> <!-- Đường gạch chia cắt -->
                                <!-- Bác sĩ Duy -->
        <div class="doctor">
            <img src="https://i.imgur.com/9WFOAsC.png" alt="Bác sĩ Duy">
            <div>
                <h3>Bác sĩ Phạm Anh Duy</h3>
                <p>Chuyên gia trong lĩnh vực nội khoa với hơn 15 năm kinh nghiệm.</p>
                <a href="#">Xem chi tiết </a>
            </div>
        </div>

        <!-- Bác sĩ Tuấn -->
        <div class="doctor">
            <img src="https://i.imgur.com/6HJyv5Ab.jpg alt="Bác sĩ Tuấn">
            <div>
                <h3>Bác sĩ Hà Anh Tuấn</h3>
<p>Chuyên gia phẫu thuật với nhiều ca thành công đáng ngưỡng mộ.</p>
                <a href="#">Xem chi tiết </a>
            </div>
        </div>

        <!-- Bác sĩ Mạnh -->
        <div class="doctor">
            <img src="https://i.imgur.com/uNCbuUVb.jpg" alt="Bác sĩ Mạnh">
            <div>
                <h3>Bác sĩ Nguyễn Đức Mạnh</h3>
                <p>Chuyên gia y học cổ truyền, kết hợp hiện đại và truyền thống.</p>
                <a href="#">Xem chi tiết </a>
            </div>
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
