<?php 
		$sql_slider = mysqli_query($con,"SELECT * FROM tbl_slider WHERE slider_active = '1' ORDER BY slider_id ");
		
	?>
	<div class="slideshow-container">
	<?php
$i=0;
	 while ($row_slider = mysqli_fetch_array($sql_slider)) { ?>
	<div class="mySlides fade">
 		<!--<div class="numbertext"></div>-->
 		
  		<img src="/upload/<?php echo $row_slider['slider_image'] ?>" style="width:100%; height: 500px;">
  		<!-- <div class="text"><p><?php echo $row_slider['slider_caption']?></p></div> -->

	</div>
	<?php
	 $i++;} 
	 ?>
	
	<!--<div class="mySlides fade">
  		<div class="numbertext">2 / 3</div>
  		<img src="/hinhanh/giay2.jpg" style="width:100%; height: 500px;">
  	<div class="text">Caption Two</div>
	</div>

	<div class="mySlides fade">
  		<div class="numbertext">3 / 3</div>
  		<img src="/hinhanh/giay1.png" style="width:100%;height: 500px;">
 		<div class="text">Caption Three</div>
	</div>-->
	
	<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
	<a class="next" onclick="plusSlides(1)">&#10095;</a>

	</div>

	<div style="text-align:center" class="bacham">
  		<?php
    		for($e = 1; $e <= $i; $e++){
        	echo '<span class="dot"></span>';
    		}
		?>

  		
	</div>