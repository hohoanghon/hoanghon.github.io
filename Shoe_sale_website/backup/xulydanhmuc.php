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
	if(isset($_POST['themdanhmuc'])){
    $tendanhmuc = $_POST['danhmuc'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
     $path = '../upload/';
    $sql_insert = mysqli_query($con,"INSERT INTO tbl_category(category_name,category_image) values ('$tendanhmuc','$hinhanh')");
     move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
  }elseif (isset($_POST['capnhatdanhmuc'])) {
    $id_post = $_POST['id_danhmuc'];
    $tendanhmuc = $_POST['danhmuc'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
     $path = '../upload/';
     if($hinhanh==''){
      $sql_update_no_image =  "UPDATE tbl_category SET category_name='$tendanhmuc' WHERE category_id = '$id_post'";
      header('Location:xulydanhmuc.php');
    }else{
      move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
     $sql_update_no_image =  "UPDATE tbl_category SET category_name='$tendanhmuc',category_image='$hinhanh' WHERE category_id = '$id_post'";
    }
    mysqli_query($con,$sql_update_no_image);
  }
  if(isset($_GET['xoa'])){
    $id = $_GET['xoa'];
    $sql_xoa = mysqli_query($con,"DELETE FROM tbl_category WHERE category_id = '$id'");
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
          $id_capnhat =  $_GET['id'];
          $sql_capnhat = mysqli_query($con,"SELECT * FROM tbl_category WHERE category_id = '$id_capnhat'");
          $row_capnhat = mysqli_fetch_array($sql_capnhat);
       ?>
          <div class="col-md-4">
            <h4>Cập nhật danh mục</h4>
            <label>Tên danh mục</label>
            <form action="" method="POST" enctype= "multipart/form-data">
                <input type="text" name="danhmuc" class="form-control" value="<?php echo $row_capnhat['category_name'] ?>">
                <input type="hidden" name="id_danhmuc" class="form-control" value="<?php echo $row_capnhat['category_id'] ?>">
                 
                 <label>Hình ảnh</label>
                <input type="file" name="hinhanh" class="form-control">
                <img src="../upload/<?php echo $row_capnhat['category_image'] ?>" height = "80" width = "80" ><br>
                <input type="submit" name="capnhatdanhmuc" value="Cập nhật danh mục" class="btn btn-success">
            </form>
          <?php }else{
          ?>
            <div class="col-md-4">
            <h4>Thêm danh mục</h4>
            <label>Tên danh mục</label>
            <form action="" method="POST" enctype= "multipart/form-data">
                <input type="text" name="danhmuc" class="form-control" placeholder="Tên danh mục">
               
                <label>Hình ảnh</label>
                <input type="file" name="hinhanh" class="form-control">
                 <input type="submit" name="themdanhmuc" value="Thêm danh mục" class="btn btn-success">
            </form>
          <?php
            }  
          ?>
          </div>
        
        <div class="col-md-8">
          <h4>Liệt kê danh mục</h4>
          <table class="table  table-bordered">
            <tr>
              <th>Thứ tự</th>
              <th>Tên danh mục</th>
              <th>Quản lý</th>
            </tr>
            <?php $sql_select= mysqli_query($con,"SELECT * FROM tbl_category ORDER BY category_id DESC");
              
              $i = 0;
              while ($row_category = mysqli_fetch_array($sql_select)) {
                $i++;
            ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $row_category['category_name'] ?></td>
              <td><a href="?xoa=<?php echo $row_category['category_id'] ?>">Xóa</a> || <a href="?quanly=capnhat&id=<?php echo $row_category['category_id'] ?>">Cập nhật</a>
              </td>
            </tr>
              <?php

              }
              ?>
          </table>
        </div>
       </div>
     </div>
   </div>
</body>
</html>