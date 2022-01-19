<?php 
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}else{
		$id = '';
	}
	$sql_chitiet = mysqli_query($con, "SELECT * FROM tbl_sanpham WHERE sanpham_id='$id'");
	$sql_chitiet_title = mysqli_query($con, "SELECT * FROM tbl_sanpham WHERE sanpham_id='$id'");
	$row_title = mysqli_fetch_array($sql_chitiet_title);
	$title = $row_title['sanpham_name'];
?>

<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="index.php">Trang chủ</a>
						<i>|</i>
					</li>
					<li><?php echo $title ?></li>
				</ul>
			</div>
		</div>
	</div>
<?php
	while ($row_chitiet = mysqli_fetch_array($sql_chitiet)) {
		
?>
<div class="banner-bootom-w3-agileits py-5">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			
			<!-- //tittle heading -->
			<div class="row">
				<div class="col-lg-5 col-md-8 single-right-left ">
					<div class="grid images_3_of_2">
						<div class="flexslider">
							<ul class="slides">
								<li data-thumb="/upload/<?php echo $row_chitiet['sanpham_image'] ?>">
									<div class="thumb-image">
										<img src="/upload/<?php echo $row_chitiet['sanpham_image'] ?>" data-imagezoom="true" class="img-fluid" alt=""> </div>
								</li>
								<li data-thumb="/upload/<?php echo $row_chitiet['sanpham_image2'] ?>">
									<div class="thumb-image">
										<img src="/upload/<?php echo $row_chitiet['sanpham_image2'] ?>" data-imagezoom="true" class="img-fluid" alt=""> </div>
								</li>
								<li data-thumb="/upload/<?php echo $row_chitiet['sanpham_image3'] ?>">
									<div class="thumb-image">
										<img src="/upload/<?php echo $row_chitiet['sanpham_image3'] ?>" data-imagezoom="true" class="img-fluid" alt=""> </div>
								</li>
								<li data-thumb="/upload/<?php echo $row_chitiet['sanpham_image4'] ?>">
									<div class="thumb-image">
										<img src="/upload/<?php echo $row_chitiet['sanpham_image4'] ?>" data-imagezoom="true" class="img-fluid" alt=""> </div>
								</li>
							</ul>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>

				<div class="col-lg-7 single-right-left simpleCart_shelfItem">
					<h3 class="mb-3"><?php echo $row_chitiet['sanpham_name'] ?></h3>
					<p class="mb-3">
						<span class="item_price"><?php echo number_format($row_chitiet['sanpham_giakhuyenmai']).' đ' ?></span>
						<del class="mx-2 font-weight-light"><?php echo number_format($row_chitiet['sanpham_gia']).' đ' ?></del>
						<label>Miễn phí vận chuyển</label>
					</p>
					<div class="single-infoagile">
						<p><?php echo $row_chitiet['sanpham_mota'] ?></p>
					</div><br><br>
					<div class="product-single-w3l">
						<br><br><p><?php echo $row_chitiet['sanpham_chitiet'] ?></p>
					</div>
					<div class="occasion-cart">
						<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
							<form action="?quanly=giohang" method="post">
								<fieldset>
									<input type="hidden" name="tensanpham" value="<?php echo $row_chitiet['sanpham_name'] ?>" />
									<input type="hidden" name="sanpham_id" value="<?php echo $row_chitiet['sanpham_id'] ?>" />
									<input type="hidden" name="giasanpham" value="<?php echo $row_chitiet['sanpham_gia'] ?>" />
									<input type="hidden" name="hinhanh" value="<?php echo $row_chitiet['sanpham_image'] ?>" />
									<input type="hidden" name="soluong" value="1" />
									<label style="position: absolute; top: 430px; right: 380px;" >Chọn Size</label>
									<select style = "position: absolute; top: 430px; right: 300px;" name="size">
										<option value="36" >36</option>
										<option value="37" >37</option>
										<option value="38" >38</option>
										<option value="39" >39</option>
										<option value="40" selected >40</option>
										<option value="41" >41</option>
										<option value="42" >42</option>
										<option value="43" >43</option>
										<option value="44" >44</option>
										
									</select>
									<input type="submit" name="themgiohang" value="Thêm vào giỏ hàng" class="button" style="position: absolute;
									top: 480px; right: 270px; width: 180px;" />
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>