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
  if(isset($_POST['themsanpham'])){
    $tensanpham = $_POST['tensanpham'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $hinhanh2 = $_FILES['hinhanh2']['name'];
    $hinhanh2_tmp = $_FILES['hinhanh2']['tmp_name'];
    $hinhanh3 = $_FILES['hinhanh3']['name'];
    $hinhanh3_tmp = $_FILES['hinhanh3']['tmp_name'];
    $soluong = $_POST['soluong'];
    $giasanpham = $_POST['giasanpham'];
    $giakhuyenmai = $_POST['giakhuyenmai'];
    $danhmuc = $_POST['danhmuc'];
    $tuychon = $_POST['tuychon'];
    $chitiet = $_POST['chitiet'];
    $mota = $_POST['mota'];
    $path = '../upload/';
    $sql_insert_product = mysqli_query($con,"INSERT INTO tbl_sanpham(sanpham_name,sanpham_chitiet,sanpham_mota,sanpham_gia,sanpham_giakhuyenmai,sanpham_soluong,sanpham_image,sanpham_hot,category_id,sanpham_image2,sanpham_image3) values ('$tensanpham','$chitiet','$mota','$giasanpham','$giakhuyenmai','$soluong','$hinhanh','$tuychon','$danhmuc','$hinhanh2','$hinhanh3')");
    move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
    move_uploaded_file($hinhanh2_tmp,$path.$hinhanh2);
    move_uploaded_file($hinhanh3_tmp,$path.$hinhanh3);
  }
  elseif (isset($_POST['capnhatsanpham'])) {
    $id_update = $_POST['id_update'];
   $tensanpham = $_POST['tensanpham'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $hinhanh2 = $_FILES['hinhanh2']['name'];
    $hinhanh2_tmp = $_FILES['hinhanh2']['tmp_name'];
    $hinhanh3 = $_FILES['hinhanh3']['name'];
    $hinhanh3_tmp = $_FILES['hinhanh3']['tmp_name'];
    $soluong = $_POST['soluong'];
    $giasanpham = $_POST['giasanpham'];
    $giakhuyenmai = $_POST['giakhuyenmai'];
    $danhmuc = $_POST['danhmuc'];
    $tuychon = $_POST['tuychon'];
    $chitiet = $_POST['chitiet'];
    $mota = $_POST['mota'];
    $path = '../upload/';
    header('Location:xulysanpham.php');
    // if($hinhanh==''){
    //   $sql_update_no_image =  "UPDATE tbl_sanpham SET sanpham_name='$tensanpham',sanpham_chitiet='$chitiet',sanpham_mota='$mota',sanpham_gia='$giasanpham',sanpham_giakhuyenmai='$giakhuyenmai',sanpham_soluong='$soluong',sanpham_hot='$tuychon',category_id='$danhmuc' WHERE sanpham_id = '$id_update'";
    // }else{
    //   move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
    //   move_uploaded_file($hinhanh2_tmp,$path.$hinhanh2);
    //   move_uploaded_file($hinhanh3_tmp,$path.$hinhanh3);
    //   $sql_update_no_image =  "UPDATE tbl_sanpham SET sanpham_name='$tensanpham',sanpham_chitiet='$chitiet',sanpham_mota='$mota',sanpham_gia='$giasanpham',sanpham_giakhuyenmai='$giakhuyenmai',sanpham_soluong='$soluong',sanpham_image='$hinhanh',sanpham_hot='$tuychon',category_id='$danhmuc',sanpham_image2='$hinhanh2',sanpham_image3='$hinhanh3' WHERE sanpham_id = '$id_update'";
    // }
    if($hinhanh!='')
      {move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
      $sql_update_no_image =  "UPDATE tbl_sanpham SET sanpham_name='$tensanpham',sanpham_chitiet='$chitiet',sanpham_mota='$mota',sanpham_gia='$giasanpham',sanpham_giakhuyenmai='$giakhuyenmai',sanpham_soluong='$soluong',sanpham_image='$hinhanh',sanpham_hot='$tuychon',category_id='$danhmuc' WHERE sanpham_id = '$id_update'";
      mysqli_query($con,$sql_update_no_image);
    }
    if($hinhanh2!='')
      {move_uploaded_file($hinhanh2_tmp,$path.$hinhanh2);
      $sql_update_no_image =  "UPDATE tbl_sanpham SET sanpham_name='$tensanpham',sanpham_chitiet='$chitiet',sanpham_mota='$mota',sanpham_gia='$giasanpham',sanpham_giakhuyenmai='$giakhuyenmai',sanpham_soluong='$soluong',sanpham_image2='$hinhanh2',sanpham_hot='$tuychon',category_id='$danhmuc' WHERE sanpham_id = '$id_update'";
      mysqli_query($con,$sql_update_no_image);
      }
     if($hinhanh3!='')
      {move_uploaded_file($hinhanh2_tmp,$path.$hinhanh2);
      $sql_update_no_image =  "UPDATE tbl_sanpham SET sanpham_name='$tensanpham',sanpham_chitiet='$chitiet',sanpham_mota='$mota',sanpham_gia='$giasanpham',sanpham_giakhuyenmai='$giakhuyenmai',sanpham_soluong='$soluong',sanpham_image3='$hinhanh3',sanpham_hot='$tuychon',category_id='$danhmuc' WHERE sanpham_id = '$id_update'";
      mysqli_query($con,$sql_update_no_image);
    }
    // mysqli_query($con,$sql_update_no_image);
  }
  if(isset($_GET['xoa'])){
    $id = $_GET['xoa'];
    $sql_xoa = mysqli_query($con,"DELETE FROM tbl_sanpham WHERE sanpham_id = '$id'");
  }
  
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
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
            if ($capnhat == 'capnhat') {
              $id_capnhat =  $_GET['capnhat_id'];
              $sql_capnhat = mysqli_query($con,"SELECT * FROM tbl_sanpham WHERE sanpham_id = '$id_capnhat'");
              $row_capnhat = mysqli_fetch_array($sql_capnhat);
              $id_category_1 = $row_capnhat['category_id'];
            ?>
            <div class="col-md-4">
            <h4>C???p nh???t s???n ph???m</h4>
            
            <form action="" method="POST" enctype= "multipart/form-data">
              <label>T??n s???n ph???m</label>
                <input type="text" name="tensanpham" class="form-control" value="<?php echo $row_capnhat['sanpham_name'] ?>">
                <input type="hidden" name="id_update" class="form-control" value="<?php echo $row_capnhat['sanpham_id'] ?>">
                <label>H??nh ???nh</label>
                <input type="file" name="hinhanh" class="form-control">
                <img src="../upload/<?php echo $row_capnhat['sanpham_image'] ?>" height = "80" width = "80" ><br>
                <label>H??nh ???nh 2</label>
                <input type="file" name="hinhanh2" class="form-control">
                <img src="../upload/<?php echo $row_capnhat['sanpham_image2'] ?>" height = "80" width = "80" ><br>
                <label>H??nh ???nh 3 </label>
                <input type="file" name="hinhanh3" class="form-control">
                <img src="../upload/<?php echo $row_capnhat['sanpham_image3'] ?>" height = "80" width = "80" ><br>
                <label>Gi??</label>
                <input type="text" name="giasanpham" class="form-control" value="<?php echo $row_capnhat['sanpham_gia'] ?>">
                <label>Gi?? khuy???n m??i</label>
                <input type="text" name="giakhuyenmai" class="form-control" value="<?php echo $row_capnhat['sanpham_giakhuyenmai'] ?>">
                <label>S??? l?????ng</label>
                <input type="text" name="soluong" class="form-control" value="<?php echo $row_capnhat['sanpham_name'] ?>"value="<?php echo $row_capnhat['sanpham_soluong'] ?>">
                <label>M?? t???</label>
                <textarea class="form-control" name="mota" ><?php echo $row_capnhat['sanpham_mota'] ?></textarea>
                <label>Chi ti???t</label>
                <textarea class="form-control" name="chitiet"><?php echo $row_capnhat['sanpham_chitiet'] ?></textarea>
                <label>T??y ch???n</label>
                <select name="tuychon" class="form-control">
                  <option value="1">M???c ?????nh</option>
                  <option value="0">Th??m v??o m???c hot</option>
                </select>
                <label>Danh m???c</label>
                <select name="danhmuc" class="form-control">
                  <option value="0">-------Ch???n danh m???c-------</option>
                  <?php 
                      $sql_danhmuc = mysqli_query($con,"SELECT * FROM tbl_category ORDER BY category_id DESC");
                      while ($row_danhmuc = mysqli_fetch_array($sql_danhmuc)) {
                        if($id_category_1==$row_danhmuc['category_id']){
                        
                   ?>
                  <option selected value="<?php echo $row_danhmuc['category_id'] ?>"><?php echo $row_danhmuc['category_name'] ?></option>
                  <?php 
                      }else{
                      ?>
                  <option value="<?php echo $row_danhmuc['category_id'] ?>"><?php echo $row_danhmuc['category_name'] ?></option>
                <?php }} ?>
                </select>
                <br>
                <input type="submit" name="capnhatsanpham" value="C???p nh???t s???n ph???m" class="btn btn-success">
            </form>
          
          </div>
          <?php
            }  
          
           else{?>
          
            <div class="col-md-4">
            <h4>Th??m s???n ph???m</h4>
            
            <form action="" method="POST" enctype= "multipart/form-data">
              <label>T??n s???n ph???m</label>
                <input type="text" name="tensanpham" class="form-control" placeholder="T??n s???n ph???m">
                <label>H??nh ???nh</label>
                <input type="file" name="hinhanh" class="form-control">
                <label>H??nh ???nh 2</label>
                <input type="file" name="hinhanh2" class="form-control">
                <label>H??nh ???nh 3</label>
                <input type="file" name="hinhanh3" class="form-control">
                <label>Gi??</label>
                <input type="text" name="giasanpham" class="form-control" placeholder="Gi?? s???n ph???m">
                <label>Gi?? khuy???n m??i</label>
                <input type="text" name="giakhuyenmai" class="form-control" placeholder="Gi?? khuy???n m??i">
                <label>S??? l?????ng</label>
                <input type="text" name="soluong" class="form-control" placeholder="S??? l?????ng">
                <label>M?? t???</label>
                <textarea class="form-control" name="mota"></textarea>
                <label>Chi ti???t</label>
                <textarea class="form-control" name="chitiet"></textarea>
                <label>T??y ch???n</label>
                <select name="tuychon" class="form-control">
                  <option value="1">M???c ?????nh</option>
                  <option value="0">Th??m v??o m???c hot</option>
                </select>
                <label>Danh m???c</label>
                <select name="danhmuc" class="form-control">
                  <option value="0">-------Ch???n danh m???c-------</option>
                  <?php 
                      $sql_danhmuc = mysqli_query($con,"SELECT * FROM tbl_category ORDER BY category_id DESC");
                      while ($row_danhmuc = mysqli_fetch_array($sql_danhmuc)) {
                        
                   ?>
                  <option value="<?php echo $row_danhmuc['category_id'] ?>"><?php echo $row_danhmuc['category_name'] ?></option>
                  <?php 
                      }?>
                </select>
                <br>
                <input type="submit" name="themsanpham" value="Th??m s???n ph???m" class="btn btn-success">
            </form>
          
          </div>
        <?php
            }  
          ?>
        <div class="col-md-8">
          <h4>Li???t k?? s???n ph???m</h4>
          <?php  
            $sql_select_sp= mysqli_query($con,"SELECT * FROM tbl_sanpham,tbl_category WHERE tbl_sanpham.category_id = tbl_category.category_id ORDER BY tbl_sanpham.sanpham_id DESC");
            $i = 0;
          ?>
          <table class="table  table-bordered">
            <tr>
              <th>Th??? t???</th>
              <th>T??n s???n ph???m</th>
              <th>H??nh ???nh</th>
              <th>S??? l?????ng</th>
              <th>Danh m???c</th>
              <th>Gi?? s???n ph???m</th>
              <th>Gi?? khuy???n m??i</th>
              <th>Qu???n l??</th>
            </tr>
            <?php 
             while($row_sp = mysqli_fetch_array($sql_select_sp)) {
                $i++;
            ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $row_sp['sanpham_name'] ?></td>
              <td><img style="width: 30px;height: 40px;" src="../upload/<?php echo $row_sp['sanpham_image'] ?>" > </td>
              <td><?php echo $row_sp['sanpham_soluong'] ?></td>
              <td><?php echo $row_sp['category_name'] ?></td>
              <td><?php echo number_format($row_sp['sanpham_gia']).' ??' ?></td>
              <td><?php echo number_format($row_sp['sanpham_giakhuyenmai']).' ??' ?></td>
              <td><a href="?xoa=<?php echo $row_sp['sanpham_id'] ?>">X??a</a> || <a href="xulysanpham.php?quanly=capnhat&capnhat_id=<?php echo $row_sp['sanpham_id'] ?>">C???p nh???t</a>
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