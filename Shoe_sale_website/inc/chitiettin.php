<?php 
	if (isset($_GET['id_tin'])) {
		
		$id_baiviet = $_GET['id_tin'];
	}
	else{
		$id_danhmuc = '';
		$id_baiviet = '';
	}
	if (isset($_GET['id_danhmuc'])) {
		$id_danhmuc = $_GET['id_danhmuc'];
	}
	else{
		$id_danhmuc='';
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
					 <li><a href="?quanly=tintuc&id_danhmuc=<?php echo $row_danh['danhmuctin_id'] ?>"><?php echo $row_danh['tendanhmuc'] ?></a></li><i>|</i>
					<?php  
						$sql_tenbaiviet = mysqli_query($con,"SELECT * FROM  tbl_baiviet WHERE baiviet_id='$id_baiviet' ");
						$row_bai = mysqli_fetch_array($sql_tenbaiviet);
					 ?>
					<li> <?php echo $row_bai['tenbaiviet'] ?></li>
				</ul>
			</div>
		</div>
	</div>
<!-- about -->
	<div class="welcome py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<?php  
				$sql_tenbaiviet1 = mysqli_query($con,"SELECT * FROM  tbl_baiviet WHERE baiviet_id='$id_baiviet' ");
				$row_bai1 = mysqli_fetch_array($sql_tenbaiviet1);
					 ?>
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<?php echo $row_bai1['tenbaiviet'] ?></h3>
			<!-- //tittle heading -->
			<?php  
				$sql_baiviet = mysqli_query($con,"SELECT * FROM tbl_baiviet WHERE baiviet_id = '$id_baiviet'");
				while($row_baiviet = mysqli_fetch_array($sql_baiviet)){
			?>
			<div class="row">
				<!-- <div class="col-lg-4 welcome-right-top mt-lg-0 mt-sm-5 mt-4">
					<img src="images/ab.jpg" class="img-fluid" alt=" ">
				</div> -->
				<div class="col-lg-12 welcome-left">
					<!-- <h4><a href="index.php?quanly=chitiettin&id_tin=<?php echo $row_baiviet['baiviet_id'] ?>"><?php echo $row_baiviet['tenbaiviet'] ?></a></h4> -->
					<h4 class="my-sm-3 my-2"><?php echo $row_baiviet['tomtat'] ?></h4>
					<img width="1100px" src="/hinhanh/<?php echo $row_baiviet['baiviet_image'] ?>" alt=" " >
					<p><?php echo $row_baiviet['noidung'] ?></p>
				</div>	
			</div><br>
		<?php } ?>
		</div>
	</div>
<!-- about -->