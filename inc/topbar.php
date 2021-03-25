<?php 
	if(isset($_POST['dangnhap_home']))
	{
		$taikhoan = $_POST['email_login'];
		$matkhau = md5($_POST['password_login']);
		if ($taikhoan =='' || $matkhau == '') {
			echo "<script> alert('Vui lòng nhập đầy đủ !!') </script>";
		}else
		{
			$sql_select_admin = mysqli_query($con, "SELECT * FROM tbl_khachhang WHERE email = '$taikhoan' AND password = '$matkhau'");
			$count = mysqli_num_rows($sql_select_admin);
			$row_dangnhap = mysqli_fetch_array($sql_select_admin);
			if($count > 0 )
			{	$_SESSION['dangnhap_home'] = $row_dangnhap['name'];
				$_SESSION['khachhang_id'] = $row_dangnhap['khachhang_id'];
				header('Location:index.php?quanly=giohang');
				
			}
			else
			{
				echo "<script>alert('Tài khoản mật khẩu không đúng')</script>";
			}
		}
	}elseif (isset($_POST['dangky'])) {
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		$note = $_POST['note'];
		$address = $_POST['address'];
		$giaohang = $_POST['giaohang'];
		$sql_khachhang = mysqli_query($con,"INSERT INTO tbl_khachhang(name,phone,email,address,note,giaohang,password) values ('$name','$phone','$email','$address','$note','$giaohang','$password')");
		$sql_select_khachhang = mysqli_query($con,"SELECT*FROM tbl_khachhang ORDER BY khachhang_id DESC LIMIT 1");
		$row_khachhang = mysqli_fetch_array($sql_select_khachhang);
		$_SESSION['dangnhap_home'] = $name;
		$_SESSION['khachhang_id'] = $row_khachhang['khachhang_id'];
		header('Location:index.php?quanly=giohang');
	}

 ?>
<div class="header" style="background: #0a0a0f; height: 50px;">
		<a href="index.php"><img class="logo" src = "/hinhanh/logo1.png" alt = "logo" width="100" height="30"></a>
		<form action="index.php?quanly=timkiem" method="POST"><input type="text" id ="search" name="search_product" placeholder="Tìm kiếm..">
		<button class="btn my-2 my-sm-0" name="search_button" type="submit" style="width: 40px; height: 40px;position: absolute; right: 173px; margin-left: 800px; " ><i class="fa fa-search"></i></button>
		</form>
		<form>
			<!-- <span class="icon"><i class="fa fa-search"></i></span> -->
	        <!--<input type="text" id ="search" name="search" placeholder="Tìm kiếm..">-->
	        <div class="facebook">
	        	<span class="icon"><a href="https://www.facebook.com/profile.php?id=100005396897390"><i class="fa fa-facebook"></i> </a></span>
	        	<div><p id="facebook">Facebook</p></div>
	        </div>

	        <div class="ins">
	        	<span class="icon"><a href="https://www.instagram.com/cbhoanghon/"><i class="fa fa-instagram"></i></a> </span>	
	        	<div id="ins"><p>Instagram</p></div>
	        </div>
	        
	       
	        <span class="icon"><a href="#" style="color: white;"><i class="fa fa-phone"></i> </a></span>
	        <p class="sdt">0966154181</p>
	        <!-- xem don hang -->
	        <?php 
	        	if (isset($_SESSION['dangnhap_home'])) {
	        		
	        ?>
	        <div id = "giohang">
	        	<span class="icon">
				<a href="index.php?quanly=xemdonhang&khachhang=<?php echo $_SESSION['khachhang_id'] ?>" class="text-white">
					<i class="fas fa-truck mr-2" ></i></a>
					<div id="giaohang"><p >Xem đơn hàng</p></div>

			</span>
	        </div>
			
		<?php } ?>
			<!-- xem don hang -->
			<span class="text-center border-right text-white">
					<a href="#" data-toggle="modal" data-target="#dangnhap" class="text-white-1">
						<i class="fas fa-sign-in-alt mr-2"></i> Đăng nhập</a>
				</span>
				<span class="text-center text-white">
					<a href="#" data-toggle="modal" data-target="#dangky" class="text-white-2">
						<i class="fas fa-sign-out-alt mr-2"></i>Đăng ký </a>
				</span>
					        
		</form>
			<div class="donhang">
				<div class="col-2 top_nav_right text-center mt-sm-0 mt-2" style="position: absolute; left: 680px;">
			<div class="wthreecartaits wthreecartaits2 cart cart box_1">
				<form action="index.php?quanly=giohang" method="post" class="last">
					<input type="hidden" name="cmd" value="_cart">
					<input type="hidden" name="display" value="1">
					<button class="btn w3view-cart" type="submit" name="submit" value="">
						<i class="fas fa-cart-arrow-down"></i>
					</button>
					<div id="donhang1"><p >Giỏ hàng</p></div>
				</form>
			</div>
		</div>
			</div>
		
	</div>
	<div class="modal fade" id="dangnhap" tabindex="-1" role="dialog" aria-hidden="true" >
		<div class="modal-dialog" role="document" >
			<div class="modal-content">
				<div class="modal-header" style="height: 450px;">
					<h5 style="position: absolute;left:160px;" class="modal-title text-center">Đăng nhập</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" style="position: absolute; left: -400px; top: 100px; ">
					<form action="#" method="post">
						<div class="form-group">
							<label class="col-form-label"   >Email</label>
							<input style="width: 350px;" type="text" class="form-control" placeholder=" " name="email_login" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Mật khẩu</label>
							<input style="width: 350px;" type="password" class="form-control" placeholder=" " name="password_login" required="">
						</div>
						<div class="right-w3l">
							<input type="submit" class="form-control" name="dangnhap_home" value="Đăng nhập">
						</div>
						<p class="text-center dont-do mt-3">Chưa có tài khoản?
							<a href="#" data-toggle="modal" data-target="#dangky">
						Đăng ký</a>
						</p>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- register -->
	<div class="modal fade" id="dangky" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header" style="height: 800px;">
					<h5 style="position: absolute;left:190px;" class="modal-title">Đăng ký</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" style="position: absolute; left: -400px; top: 100px; ">
					<form action="" method="post">
						<div class="form-group">
							<label class="col-form-label">Tên khách hàng</label>
							<input style="width: 350px;" type="text" class="form-control" placeholder=" " name="name" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Email</label>
							<input style="width: 350px;" type="email" class="form-control" placeholder=" " name="email" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Phone</label>
							<input style="width: 350px;" type="text" class="form-control" placeholder=" " name="phone" id="password1" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Address</label>
							<input style="width: 350px;" type="text" class="form-control" placeholder=" " name="address" id="" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Password</label>
							<input style="width: 350px;" type="password" class="form-control" placeholder=" " name="password" id="password" required="">
							<input style="width: 350px;" type="hidden" class="form-control" placeholder=" " name="giaohang" value="1" id="password2" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Ghi chú</label>
							<textarea class="form-control" name="note"></textarea>
						</div>
						<div class="right-w3l">
							<input type="submit" class="form-control" name="dangky" value="Đăng ký">
						</div>
						<!-- <div class="sub-w3l">
							<div class="custom-control custom-checkbox mr-sm-2">
								<input type="checkbox" class="custom-control-input" id="customControlAutosizing2">
								<label class="custom-control-label" for="customControlAutosizing2">I Accept to the Terms & Conditions</label>
							</div>
						</div> -->
					</form>
				</div>
			</div>
		</div>
	</div>