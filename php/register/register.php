<?php
session_start();
include("../myclass/clslogin.php");

$p = new login();
$message = ""; // Biến lưu trữ thông báo

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $phone = trim($_POST['phone']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $role = $_POST['role'];

    // Kiểm tra mật khẩu xác nhận
    if ($password === $confirm_password) {
        // Gọi phương thức đăng ký từ lớp login
        $result = $p->register($username, $phone, $password, $role);
        if ($result === true) {
            $message = "Đăng ký thành công!";
            header("refresh:2;url=../index.php"); // Chuyển hướng sau 2 giây
            exit;
        } else {
            $message = "Đăng ký thất bại: " . $result;
        }
    } else {
        $message = "Mật khẩu xác nhận không khớp!";
    }
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Đăng ký</title>
<style>
	body {
		font-family: Arial, sans-serif;
		background-color: #f2f2f2;
		display: flex;
		justify-content: center;
		align-items: center;
		height: 100vh;
		margin: 0;
	}
	.form-container {
		width: 400px;
		background-color: white;
		border: 1px solid #ccc;
		border-radius: 8px;
		padding: 20px;
		box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
		text-align: center;
	}
	.form-container table {
		width: 100%;
		margin-bottom: 15px;
	}
	.form-container td {
		padding: 8px 10px;
	}
	strong {
		font-size: 24px;
		color: #008cba;
	}
	label {
		display: inline-block;
		width: 110px;
		text-align: right;
		padding-right: 10px;
	}
	input[type="text"], input[type="password"], select {
		width: 95%;
		padding: 8px;
		margin-top: 5px;
		border: 1px solid #ccc;
		border-radius: 4px;
		box-sizing: border-box;
	}
	input[type="submit"] {
		background-color: #008cba;
		color: white;
		border: none;
		padding: 10px 20px;
		border-radius: 5px;
		cursor: pointer;
		margin-top: 10px;
	}
	input[type="submit"]:hover {
		background-color: #006b94;
	}
	.user-link {
		color: #008cba;
		text-decoration: none;
	}
	.user-link:hover {
		text-decoration: underline;
	}
</style>
</head>

<body>
<div class="form-container">
  <form method="post">
    <table border="0" align="center" cellpadding="5" cellspacing="0">
      <tbody>
        <tr>
          <td colspan="2" align="center"><strong>Đăng ký</strong></td>
        </tr>
        <tr>
          <td><label for="username">Tên tài khoản:</label></td>
          <td><input id="username" name="username" type="text" required></td>
        </tr>
        <tr>
          <td><label for="phone">Số điện thoại:</label></td>
          <td><input id="phone" name="phone" type="text" required></td>
        </tr>
        <tr>
          <td><label for="password">Mật khẩu:</label></td>
          <td><input id="password" name="password" type="password" required></td>
        </tr>
        <tr>
          <td><label for="confirm_password">Xác nhận mật khẩu:</label></td>
          <td><input id="confirm_password" name="confirm_password" type="password" required></td>
        </tr>
        <tr>
          <td><label for="role">Bạn là:</label></td>
          <td>
            <select id="role" name="role" required>
              <option value="Bệnh nhân">Bệnh nhân</option>
              <option value="Bác sĩ">Bác sĩ</option>
              <option value="Quản lý">Quản lý</option>
            </select>
          </td>
        </tr>
      </tbody>
    </table>
    <input type="submit" value="Đăng ký">
  </form>
  <div>
      <p><?php echo $message; ?></p> <!-- Hiển thị thông báo dưới form -->
      <p>Bạn đã có tài khoản? 
      <a href="../login/index.php" class="user-link">Đăng nhập ngay</a>
      </p>
  </div>
</div>
</body>
</html>
