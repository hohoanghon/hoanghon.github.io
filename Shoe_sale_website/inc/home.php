
<div class="ads-grid py-sm-5 py-4" style="margin-top: 0px;">
		<div class="container py-xl-4 py-lg-2">
			<div class="row">
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-9" style="position: relative; left: 350px;">
					<div class="wrapper">

						<?php $sql_cate_home = mysqli_query($con, "SELECT * FROM tbl_category ORDER BY  category_id DESC" ); 
							while($row_cate_home = mysqli_fetch_array($sql_cate_home)) {
								$id_category = $row_cate_home['category_id'];
						?>
						<!-- first section -->
						<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
							<h3 class="heading-tittle text-center font-italic"><?php echo $row_cate_home['category_name'] ?></h3>
							<div class="row">
								<?php $sql_product = mysqli_query($con,"SELECT*FROM tbl_sanpham WHERE sanpham_active = '1' ORDER BY sanpham_id DESC") ;
									while ($row_sanpham = mysqli_fetch_array($sql_product)) {
										if($row_sanpham['category_id'] == $id_category){
									
								?>
								<div class="col-md-4 product-men mt-5">
									<div class="men-pro-item simpleCart_shelfItem">
										<div class="men-thumb-item text-center">
											<img src="/upload/<?php echo $row_sanpham['sanpham_image']?>" alt="" width="240" height="180">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="?quanly=chitietsp&id=<?php echo $row_sanpham['sanpham_id'] ?>" class="link-product-add-cart" style="text-decoration: none;">Xem sản phẩm</a>
												</div>
											</div>
										</div>
										<div class="item-info-product text-center border-top mt-4">
											<h4 class="pt-1">
												<a href="?quanly=chitietsp&id=<?php echo $row_sanpham['sanpham_id'] ?>"><?php echo $row_sanpham['sanpham_name'] ?></a>
											</h4>
											<div class="info-product-price my-2">
												<span class="item_price"><?php echo number_format($row_sanpham['sanpham_giakhuyenmai']).' đ' ?></span>
												<del><?php echo number_format($row_sanpham['sanpham_gia'] ).' đ' ?></del>
											</div>
											<!-- <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
												<form action="?quanly=giohang" method="post">
													<fieldset>
														<input type="hidden" name="tensanpham" value="<?php echo $row_sanpham['sanpham_name'] ?>" />
														<input type="hidden" name="sanpham_id" value="<?php echo $row_sanpham['sanpham_id'] ?>" />
														<input type="hidden" name="giasanpham" value="<?php echo $row_sanpham['sanpham_gia'] ?>" />
														<input type="hidden" name="hinhanh" value="/upload/<?php echo $row_sanpham['sanpham_image'] ?>" />
														<input type="hidden" name="soluong" value="1" />
														<input type="hidden" name="size" value="40" />
														<input type="submit" name="themgiohang" value="Thêm vào giỏ hàng" class="button" style="position: absolute;
														top: 340px; right: 270px; width: 180px;" />
													</fieldset>
												</form>
											</div> -->
										</div>
									</div>
								</div>
								
								<?php }} ?>
							</div>
						</div>
					<?php } ?>
					</div>
				</div>
				<!-- //product left -->

				<!-- product right -->
<div class="col-lg-3 mt-lg-0 mt-4 p-lg-0" style="position: relatives; right:  850px; top :0px; width: 200px; box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);">
					<div class="side-bar p-sm-4 p-3">
						<div class="search-hotel border-bottom py-2">
							<h3 class="agileits-sear-head mb-3" style="padding-top: 10px; position: relative; top:-30px;">Tìm kiếm..</h3>
							<form action="index.php?quanly=timkiem" method="post" >
								<input type="search" placeholder="Tên sản phẩm..." name="search_product" required="" style="position: relative; right:455px; width: 250px; top: 40px;">
								<input type="submit" name="search_button" value=" "style="position: relative;right: 500px; top: 40px; padding-bottom: 0px;">
							</form>
						</div>
						
						<!-- danh muc san pham -->
						<div class="left-side border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Danh mục sản phẩm</h3>
							<ul>
								<?php $sql_category_sidebar = mysqli_query($con,'SELECT * FROM tbl_category ORDER BY category_id DESC');
									While($row_category_sidebar = mysqli_fetch_array($sql_category_sidebar)){
								 ?>
								<li>
									<!--<input type="checkbox" class="checked">-->
									<span class="span"><a href="?quanly=danhmuc&id=<?php echo $row_category_sidebar['category_id'] ?>"><?php echo $row_category_sidebar['category_name'] ?></a></span>
								</li>
							<?php } ?>
							</ul>
						</div>
						<!-- danh muc san pham -->
						<!-- tin tuc --> 
						<div class="left-side border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Tin tức</h3>
							<ul>
								<?php  
									$sql_baiviet = mysqli_query($con,"SELECT * FROM tbl_baiviet ORDER BY baiviet_id ASC");
									while($row_baiviet = mysqli_fetch_array($sql_baiviet)){
								?>
								<li>
									<!--<input type="checkbox" class="checked">-->
									<h6><a href="index.php?quanly=chitiettin&id_tin=<?php echo $row_baiviet['baiviet_id'] ?>&id_danhmuc=<?php echo $row_baiviet['danhmuctin_id']?>"><?php echo $row_baiviet['tenbaiviet'] ?></a></h6>
								
								</li>
								<br>
								<br>
							<?php } ?>
							</ul>
						</div>
						<!-- tin tuc -->
						<!-- best seller -->
						<div class="f-grid py-2">
							<h3 class="agileits-sear-head mb-3">Sản phẩm bán chạy</h3>
							<div class="box-scroll">
								<div class="scroll">

								<?php $sql_product_sidebar = mysqli_query($con,"SELECT*FROM tbl_sanpham WHERE sanpham_hot = '0' ORDER BY sanpham_id DESC") ;
									while ($row_sanpham_sidebar = mysqli_fetch_array($sql_product_sidebar)) {?>
									<div class="row">
										<div class="col-lg-3 col-sm-2 col-3 left-mar">
											<img src="/upload/<?php echo $row_sanpham_sidebar['sanpham_image'] ?>" alt="" class="img-fluid">
										</div>
										<div class="col-lg-9 col-sm-10 col-9 w3_mvd">
											<a href=""><?php echo $row_sanpham_sidebar['sanpham_name'] ?></a>
											<a href="" class="price-mar mt-2"><?php echo number_format($row_sanpham_sidebar['sanpham_giakhuyenmai']).' đ' ?></a>
											<del><?php echo number_format($row_sanpham_sidebar['sanpham_gia']).' đ' ?></del>
										</div>
									</div>
									<?php }?>
								</div>
							</div>
						</div>
						<!-- //best seller -->
					</div>
					<!-- //product right -->
				</div>
			</div>
		</div>
	</div>