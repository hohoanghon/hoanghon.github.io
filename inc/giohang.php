<?php 
	if(isset($_POST['themgiohang']))
	{
		$tensanpham = $_POST['tensanpham'];
		$sanpham_id = $_POST['sanpham_id'];
		$hinhanh = $_POST['hinhanh'];
		$gia = $_POST['giasanpham'];
		$size = $_POST['size'];
		$soluong = $_POST['soluong'];
		$sql_select_giohang = mysqli_query($con,"SELECT*FROM tbl_giohang WHERE sanpham_id='$sanpham_id' AND size = '$size'");
		$count = mysqli_num_rows($sql_select_giohang);
		if($count > 0  )
		{
			$row_sanpham = mysqli_fetch_array($sql_select_giohang);
			$soluong = 	$row_sanpham['soluong']+1;
			$sql_giohang = "UPDATE tbl_giohang SET soluong='$soluong' WHERE sanpham_id='$sanpham_id' AND size = '$size'";
		}
		else{
			$soluong = 	$soluong;
			$sql_giohang = "INSERT INTO tbl_giohang(tensanpham,sanpham_id,giasanpham,hinhanh,soluong,size) values ('$tensanpham','$sanpham_id','$gia','$hinhanh','$soluong','$size')";
		}
		$insert_row = mysqli_query($con,$sql_giohang);
		
		if($insert_row==0)
		{
			header('Location:index.php?quanly=chitietsp&id='.$sanpham_id);
		}
		
	}elseif (isset($_POST['capnhatgiohang'])) {
		for($i=0;$i<count($_POST['product_id']);$i++)
		{
			$sanpham_id = $_POST['product_id'][$i];
		
			$soluong = $_POST['soluong'][$i];
			

			if($soluong == 0)
			{
				$sql_delete = mysqli_query($con,"DELETE FROM tbl_giohang WHERE sanpham_id = '$sanpham_id' " );
			}
			$sql_update = mysqli_query($con,"UPDATE tbl_giohang SET soluong = '$soluong' WHERE sanpham_id = '$sanpham_id' " );
			// $sql_size = mysqli_query($con,"SELECT* FROM tbl_giohang WHERE sanpham_id = '$sanpham_id' AND size = '$size'");
			// $count_size = mysqli_num_rows($sql_size);
			// $subtotal1=0;
			// $total1 = 0; 
			// if($count_size > 1)
			// {
			// 	$sql_size_capnhat  = mysqli_query($con,"SELECT * FROM tbl_giohang WHERE sanpham_id = '$sanpham_id'");
			// 	 while ($row_fetch_size = mysqli_fetch_array($sql_size_capnhat)) {
							
			// 					$subtotal1 =  $row_fetch_size['soluong'];
			// 					$total1 += $subtotal1 ;

			// 				}
			// 	$sql_size = mysqli_query($con,"UPDATE tbl_giohang SET soluong = '$total1' WHERE sanpham_id = '$sanpham_id' AND size = '$size'");
			// }
		}
		
	}

	elseif (isset($_GET['xoa'])) {
		$id = $_GET['xoa'];
		$sql_delete = mysqli_query($con,"DELETE FROM tbl_giohang WHERE giohang_id = '$id'" );
	}
	elseif (isset($_GET['dangxuat'])) {
		$id = $_GET['dangxuat'];
		if($id==1)
		{
			unset($_SESSION['dangnhap_home']);	
			
		}
			
		
		
	}
	elseif (isset($_POST['thanhtoan'])) {
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		$note = $_POST['note'];
		$address = $_POST['address'];
		$giaohang = $_POST['giaohang'];
		$sql_khachhang = mysqli_query($con,"INSERT INTO tbl_khachhang(name,phone,email,address,note,giaohang,password) values ('$name','$phone','$email','$address','$note','$giaohang','$password')");
		if($sql_khachhang)
		{
			$sql_select_khachhang = mysqli_query($con,"SELECT*FROM tbl_khachhang ORDER BY khachhang_id DESC LIMIT 1");
			$mahang = rand(0,9999);
			$row_khachhang = mysqli_fetch_array($sql_select_khachhang);
			$khachhang_id = $row_khachhang['khachhang_id'];
			$_SESSION['dangnhap_home'] = $row_khachhang['name'];
			$_SESSION['khachhang_id'] = $khachhang_id;
			for($i=0;$i<count($_POST['thanhtoan_product_id']);$i++)
				{
					
					$sanpham_id = $_POST['thanhtoan_product_id'][$i];
					$soluong = $_POST['thanhtoan_soluong'][$i];
					$size = $_POST['thanhtoan_size'][$i];
					$sql_donhang = mysqli_query($con,"INSERT INTO tbl_donhang(sanpham_id,khachhang_id,soluong,mahang) values ('$sanpham_id','$khachhang_id','$soluong','$mahang')");
					$sql_giaodich = mysqli_query($con,"INSERT INTO tbl_giaodich(sanpham_id,soluong,magiaodich,khachhang_id,size) values ('$sanpham_id','$soluong','$mahang','$khachhang_id','$size')");
					$sql_delete_thanhtoan = mysqli_query($con,"DELETE FROM tbl_giohang WHERE sanpham_id = '$sanpham_id'" );
				}	
		}
	}elseif (isset($_POST['thanhtoandangnhap'])) {
		$khachhang_id = $_SESSION['khachhang_id'];
		$mahang = rand(0,9999);
		// $row_khachhang = mysqli_fetch_array($sql_select_khachhang);
		for($i=0;$i<count($_POST['thanhtoan_product_id']);$i++)
			{	
			$sanpham_id = $_POST['thanhtoan_product_id'][$i];
			$soluong = $_POST['thanhtoan_soluong'][$i];
			$size = $_POST['thanhtoan_size'][$i];
			$sql_donhang = mysqli_query($con,"INSERT INTO tbl_donhang(sanpham_id,khachhang_id,soluong,mahang) values ('$sanpham_id','$khachhang_id','$soluong','$mahang')");
			$sql_giaodich = mysqli_query($con,"INSERT INTO tbl_giaodich(sanpham_id,soluong,magiaodich,khachhang_id,size) values ('$sanpham_id','$soluong','$mahang','$khachhang_id','$size')");
			$sql_delete_thanhtoan = mysqli_query($con,"DELETE FROM tbl_giohang WHERE sanpham_id = '$sanpham_id'" );
			}	
		
	}
?>
<!-- checkout page -->
	<div class="privacy py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>G</span>iỏ hàng
			</h3>
			<?php 
				if(isset($_SESSION['dangnhap_home']))
				{
					echo '<p style="color:#000;">Xin chào '.$_SESSION['dangnhap_home'].' <a href = "?quanly=giohang&dangxuat=1" >Đăng xuất</a></p>';

				}
			?>
			<!-- //tittle heading -->
			<div class="checkout-right">
				<?php 
					$sql_lay_giohang = mysqli_query($con,"SELECT*FROM tbl_giohang ORDER BY giohang_id DESC");
				 ?>
				<div class="table-responsive">
					<form action="" method = "POST" style="margin: 900px auto; width: 1200px; ">
					<table class="timetable_sub">
						<thead>
							<tr>
								<th>Thứ tự</th>
								<th>Sản phẩm</th>
								<th>Số lượng</th>
								<th>Tên sản phẩm</th>
								<th>Size</th>
								<th>Giá</th>
								<th>Tổng giá</th>
								<th>Xóa</th>
							</tr>
						</thead>
						<tbody>
							
							<?php
							$i = 0;
							$subtotal = 0;
							$total = 0;
							 while ($row_fetch_giohang = mysqli_fetch_array($sql_lay_giohang)) {
								$i++;
								$subtotal = $row_fetch_giohang['soluong'] * $row_fetch_giohang['giasanpham'];
								$total += $subtotal ;
							?>
							<tr class="rem1">
								<td class="invert"><?php echo $i ?></td>
								<td class="invert-image">
									<a href="single.html">
										<img style="margin-left: -600px;margin-right: -600px;" src="/upload/<?php echo $row_fetch_giohang['hinhanh'] ?>" alt=" " class="img-responsive" >
									</a>
								</td>
								<td class="invert">
									<input style="width: 40px; text-align: center;" type="number" min="0" name="soluong[]" value="<?php echo $row_fetch_giohang['soluong'] ?>">
									<input style="width: 40px; text-align: center;" type="hidden" name="product_id[]" value="<?php echo $row_fetch_giohang['sanpham_id'] ?>">
								</td>
								<td class="invert"><?php echo $row_fetch_giohang['tensanpham'] ?></td>
								<td class="invert">
									<?php echo $row_fetch_giohang['size'] ?>
									
								</td>
								<td class="invert"><?php echo number_format($row_fetch_giohang['giasanpham']).' đ' ?></td>
								<td><?php echo number_format($subtotal).' đ' ?></td>
								<td class="invert">
									<a href="?quanly=giohang&xoa=<?php echo $row_fetch_giohang['giohang_id'] ?>" ><i style="color: black; " class="fas fa-trash-alt"></i></a>
								</td>
							</tr>
							<?php } ?>
							<tr><td colspan="8"><h5>Tổng tiền thanh toán: <?php echo number_format($total).' đ'?></td></tr>
							<tr><td colspan="8"><input type="submit" name = "capnhatgiohang"class="btn btn-success" value="Cập nhật giỏ hàng">
								<?php
								$sql_giohang_select = mysqli_query($con,"SELECT * FROM tbl_giohang");
								$count_giohang_Select = mysqli_num_rows($sql_giohang_select);
								 if(isset($_SESSION['dangnhap_home'])&& $count_giohang_Select>0){
								 	while($row_1 = mysqli_fetch_array($sql_giohang_select)){
								  ?>
								 <input type="hidden" name="thanhtoan_product_id[]" value="<?php echo $row_1['sanpham_id'] ?>">
								<input type="hidden" name="thanhtoan_soluong[]" value="<?php echo $row_1['soluong'] ?>">
								<input type="hidden" name="thanhtoan_size[]" value="<?php echo $row_1['size'] ?>">
							<?php }
							?>
								<input type="submit" class="btn btn-primary" value="Thanh toán giỏ hàng" name="thanhtoandangnhap"></td>
								<?php } ?>
							</tr>
						</tbody>
					</table>
					</form>
				</div>
			</div>
			<?php if(!isset($_SESSION['dangnhap_home'])){ 
			?>
			<div class="checkout-left">
				<div class="address_form_agile mt-sm-5 mt-4" ">
					<h4 class="mb-sm-4 mb-3" style="position: absolute; top:1200px;">Thêm thông tin giao hàng</h4>
					<form action="" method="POST" class="creditly-card-form agileinfo_form" style="position: relative;top: 400px; margin-bottom: 400px;right: 450px; ">
						<div class="creditly-wrapper wthree, w3_agileits_wrapper">
							<div class="information-wrapper">
								<div class="first-row">
									<div class="controls form-group">
										<input class="billing-address-name form-control" type="text" name="name" placeholder="Tên đầy đủ" required="" >
									</div>
									<div class="w3_agileits_card_number_grids">
										<div class="w3_agileits_card_number_grid_left form-group">
											<div class="controls">
												<input type="text" class="form-control" placeholder="Số điện thoại" name="phone" required="">
											</div>
										</div>
										<div class="w3_agileits_card_number_grid_right form-group">
											<div class="controls">
												<input class="form-control" type="text"  placeholder="Địa chỉ" name="address" required="">
											</div>
										</div>
									</div>
									<div class="controls form-group">
										<input type="text" class="form-control" placeholder="Email" name="email" required="">
									</div>
									<div class="controls form-group">
										<input type="password" class="form-control" placeholder="Password" name="password" required="">
									</div>
									<div class="controls form-group">
										<textarea style="resize: none; width: 200px;" class="form-control" placeholder="Ghi chú" name="note" required=""></textarea>
										
									</div>
									<div class="controls form-group">
										<select class="option-w3ls" style="width: 660px" name="giaohang" ;>
											<option>Kiểu thanh toán</option>
											<option value="1">Thanh toán ATM</option>
											<option value="0">Thanh toán trực tiếp</option>
										</select>
									</div>
								</div>
								<?php 
									$sql_lay_giohang = mysqli_query($con,"SELECT * FROM tbl_giohang ORDER BY giohang_id DESC");
									while ($row_thanhtoan = mysqli_fetch_array($sql_lay_giohang)) {
										?>
										<input type="hidden" name="thanhtoan_product_id[]" value="<?php echo $row_thanhtoan['sanpham_id'] ?>">
										<input type="hidden" name="thanhtoan_soluong[]" value="<?php echo $row_thanhtoan['soluong'] ?>">
										<input type="hidden" name="thanhtoan_size[]" value="<?php echo $row_thanhtoan['size'] ?>">


								<?php	
									}
								 ?>
								<input type="submit" name="thanhtoan" value="Thanh toán" class="btn btn-success" style="width:30%;">
							</div>
						</div>
					</form>
					
				</div>
			</div>
		<?php } ?>
		</div>
	</div>
	<!-- //checkout page -->