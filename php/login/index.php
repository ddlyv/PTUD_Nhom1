<?php 
	error_reporting(0);
	include ("../myclass/clslogin.php");
	$p = new login();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Đăng nhập</title>
<style>
	body {
		font-family: Arial, sans-serif;

		background-size: cover;
		display: flex;
		justify-content: center;
		align-items: center;
		height: 100vh;
		margin: 0;
		position: relative;
	}

	.form-container {
		width: 400px;
		background-color: white;
		border: 1px solid #ccc;
		border-radius: 8px;
		padding: 20px;
		box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
		text-align: center;
		position: relative;
		z-index: 1;
	}

	.form-container table {
		width: 100%;
		margin-bottom: 15px;
	}
	label {
		display: inline-block;
		width: 110px;
		text-align: right;
		padding-right: 10px;
	}
	input[type="text"], input[type="password"] {
		width: 95%;
		padding: 8px;
		border: 1px solid #ccc;
		border-radius: 4px;
		box-sizing: border-box;
	}
	input[type="submit"], input[type="reset"] {
		background-color: #008cba;
		color: white;
		border: none;
		padding: 10px 20px;
		border-radius: 5px;
		cursor: pointer;
		margin-top: 10px;
	}
	input[type="submit"]:hover, input[type="reset"]:hover {
		background-color: #006b94;
	}
</style>
</head>

<body>
	<div class="form-container">
		<form id="form1" name="form1" method="post">
		  <table border="0" align="center" cellpadding="5" cellspacing="0">
		    <tbody>
		      <tr>
		        <td colspan="2" align="center"><strong style="font-size: 24px; color: #008cba;">Đăng nhập</strong></td>
		      </tr>
		      <tr>
		        <td><label for="txtten">Số điện thoại:</label></td>
		        <td><input name="txtten" type="text" id="txtten" required></td>
		      </tr>
		      <tr>
		        <td><label for="txtpass">Mật khẩu:</label></td>
		        <td><input name="txtpass" type="password" id="txtpass" required></td>
		      </tr>
		      <tr>
		        <td colspan="2" align="center">
		          <input type="submit" name="chon" id="chon" value="Đăng nhập">
		          <input type="reset" name="reset" id="reset" value="Reset">
		        </td>
		      </tr>
		    </tbody>
		  </table>
		</form>
		<div align="center">
			<?php
				switch($_REQUEST['chon']) {
					case 'Đăng nhập':
						$user = $_REQUEST['txtten'];
						$pass = $_REQUEST['txtpass'];
						if ($user != '' && $pass != '') {
							if ($p->mylogin($user, $pass) == 0) {
								echo 'Sai tài khoản hoặc mật khẩu!';	
							}
						} else {
							echo 'Vui lòng nhập đầy đủ thông tin';	
						}
						break;
				}
			?>
		</div>
	</div>
</body>
</html>
