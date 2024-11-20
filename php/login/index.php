<?php 
	error_reporting(0);
	include ("../myclass/clslogin.php");
	$p= new login();		
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Đăng nhập</title>
</head>

<body>
<form id="form1" name="form1" method="post">
  <table width="400" border="1" align="center" cellpadding="5" cellspacing="0">
    <tbody>
      <tr>
        <td colspan="2" align="center" valign="middle"><strong style="font-size: 24px">Đăng nhập</strong></td>
      </tr>
      <tr>
        <td width="120">Số điện thoại</td>
        <td width="254"><input name="txtten" type="text" id="txtten"></td>
      </tr>
      <tr>
        <td>Password</td>
        <td><input name="txtpass" type="password" id="txtpass"></td>
      </tr>
      <tr>
        <td colspan="2" align="center" valign="middle"><input type="submit" name="chon" id="chon" value="Đăng nhập">
        <input type="reset" name="reset" id="reset" value="Reset"></td>
      </tr>
    </tbody>
  </table>
  <div align="center">
  	<?php
		switch($_REQUEST['chon'])
		{
			case'Đăng nhập':
			{
				$user=$_REQUEST['txtten'];
				$pass=$_REQUEST['txtpass'];
				if($user!='' && $pass!='')
				{
					if($p->mylogin($user,$pass)==0)
					{
						echo'Sai tài khoản hoặc mật khẩu!';	
					}	
				}
				else
				{
					echo'Vui lòng nhập đầy đủ thông tin';	
				}
				break;
			}	
		}
	?>
  </div>
</form>
</body>
</html>