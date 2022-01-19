<?php 
  session_start();
  if(!isset($_SESSION['dangnhap'])){
    header('Location: index.php');
  }
  if (isset($_GET['login'])) {
    $dangxuat = $_GET['login'];
  }else{
    $dangxuat = '';
  }
  if($dangxuat == 'dangxuat'){
    session_destroy();
    header('Location: index.php');
  }
?>
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
	if(isset($_POST['thembaiviet'])){
    $tenbaiviet = $_POST['tenbaiviet'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $danhmuc = $_POST['danhmuc'];
    $chitiet = $_POST['chitiet'];
    $mota = $_POST['mota'];
    $path = '../upload/';
    $sql_insert_product = mysqli_query($con,"INSERT INTO tbl_baiviet(tenbaiviet,tomtat,noidung,danhmuctin_id,baiviet_image) values ('$tenbaiviet','$mota','$chitiet','$danhmuc','$hinhanh')");
    move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
  }
  elseif (isset($_POST['capnhatbaiviet'])) {
    $id_update = $_POST['id_update'];
   $tenbaiviet = $_POST['tenbaiviet'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $danhmuc = $_POST['danhmuc'];
    $chitiet = $_POST['chitiet'];
    $mota = $_POST['mota'];
    $path = '../upload/';
    #head!er('Location:xulydanhmuc.php');
    if($hinhanh==''){
      $sql_update_no_image =  "UPDATE tbl_baiviet SET tenbaiviet='$tenbaiviet',noidung='$chitiet',tomtat='$mota',danhmuctin_id='$danhmuc' WHERE baiviet_id = '$id_update'";
    }else{
      move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
      $sql_update_no_image =  "UPDATE tbl_baiviet SET tenbaiviet='$tenbaiviet',noidung='$chitiet',tomtat='$mota',danhmuctin_id='$danhmuc',baiviet_image='$hinhanh' WHERE baiviet_id = '$id_update'";
    }
    mysqli_query($con,$sql_update_no_image);
  }
  if(isset($_GET['xoa'])){
    $id = $_GET['xoa'];
    $sql_xoa = mysqli_query($con,"DELETE FROM tbl_baiviet WHERE baiviet_id = '$id'");
  }
	
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="../css1/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
  <p>Xin chào <?php echo $_SESSION['dangnhap'] ?> <a href="?login=dangxuat">Đăng xuất</a></p>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="xulydonhang.php">Đơn hàng <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="xulydanhmuc.php">Danh mục</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="xulydanhmucbaiviet.php">Danh mục bài viết</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="xulybaiviet.php">Bài viết</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="xulysanpham.php">Sản phẩm</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="xulykhachhang.php">Khách hàng</a>
      </li>
    </ul>
  </div>
</nav>
	   <div class="container">
      
        <div class="row">
        <?php 
            if (isset($_GET['quanly'])) {
              $capnhat = $_GET['quanly'];
            }else
            {
              $capnhat = '';
            }
            if ($capnhat == 'capnhat') {
              $id_capnhat =  $_GET['capnhat_id'];
              $sql_capnhat = mysqli_query($con,"SELECT * FROM tbl_baiviet WHERE baiviet_id = '$id_capnhat'");
              $row_capnhat = mysqli_fetch_array($sql_capnhat);
              $id_category_1 = $row_capnhat['danhmuctin_id'];
            ?>
            <div class="col-md-4">
            <h4>Cập nhật bài viết</h4>
            
            <form action="" method="POST" enctype= "multipart/form-data">
              <label>Tên bài viết</label>
                <input type="text" name="tenbaiviet" class="form-control" value="<?php echo $row_capnhat['tenbaiviet'] ?>">
                <input type="hidden" name="id_update" class="form-control" value="<?php echo $row_capnhat['baiviet_id'] ?>">
                <label>Hình ảnh</label>
                <input type="file" name="hinhanh" class="form-control">
                <img src="../upload/<?php echo $row_capnhat['baiviet_image'] ?>" height = "80" width = "80" ><br>
                <label>Mô tả</label>
                <textarea class="form-control" name="mota" ><?php echo $row_capnhat['tomtat'] ?></textarea>
                <label>Chi tiết</label>
                <textarea class="form-control" name="chitiet" ><?php echo $row_capnhat['noidung'] ?></textarea>
                <label>Danh mục</label>
                <select name="danhmuc" class="form-control">
                  <option value="0">-------Chọn danh mục-------</option>
                  <?php 
                      $sql_danhmuc = mysqli_query($con,"SELECT * FROM tbl_danhmuc_tin ORDER BY danhmuctin_id DESC");
                      while ($row_danhmuc = mysqli_fetch_array($sql_danhmuc)) {
                        if($id_category_1==$row_danhmuc['danhmuctin_id']){
                        
                   ?>
                  <option selected value="<?php echo $row_danhmuc['danhmuctin_id'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                  <?php 
                      }else{
                      ?>
                  <option value="<?php echo $row_danhmuc['danhmuctin_id'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                <?php }} ?>
                </select>
                <br>
                <input type="submit" name="capnhatbaiviet" value="Cập nhật bài viết" class="btn btn-success">
            </form>
          
          </div>
          <?php
            }  
          
           else{?>
          
            <div class="col-md-4">
            <h4>Thêm bài viết</h4>
            
            <form action="" method="POST" enctype= "multipart/form-data">
              <label>Tên sản phẩm</label>
                <input type="text" name="tenbaiviet" class="form-control" placeholder="Tên bài viết">
                <label>Hình ảnh</label>
                <input type="file" name="hinhanh" class="form-control">
                <label>Mô tả</label>
                <textarea class="form-control" name="mota"></textarea>
                <label>Chi tiết</label>
                <textarea class="form-control" name="chitiet"></textarea>
                <label>Danh mục</label>
                <select name="danhmuc" class="form-control">
                  <option value="0">-------Chọn danh mục-------</option>
                  <?php 
                      $sql_danhmuc = mysqli_query($con,"SELECT * FROM tbl_danhmuc_tin ORDER BY danhmuctin_id DESC");
                      while ($row_danhmuc = mysqli_fetch_array($sql_danhmuc)) {
                        
                   ?>
                  <option value="<?php echo $row_danhmuc['danhmuctin_id'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                  <?php 
                      }?>
                </select>
                <br>
                <input type="submit" name="thembaiviet" value="Thêm bài viết" class="btn btn-success">
            </form>
          
          </div>
        <?php
            }  
          ?>
        <div class="col-md-8">
          <h4>Liệt kê bài viết</h4>
          <?php  
            $sql_select_bv= mysqli_query($con,"SELECT * FROM tbl_baiviet,tbl_danhmuc_tin WHERE tbl_baiviet.danhmuctin_id = tbl_danhmuc_tin.danhmuctin_id ORDER BY tbl_baiviet.baiviet_id DESC");
            $i = 0;
          ?>
          <table class="table  table-bordered">
            <tr>
              <th>Thứ tự</th>
              <th>Tên bài viết</th>
              <th>Hình ảnh</th>
              <th>Danh mục</th>
              <th>Quản lý</th>
            </tr>
            <?php 
             while($row_bv = mysqli_fetch_array($sql_select_bv)) {
                $i++;
            ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $row_bv['tenbaiviet'] ?></td>
              <td><img style="width: 30px;height: 40px;" src="../upload/<?php echo $row_bv['baiviet_image'] ?>" > </td>
             
              <td><?php echo $row_bv['tendanhmuc'] ?></td>
              
              <td><a href="?xoa=<?php echo $row_bv['baiviet_id'] ?>">Xóa</a> || <a href="xulybaiviet.php?quanly=capnhat&capnhat_id=<?php echo $row_bv['baiviet_id'] ?>">Cập nhật</a>
              </td>
            </tr>
             <?php

              }
              ?>
          </table>
        </div>
       </div>
     </div>
</body>
</html>