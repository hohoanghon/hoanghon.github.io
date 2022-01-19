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
  if (isset($_POST['capnhatfooter'])) {
    
    $noidung = $_POST['noidung'];
   
    header('Location:xulyfooter.php');
    // if($hinhanh==''){
    //   $sql_update_no_image =  "UPDATE tbl_sanpham SET sanpham_name='$tensanpham',sanpham_chitiet='$chitiet',sanpham_mota='$mota',sanpham_gia='$giasanpham',sanpham_giakhuyenmai='$giakhuyenmai',sanpham_soluong='$soluong',sanpham_hot='$tuychon',category_id='$danhmuc' WHERE sanpham_id = '$id_update'";
    // }else{
    //   move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
    //   move_uploaded_file($hinhanh2_tmp,$path.$hinhanh2);
    //   move_uploaded_file($hinhanh3_tmp,$path.$hinhanh3);
    //   $sql_update_no_image =  "UPDATE tbl_sanpham SET sanpham_name='$tensanpham',sanpham_chitiet='$chitiet',sanpham_mota='$mota',sanpham_gia='$giasanpham',sanpham_giakhuyenmai='$giakhuyenmai',sanpham_soluong='$soluong',sanpham_image='$hinhanh',sanpham_hot='$tuychon',category_id='$danhmuc',sanpham_image2='$hinhanh2',sanpham_image3='$hinhanh3' WHERE sanpham_id = '$id_update'";
    // }
   
      $sql_update_footer =  "UPDATE tbl_footer SET noidung = '$noidung'";
      mysqli_query($con,$sql_update_footer);
    
    // mysqli_query($con,$sql_update_no_image);
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
                            <h4>Cập nhật footer</h4>
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
                <div class="container-fluid">

                    <div class="row">
                            <?php 
                                
                                  $sql_capnhat = mysqli_query($con,"SELECT * FROM tbl_footer");
                                  $row_capnhat = mysqli_fetch_array($sql_capnhat);
                                ?>
                                <div class="col-md-10">
                                
                                
                                <form action="" method="POST">
                                 <label>Nội dung footer</label>
                                    <textarea class="form-control" name="noidung" rows="4" cols="50"><?php echo $row_capnhat['noidung'] ?></textarea>
                                      
                                      
                                    <br>
                                    <input type="submit" name="capnhatfooter" value="Cập nhật footer" class="btn btn-success" >
                                </form>
                              
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