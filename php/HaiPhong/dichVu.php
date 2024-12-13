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
             <img src="../../img/dichvu.jpg" alt="Cover Image" class="image-benhHoc">
        </div>

        <!-- Chuyên mục Chuyên Gia  -->
        <div class="news-section">
            
            <div class="news-title"> Dịch vụ đặc biệt </div>
            <div class="divider"></div> <!-- Đường gạch chia cắt -->
                                <!-- Bác sĩ Duy -->
        <div class="doctor">
<img src="data:image/jpeg;base64,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" alt="Bác sĩ Duy">
            <div>
                <h3>Khu khám VIP</h3>
                <p>Khu khám VIP được đầu tư và xây dựng với tổng diện tích hơn 2.000m2, bao gồm 4 tầng lầu với khu khám Sản – 
                    Nhi VIP, khu Nội soi VIP cùng gần 40 phòng khám cận lâm sàng cho các chuyên khoa như tim mạch, nhi khoa, 
                    tai mũi họng, chấn thương chỉnh hình, cơ xương khớp,
                     hô hấp, tiết niệu, nam khoa, thần kinh, đái tháo thường, da liễu,…</p>
                <a href="#">Xem chi tiết </a>
            </div>
        </div>

        <!-- Bác sĩ Tuấn -->
        <div class="doctor">
<img src="data:image/jpeg;base64,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"Bác sĩ Tuấn">
            <div>
                <h3>Dịch vụ khám, điều trị bệnh tim mạch cho người lớn</h3>
                <p>Cứ 2 giây có một người không qua khỏi vì các bệnh tim mạch, 5 giây cho một trường hợp nhồi máu cơ tim và 6 giây có 1 ca tử vong do đột quỵ.
                Tại cuộc họp của Hiệp hội Tim mạch Hoa Kỳ diễn ra ở Florida năm 2009, các nhà nghiên cứu đã chỉ ra các xác ướp Ai Cập, khoảng 3.500 năm tuổi, có các vấn đề về bệnh tim mạch – cụ thể là chứng xơ vữa động mạch. Pharaoh Merenptah, người qua đời vào năm 
                1203 trước Công nguyên, bị mắc chứng xơ vữa động mạch.</p>
                <a href="#">Xem chi tiết </a>
            </div>
        </div>

        <!-- Bác sĩ Mạnh -->
        <div class="doctor">
<img src="https://i.imgur.com/poSZw6db.jpg" alt="Bác sĩ Mạnh">
            <div>
                <h3> Dịch vụ cấp cứu 24/7 tại Bệnh viện </h3>
                <p>Dịch vụ cấp cứu 24/7 đóng vai trò quan trọng trong quá trình xử lý ban đầu nhằm giảm thiểu tối đa nguy cơ biến chứng, tử vong của người bệnh trong các tình huống nguy cấp.</p>
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
