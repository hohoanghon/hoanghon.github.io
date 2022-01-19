<?php 
	if (isset($_GET['id_danhmuc'])) {
		$id_danhmuc = $_GET['id_danhmuc'];
	}
	else{
		$id_danhmuc = '';
	}
?>
<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="index.php">Trang chủ</a>
						<i>|</i>
					</li>
					<?php  
						$sql_tendanhmuc = mysqli_query($con,"SELECT * FROM  tbl_danhmuc_tin WHERE danhmuctin_id='$id_danhmuc' ");
						$row_danh = mysqli_fetch_array($sql_tendanhmuc);
					 ?>
					<li><?php echo $row_danh['tendanhmuc'] ?></li>
				</ul>
			</div>
		</div>
	</div>
<!-- about -->
	<div class="welcome py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<?php  
						$sql_tendanhmuc1 = mysqli_query($con,"SELECT * FROM  tbl_danhmuc_tin WHERE danhmuctin_id='$id_danhmuc' ");
						$row_danh1 = mysqli_fetch_array($sql_tendanhmuc1);
					 ?>
			<h2 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<?php echo $row_danh1['tendanhmuc'] ?></h2>
			<!-- //tittle heading -->
			<?php  
				$sql_baiviet = mysqli_query($con,"SELECT * FROM tbl_danhmuc_tin,tbl_baiviet WHERE tbl_danhmuc_tin.danhmuctin_id = tbl_baiviet.danhmuctin_id ANd tbl_danhmuc_tin.danhmuctin_id = '$id_danhmuc'");
				while($row_baiviet = mysqli_fetch_array($sql_baiviet)){
			?>
			<div class="row">
				<div class="col-lg-4 welcome-right-top mt-lg-0 mt-sm-5 mt-4">
					<img src="/hinhanh/<?php echo $row_baiviet['baiviet_image'] ?>" class="img-fluid" alt=" ">
				</div>
				<div class="col-lg-8 welcome-left">
					<h4 style="color: black;" ><a href="index.php?quanly=chitiettin&id_tin=<?php echo $row_baiviet['baiviet_id'] ?>&id_danhmuc=<?php echo $row_baiviet['danhmuctin_id']?>"  ><?php echo $row_baiviet['tenbaiviet'] ?></a></h4>
					<h6 class="my-sm-3 my-2"><?php echo $row_baiviet['tomtat'] ?></h6>
				</div>	
			</div><br>
		<?php } ?>
		</div>
	</div>
<!-- about -->