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
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HHH Store For Admin</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">HHH Store For Admin </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-home"></i>
                    <span>Trang chủ</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
           

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="xulydonhang.php">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Đơn hàng </span>
                </a>
                
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
             <li class="nav-item">
                <a class="nav-link collapsed" href="xulydanhmuc.php" >
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Danh mục</span>
                </a>
                
            </li>
             <li class="nav-item">
                <a class="nav-link collapsed" href="xulydanhmucbaiviet.php" >
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Danh mục bài viết</span>
                </a>
                
            </li>
             <li class="nav-item">
                <a class="nav-link collapsed" href="xulybaiviet.php" >
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Bài viết</span>
                </a>
                
            </li>
             <li class="nav-item">
                <a class="nav-link collapsed" href="xulysanpham.php" >
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Sản phẩm</span>
                </a>
                
            </li>
             <li class="nav-item">
                <a class="nav-link collapsed" href="xulykhachhang.php" >
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Khách hàng</span>
                </a>
                
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="xulyslider.php" >
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Slider</span>
                </a>
                
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="xulyfooter.php" >
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Footer</span>
                </a>
                
            </li>
            <!-- Divider -->
           

            <!-- Heading -->
            

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
           

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                     <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <h4>Quản lý bài viết</h4>
                        </div>
                    </form>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['dangnhap'] ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                               
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="?login=dangxuat" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Đăng xuất
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
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
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
           
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Bạn có chắc chắn muốn đăng xuất</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">HỦy</button>
                    <a class="btn btn-primary" href="?login=dangxuat">Đăng xuất</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>