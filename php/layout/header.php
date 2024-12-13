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
    <title>Trang Chủ</title>
    <link rel="stylesheet" href="../../css/mau.css">
    <!-- Thêm Font Awesome -->
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    .search-booking a:hover{
            border-bottom: none;
        }
        .section1 {
            text-align: center;
            margin-top: 20px;
        }
        .tenChucNang_cuthe {
            font-size: 24px;
            font-weight: bold;
            color: #007bff;
        }
</style>
</head>
<body>
    <div class="containerr">
        <header>
            <div class="header">
                <div class="logo"><a style="text-decoration: none; color: black;" href="../index.php">MED<span class="highlight">DICAL</a></span>
                </div>
                <div class="contact-info">
                    <div class="info">
                        <span class="icon">📞</span> HOTLINE <br>(237) 681-812-255</br>
                    </div>
                    <div class="info">
                        <span class="icon">⏰</span> GIỜ LÀM VIỆC <br>09:00 - 20:00 Everyday</br>
                    </div>
                    <div class="info">
                        <span class="icon">📍</span> ĐỊA CHỈ <br>0123 Some Place</br>
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
                                    echo '<a href="../register/" class="user-link">Đăng ký</a>';
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
                <a href="tinTucBenhHoc.php">Tin tức</a>
                <a href="lienLac.php">Liên lạc</a>


                <?php
// Kiểm tra và hiển thị mục theo vai trò
                    if (isset($_SESSION['vaiTro'])) {
                        switch ($_SESSION['vaiTro']) {
                            case 'Bệnh nhân':
                                echo '<a href="../MinhCong/danhChoBenhNhan.php">Dành cho bệnh nhân</a>';
                                break;
                            case 'Bác sĩ':
                                echo '<a href="../MinhCong/danhChoBacSi.php">Dành cho bác sĩ</a>';
                                break;
                            case 'Quản lý':
                                echo '<a href="../MinhCong/danhChoQuanLy.php">Dành cho Quản lý</a>';
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
            <img src="../../img/anhbia.jpg" alt="Cover Image" class="cover-image" alt="">
        </div>



        <div class="section1">
        <div class="tenChucNang">
            <p class="tenChucNang_cuthe">Liên Hệ</p>
        </div>
    </div>

    <div class="container mt-4">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo '<div class="alert alert-success" role="alert">Gửi thành công!</div>';
        }
        ?>

        <form method="post" action="">
     

            <div class="mb-3">
                <label for="danhxung" class="form-label">Danh xưng</label>
                <select id="danhxung" class="form-select">
                    <option value="Ông">Ông</option>
                    <option value="Bà">Bà</option>
                    <option value="Anh">Anh</option>
                    <option value="Chị">Chị</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="hoten" class="form-label">Họ & Tên *</label>
                <input type="text" class="form-control" id="hoten" name="hoten" required>
            </div>

            <div class="mb-3">
                <label for="dienthoai" class="form-label">Điện thoại *</label>
                <input type="tel" class="form-control" id="dienthoai" name="dienthoai" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Địa chỉ email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="mb-3">
                <label for="loinhan" class="form-label">Để lại lời nhắn</label>
                <textarea class="form-control" id="loinhan" name="loinhan" rows="3"></textarea>
            </div>
<button type="submit" class="btn btn-primary">Gửi thông tin</button>
        </form>
    </div>

   






        <div class="contact">
            <div class="contact-section">
                <h1>Contact</h1>
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
