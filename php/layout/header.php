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
    </div>
</body>

</html>
