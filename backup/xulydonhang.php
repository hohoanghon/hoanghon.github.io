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
    if(isset($_POST['capnhatdonhang'])){
      $xuly = $_POST['xuly'];
      $mahang = $_POST['mahang_xuly'];
      $sql_update_donhang = mysqli_query($con,"UPDATE tbl_donhang SET tinhtrang ='$xuly' WHERE mahang='$mahang'");
      $sql_update_giaodich = mysqli_query($con,"UPDATE tbl_giaodich SET tinhtrangdon ='$xuly' WHERE magiaodich='$mahang'");
    }

	// if(isset($_POST['themdanhmuc'])){
 //    $tendanhmuc = $_POST['danhmuc'];
 //    $sql_insert = mysqli_query($con,"INSERT INTO tbl_category(category_name) values ('$tendanhmuc')");
 //  }elseif (isset($_POST['capnhatdanhmuc'])) {
 //    $id_post = $_POST['id_danhmuc'];
 //    $tendanhmuc = $_POST['danhmuc'];
 //    $sql_update = mysqli_query($con,"UPDATE tbl_category SET category_name='$tendanhmuc' WHERE category_id='$id_post'");
 //    header('Location:xulydanhmuc.php');
 //  }
  if(isset($_GET['xoadonhang'])){
    $mahang = $_GET['xoadonhang'];
    $sql_delete = mysqli_query($con,"DELETE FROM tbl_donhang WHERE mahang = '$mahang'");
    header('Location:xulydonhang.php');
  }
	if(isset($_GET['xacnhanhuy'])&&isset($_GET['mahang'])){
    $huydon = $_GET['xacnhanhuy'];  
    $magiaodich = $_GET['mahang'];
  }else{
    $huydon = '';
    $magiaodich ='';
  }
  $sql_update_donhang = mysqli_query($con,"UPDATE tbl_donhang SET huydon ='$huydon' WHERE mahang='$magiaodich'");
  $sql_update_giaodich = mysqli_query($con,"UPDATE tbl_giaodich SET huydon ='$huydon' WHERE magiaodich='$magiaodich'");
?>
<!DOCTYPE html>
<html>
<head>
	<title>????n h??ng</title>
	<link href="../css1/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
  <p>Xin ch??o <?php echo $_SESSION['dangnhap'] ?> <a href="?login=dangxuat">????ng xu???t</a></p>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="xulydonhang.php">????n h??ng <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="xulydanhmuc.php">Danh m???c</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="xulydanhmucbaiviet.php">Danh m???c b??i vi???t</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="xulybaiviet.php">B??i vi???t</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="xulysanpham.php">S???n ph???m</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="xulykhachhang.php">Kh??ch h??ng</a>
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
        if ($capnhat == 'xemdonhang') {
          $mahang =  $_GET['mahang'];
          $sql_chitiet = mysqli_query($con,"SELECT * FROM tbl_donhang,tbl_sanpham WHERE tbl_donhang.sanpham_id=tbl_sanpham.sanpham_id AND tbl_donhang.mahang = '$mahang'");
          

       ?>  
       <div class="col-md-7">
          <p>Xem chi ti???t ????n h??ng</p>
          <form method="POST" action="">
          <table class="table  table-bordered">
            <tr>
              <th>Th??? t???</th>
              <th>M?? h??ng</th>
              <th>T??n s???n ph???m</th>
              <th>S??? l?????ng</th>
              <th>????n gi??</th>
              <th>T???ng ti???n</th>
              <!-- <th>T??n kh??ch h??ng</th> -->
              <th>Ng??y ?????t</th>
              </tr>
            <?php 
              $i = 0;
              while ($row_donhang = mysqli_fetch_array($sql_chitiet)) {
                $i++;
            ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $row_donhang['mahang']; ?></td>
              <td><?php echo $row_donhang['sanpham_name']; ?></td>
              <td><?php echo $row_donhang['soluong']; ?></td>
              <td><?php echo number_format($row_donhang['sanpham_giakhuyenmai']); ?>
              <td><?php echo number_format($row_donhang['soluong']*$row_donhang['sanpham_giakhuyenmai']).' ??'; ?></td>
              <!-- <td><?php echo $row_donhang['name']; ?></td> --> 
              <td><?php echo $row_donhang['ngaythang'] ?></td>
              <input type="hidden" name="mahang_xuly" value="<?php echo $row_donhang['mahang'] ?>">
              
            </tr>
              <?php

              }
              ?>
          </table>
          <select class="form-control" name="xuly">
            <option value="1"> ???? x??? l?? | Giao h??ng</option>
            <option value="0">Ch??a x??? l??</option>
          </select>
          <br>
          <input type="submit" name="capnhatdonhang" value="C???p nh???t ????n h??ng" class="btn btn-success">
        </form>
          </div>
          <?php }else{
          ?> 
            <div class="col-md-7">
              <p>????n h??ng</p>  
          </div>
          <?php
            }  
          ?>
        
        <div class="col-md-5">
          <h4>Li???t k?? ????n h??ng</h4>
          <?php 
            $sql_select = mysqli_query($con,"SELECT * FROM tbl_sanpham,tbl_donhang,tbl_khachhang WHERE tbl_donhang.sanpham_id=tbl_sanpham.sanpham_id AND tbl_donhang.khachhang_id=tbl_khachhang.khachhang_id  GROUP BY mahang");
           ?>
          <table class="table  table-bordered">
            <tr>
              <th>Th??? t???</th>
             <!--  <th>T??n s???n ph???m</th>
              <th>S??? l?????ng</th> -->
              <th>M?? h??ng</th>
              <th>T??nh tr???ng ????n h??ng</th>
              <th>T??n kh??ch h??ng</th>
              <th>Ng??y ?????t</th>
              <th>Ghi ch??</th>
              <th>H???y ????n</th>
              <th>Qu???n l??</th>
            </tr>
            <?php 
              $i = 0;
              while ($row_donhang = mysqli_fetch_array($sql_select)) {
                $i++;
            ?>
            <tr>
              <td><?php echo $i; ?></td>
              <!-- <td><?php echo $row_donhang['sanpham_name']; ?></td>
              <td><?php echo $row_donhang['soluong']; ?></td> -->
              <td><?php echo $row_donhang['mahang']; ?></td>
              <td><?php 
                if($row_donhang['tinhtrang'] ==0)
                  {
                    echo 'Ch??a x??? l??';
                  }
                else{
                  echo '???? x??? l??';
                }
              ?></td>
              <td><?php echo $row_donhang['name']; ?></td>
              <td><?php echo $row_donhang['ngaythang'] ?></td>
              <td><?php echo $row_donhang['note'] ?></td>
              <td><?php if($row_donhang['huydon']==0) {} elseif($row_donhang['huydon']==1) {
                echo '<a href="xulydonhang.php?quanly=xemdonhang&mahang='.$row_donhang['mahang'].'&xacnhanhuy=2">X??c nh???n h???y ????n</a>';
              }else{
                echo '???? h???y';
              }?></td>
              <td><a href="?xoadonhang=<?php echo $row_donhang['mahang'] ?>">X??a</a> || <a href="?quanly=xemdonhang&mahang=<?php echo $row_donhang['mahang'] ?>">Xem ????n h??ng</a>
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