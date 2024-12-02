<?php
class login
{

		public function connectlogin()
		{
			$con=mysqli_connect("localhost","root","","benhvien");
			if(!$con)
			{
				echo 'Không thể kết nối đến database !';
				exit();	
			}	
			else
			{
				mysqli_set_charset($con, "utf8");
				return $con;	
			}
		}
		
		public function mylogin($user,$pass)
		{
			//$pass=md5($pass);
			$sql="select * from taikhoan where soDienThoai='$user' and password='$pass' limit 1";
			$link=$this->connectlogin();
			$kq=mysqli_query($link,$sql);
			if(mysqli_num_rows($kq)==1)
			{
				while($row=mysqli_fetch_array($kq))
				{
					$id=$row['maTaiKhoan'];
                    $ten=$row['tenTaiKhoan'];
					$myuser=$row['soDienThoai'];
					$mypass=$row['password'];
                    $vaiTro=$row['vaiTro'];

					session_start();
					$_SESSION['id']=$id;
                    $_SESSION['ten']=$ten;
					$_SESSION['user']=$myuser;
					$_SESSION['pass']=$mypass;
                    $_SESSION['vaiTro']=$vaiTro;
					echo'<script>alert("Đăng nhập thành công")</script>';
					echo'<script>window.location="../index.php"</script>';
				}
			}
			else
			{
				return 0;	
			}
			
		}	
		
		public function confirmlogin($id,$user,$pass,$vaiTro)
		{
			$sql="select maTaiKhoan from taikhoan where maTaiKhoan='$id' and soDienThoai='$user' and password='$pass' and vaiTro='$vaiTro' limit 1";
			$link=$this->connectlogin();
			$ketqua=mysqli_query($link,$sql);
			if(mysqli_num_rows($ketqua)!=1)
			{
				header('location:login/');	
			}
		}	

		public function register($username, $phone, $password, $role) {
			$link = $this->connectlogin();
	
			// Kiểm tra trùng số điện thoại
			$check_sql = "SELECT * FROM taikhoan WHERE soDienThoai = ?";
			$stmt = $link->prepare($check_sql);
			$stmt->bind_param("s", $phone);
			$stmt->execute();
			$check_result = $stmt->get_result();
	
			if ($check_result->num_rows > 0) {
				return "Số điện thoại đã tồn tại!";
			}
	
			// Mã hóa mật khẩu (khuyến nghị sử dụng password_hash)
			//$hashed_password = password_hash($password, PASSWORD_BCRYPT);
	
			// Thêm tài khoản mới
			$sql = "INSERT INTO taikhoan (tenTaiKhoan, soDienThoai, password, vaiTro) VALUES (?, ?, ?, ?)";
			$stmt = $link->prepare($sql);
			$stmt->bind_param("ssss", $username, $phone, $hashed_password, $role);
	
			if ($stmt->execute()) {
				return true;
			} else {
				return "Có lỗi xảy ra trong quá trình đăng ký!";
			}
		}
	}
?>