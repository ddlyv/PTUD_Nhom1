<?php
class login
{
    public function connectlogin()
		{
			$con=mysql_connect("localhost","root","");
			if(!$con)
			{
				echo 'Không thể kết nối đến database !';
				exit();	
			}	
			else
			{
				mysql_select_db("benhvien");
				mysql_query("SET NAMES UTF8");
				return $con;	
			}
		}
		
		public function mylogin($user,$pass)
		{
			//$pass=md5($pass);
			$sql="select * from taikhoan where soDienThoai='$user' and password='$pass' limit 1";
			$link=$this->connectlogin();
			$kq=mysql_query($sql,$link);
			if(mysql_num_rows($kq)==1)
			{
				while($row=mysql_fetch_array($kq))
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

    public function register($username, $phone, $password, $role)
    {
        $link = $this ->connectlogin();

        // Kiểm tra trùng số điện thoại
        $check_sql = "SELECT * FROM taikhoan WHERE soDienThoai = '$phone'";
        $check_result = mysql_query($check_sql, $link);
        if (mysql_num_rows($check_result) > 0) {
            return "Số điện thoại đã tồn tại!";
        }

        // Mã hóa mật khẩu
        $hashed_password = md5($password);

        // Thêm tài khoản mới
        $sql = "INSERT INTO taikhoan (tenTaiKhoan, soDienThoai, password, vaiTro) 
                VALUES ('$username', '$phone', '$hashed_password', '$role')";
        $result = mysql_query($sql, $link);

        if ($result) {
            return true;
        } else {
            return "Có lỗi xảy ra trong quá trình đăng ký!";
        }
    }
}
?>
