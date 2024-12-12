<?php
	if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    error_reporting(0);
	include ("../myclass/clslogin.php");
	$c=new login();
    if(isset($_SESSION['id']) && isset($_SESSION['user']) && isset($_SESSION['pass']) && isset($_SESSION['vaiTro']))
    {
        $c->confirmlogin($_SESSION['id'],$_SESSION['user'],$_SESSION['pass'],$_SESSION['vaiTro']);
    }
    else
    {
        header('location:../login/');	
    }
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
    <link rel="stylesheet" href="../../css/mau.css">
    <!-- Thêm Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<style>
    
        /* CSS sửa đổi cho dropdown */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%; /* Đặt menu xuống dưới mục "Tin tức" */
            left: 0;
            background-color: #fff;
            box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
            z-index: 1;
            width: 200px;
        }

        .dropdown:hover .dropdown-menu {
            display: block; /* Hiển thị menu khi hover vào "Tin tức" */
        }

        .dropdown-menu li {
            list-style-type: none;
            padding: 8px 12px;
        }

        .dropdown-menu li a {
            text-decoration: none;
            color: black;
        }

        .dropdown-menu li a:hover {
            background-color: #ddd;
        }



        </style>
</head>
<body>
    <div class="containerr">
        <header>
            <div class="header">
                <div class="logo"><a style="text-decoration: none; color: black;" href="index.php">MED<span class="highlight">DICAL</a></span>
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
                                    echo '<a href="login/index.php" class="user-link">Đăng nhập</a> / ';
                                    echo '<a href="#" class="user-link">Đăng ký</a>';
                                }
                            ?>
                        
                    </div>
                </div>
                
            </div>
        </header>
        <nav>
            <div class="navbar">
                <a href="index.php">Trang chủ</a>
                <a href="#">Chuyên gia</a>
                <a href="#">Dịch vụ</a>
                <a href="#">Thành tựu</a>

                <div class="dropdown" id="toggle-news">
                    <a href="#">Tin tức</a>
                    <ul class="dropdown-menu" id="news-menu">
                        <li><a href="tinTucBenhHoc.php">Bệnh Học</a></li>
                        <li><a href="#">Tạp chí</a></li>
                        <li><a href="#">Hội nghị - Hội thảo</a></li>
                        <li><a href="#">Đào tạo</a></li>
                    </ul>
                </div>
                
                <a href="#">Liên lạc</a>
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
         </nav>
        
        <div class="Picture">
            <img src="../../img/anhbia.jpg" alt="Cover Image" class="cover-image" alt="">
        </div>