
		<?php
			$sql_footer = mysqli_query($con, "SELECT * FROM tbl_footer ");
			$row_footer = mysqli_fetch_array($sql_footer);
		?>
		<div class="footer-top-first" style="margin-top: 1000px;">
			<div class="container py-md-5 py-sm-4 py-3">
				<!-- footer first section -->
				<h2 class="footer-top-head-w3l font-weight-bold mb-2">HHH STORE :</h2>
				<p class="footer-main mb-4">
					<?php
						
						echo $row_footer['noidung'];
					?>
					</p>
				<!-- //footer first section -->
				<!-- footer second section -->
				<div class="row w3l-grids-footer border-top border-bottom py-sm-4 py-3">
					<div class="col-md-4 offer-footer">
						<div class="row">
							<div class="col-4 icon-fot">
								<i class="fas fa-dolly"></i>
							</div>
							<div class="col-8 text-form-footer">
								<h4>Miễn phí vận chuyển</h4>
								<p>đối với đơn hàng trên 2 triệu</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 offer-footer my-md-0 my-4">
						<div class="row">
							<div class="col-4 icon-fot">
								<i class="fas fa-shipping-fast"></i>
							</div>
							<div class="col-8 text-form-footer">
								<h4>Chuyển phát nhanh</h4>
								<p>Toàn quốc</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 offer-footer">
						<div class="row">
							<div class="col-4 icon-fot">
								<i class="far fa-thumbs-up"></i>
							</div>
							<div class="col-8 text-form-footer">
								<h4>Chất lượng</h4>
								<p> Hàng đầu</p>
							</div>
						</div>
					</div>
				</div>
				<!-- //footer second section -->
			</div>
		</div>
		<!-- footer third section -->
		