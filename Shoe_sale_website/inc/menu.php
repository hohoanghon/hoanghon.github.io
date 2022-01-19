<?php
    $sql_category = mysqli_query($con,'SELECT * FROM tbl_category ORDER BY category_id DESC');
  ?>
<div id="menu">
		<ul>
		<li class="dmsp" tab-index="0"><a href="#">Danh mục sản phẩm </a><span class="iconreoder"><i class="fa fa-reorder"></i></span>
				<ul class="sub-menu1">
					<?php while($row_category = mysqli_fetch_array($sql_category)) {?>
					<li ><img src="/hinhanh/<?php echo $row_category['category_image'] ?>" width="30" height="20"><a href="?quanly=danhmuc&id=<?php echo $row_category['category_id'] ?>"><?php echo $row_category['category_name'] ?></a></li><?php }?>
					<!-- <li><img src="/hinhanh/nike.png" width="30" height="20"><a href="#">Giày Nike</a></li>
					<li><img style="margin-top: 15px;" src="/hinhanh/converse.png" width="30" height="14"><a href="#">Giày Converse</a></li>
					<li><img src="/hinhanh/puma.png" width="30" height="20"><a href="#">Giày Puma</a></li>
					<li><img src="/hinhanh/gucci.png" width="30" height="20"><a href="#">Giày Gucci</a></li>
					<li><img src="/hinhanh/balenciaga.png" width="30" height="20"><a href="#">Giày Balenciaga</a></li>-->
				</ul>
			</li>
  		<li><a href="index.php">Trang chủ</a></li>
      <li class="sub-menu-parent" tab-index="0"><a href="#">Tin tức</a>
        <?php 
          $sql_danhmuctin = mysqli_query($con,"SELECT * FROM tbl_danhmuc_tin ORDER BY danhmuctin_id DESC");
         ?>
  			<ul class="sub-menu ">
          <?php  
            while ($row_danhmuctin = mysqli_fetch_array($sql_danhmuctin)) {
              
          ?>
  				<li><a href="?quanly=tintuc&id_danhmuc=<?php echo $row_danhmuctin['danhmuctin_id'] ?>"><?php echo $row_danhmuctin['tendanhmuc'] ?></a></li>
        <?php } ?>
  				<!-- <li><a href="#">Tập luyện</a></li>
  				<li><a href="#">Chạy</a></li>
  				<li><a href="#">Bóng đá</a></li>
  				<li><a href="#">Ngoài trời</a></li>
  				<li><a href="#">Bóng rổ</a></li>
  				<li><a href="#">Quần vợt</a></li> -->
  			</ul>
  		</li>
  		<!-- <li class="sub-menu-parent" tab-index="0"><a href="">NỮ</a>
  			<ul class="sub-menu">
  				<li><a href="">Original</a></li>
  				<li><a href="">Tập luyện</a></li>
  				<li><a href="">Chạy</a></li>
  				<li><a href="">Bóng đá</a></li>
  				<li><a href="">Ngoài trời</a></li>
  				<li><a href="">Bóng rổ</a></li>
  				<li><a href="">Quần vợt</a></li>
  			</ul>
  		</li> -->
  		<!-- <li class="sub-menu-parent" tab-index="0"><a href="">TRẺ EM</a> 
  			<ul class="sub-menu">
  				<li><a href="">Original</a></li>
  				<li><a href=""> Ngoài trời</a></li>
  			</ul></li> -->
  		<li><a href="?quanly=sanphamhot">BÁN CHẠY</a> </li>
  		
	</ul>
	</div>