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
                    <span>Trang ch???</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
           

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="xulydonhang.php">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>????n h??ng </span>
                </a>
                
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
             <li class="nav-item">
                <a class="nav-link collapsed" href="xulydanhmuc.php" >
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Danh m???c</span>
                </a>
                
            </li>
             <li class="nav-item">
                <a class="nav-link collapsed" href="xulydanhmucbaiviet.php" >
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Danh m???c b??i vi???t</span>
                </a>
                
            </li>
             <li class="nav-item">
                <a class="nav-link collapsed" href="xulybaiviet.php" >
                    <i class="fas fa-fw fa-cog"></i>
                    <span>B??i vi???t</span>
                </a>
                
            </li>
             <li class="nav-item">
                <a class="nav-link collapsed" href="xulysanpham.php" >
                    <i class="fas fa-fw fa-cog"></i>
                    <span>S???n ph???m</span>
                </a>
                
            </li>
             <li class="nav-item">
                <a class="nav-link collapsed" href="xulykhachhang.php" >
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Kh??ch h??ng</span>
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
                            <h4>Qu???n l?? ????n h??ng</h4>
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
                                    ????ng xu???t
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container" >
      
        <div class="row" >
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
        
          <h4>Xem chi ti???t ????n h??ng</h4>
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
              <h4>????n h??ng</h4>  
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
                        <span aria-hidden="true">??</span>
                    </button>
                </div>
                <div class="modal-body">B???n c?? ch???c ch???n mu???n ????ng xu???t</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">H???y</button>
                    <a class="btn btn-primary" href="?login=dangxuat">????ng xu???t</a>
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