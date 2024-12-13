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
    <title> Thành Tựu </title>
    <link rel="stylesheet" href="../../css/tintuc.css">
    <!-- Thêm Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
</head>
     <style>
            .achievement {
            margin-bottom: 30px;
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }
        .achievement img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 15px;
        }
        .achievement h2 {
            color: #0066cc;
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
            
            <div class="news-title"> Thành Tựu  </div>
            <div class="divider"></div> <!-- Đường gạch chia cắt -->
        
            <!-- Bài 1 -->
        <div class="achievement">
            <h2>Ca Phẫu Thuật Hiểm Nghèo Đầu Tiên Ở Việt Nam</h2>
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRxRBuyaIGF3wOCITA369i9ryJSWvwkpWDKaw&s" alt="Hình ảnh ca phẫu thuật">
            <p>Thành công trong ca phẫu thuật ghép tim cho một bệnh nhân gặp nguy hiểm, mốc son đánh dấu bước tiến trong y học Việt Nam.</p>

        </div>

        <!-- Bài 2 -->
        <div class="achievement">
            <h2>Chương Trình Tầm Soát Ung Thư Toàn Diện</h2>
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRO_c0trV3a1m-G6VhvVenRp7w4sBIBYYqQ7Q&s alt=" Chương trình tầm soát">
            <p>Triển khai tất cả các phương pháp tân tiến nhất để phát hiện sớm các loại ung thư nguy hiểm.</p>

        </div>

        <!-- Bài 3 -->
        <div class="achievement">
            <h2>Giải Thưởng "Bệnh Viện Xuất Sắc Nhất"</h2>
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcStA00V4xNx4VPRitpl9Nd4btX344LV7zm3ag&s" alt="Hình ảnh giải thưởng">
            <p>Bệnh viện được trao giải thưởng danh giá nhờ những đóng góp trong nâng cao chất lượng dịch vụ y tế.</p>
            
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
