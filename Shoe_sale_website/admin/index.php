<?php
$con = new mysqli("localhost","root","","nienluan");

// Check connection
if ($con -> connect_errno) {
  echo "Failed to connect to MySQL: " . $con -> connect_error;
  exit();
}
	// Change character set to utf8
	$con -> set_charset("utf8");
?>
<?php 
	session_start()
?>
<?php 
	if(isset($_POST['dangnhap']))
	{
		$taikhoan = $_POST['taikhoan'];
		$matkhau = md5($_POST['matkhau']);
		if ($taikhoan =='' || $matkhau == '') {
			echo "<script> alert('Vui lòng nhập đầy đủ !!') </script>";
		}else
		{
			$sql_select_admin = mysqli_query($con, "SELECT * FROM tbl_admin WHERE email = '$taikhoan' AND password = '$matkhau'");
			$count = mysqli_num_rows($sql_select_admin);
			$row_dangnhap = mysqli_fetch_array($sql_select_admin);
			if($count > 0 )
			{	$_SESSION['dangnhap'] = $row_dangnhap['admin_name'];
				$_SESSION['admin_id'] = $row_dangnhap['admin_id'];
			
				header('Location:dashboard.php');
			}
			else
			{
				echo "<script> alert('Tài khoản hoặc mật khẩu không đúng') </script>";
			}
		}
	}

 ?>
<!DOCTYPE html>
<!-- <html>
<head>
	<meta charset="utf-8">
	<title>Đăng nhập Admin </title>
	<link href="../css1/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
	<h2 align="center">Đăng nhập Admin </h2>
	<div class="col-md-6">
		<div class="form-group">
			<form method="POST" action="" style="margin: 0px 650px; width: 300px;">
			<label>Tài khoản</label>
			<input type="text" name="taikhoan" placeholder="Nhập Email" class="form-control">
			<br>
			<label>Mật khẩu</label>
			<input type="password" name="matkhau" placeholder="Nhập mật khẩu" class="form-control">
			<br>
			<input style="margin: 0px 0px; width: 300px" type="submit" name="dangnhap"  class="btn btn-primary" value="Đăng nhập">
			</form>

		</div>
	</div>

</body>
</html> -->
<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Classy Login form Widget Flat Responsive Widget Template :: w3layouts</title>
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/styleadminindex.css" rel="stylesheet" type="text/css" media="all"/>
<!-- for-mobile-apps -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="keywords" content="Classy Login form Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!-- //for-mobile-apps -->
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
<!--header start here-->
<div class="header">
		<div class="header-main">
		       <h1>Đăng nhập Admin</h1>
			<div class="header-bottom">
				<div class="header-right w3agile">
					
					<div class="header-left-bottom agileinfo">
						
					 <form action="" method="post">
						<input type="text"  placeholder="Nhập tài khoản"  name="taikhoan" />
					<input type="password"  placeholder="Nhập mật khẩu" name="matkhau" />
						<input type="submit" value="Đăng nhập" name="dangnhap">
					</form>	
					<div class="header-left-top">
						<div class="sign-up"></div>
					
					</div>	
				</div>
				</div>
			</div>
		</div>
</div>
</body>
</html>