<?php
require_once("../include/initialize.php");
  if(!isset($_SESSION['ACCOUNT_ID'])){
  redirect(web_root."index.php");
}
?>
<?php  
    require_once  'phpqrcode/qrlib.php';
    $path = 'photo/';
    $file = $path.uniqid().".png";
    $student = New Student();
 
    $studentid = $_POST['studentid'];
    $student = New Student();
    $res = $student->select_student($studentid);

    QRcode::png( $res->EmployeeID, $file, 'L', 8, 2);

   ?>
    
  <style type="text/css">
  #img_profile{
    width: 100%;
    height:auto;
  }
    #img_profile >  a > img {
    width: 100%;
    height:auto;
}


  </style>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Attendance Monitoring System</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="<?php echo web_root; ?>css/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo web_root; ?>css/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo web_root; ?>css/css/animate.min.css" rel="stylesheet">
    <link href="<?php echo web_root; ?>css/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo web_root; ?>css/css/main.css" rel="stylesheet">
    <link href="<?php echo web_root; ?>css/css/responsive.css" rel="stylesheet">

    <link href="<?php echo web_root; ?>font-awesome/css/font-awesome.min.css" rel="stylesheet">

<link href="<?php echo web_root; ?>css/dataTables.bootstrap.css" rel="stylesheet">
<!-- // <script src="<?php echo web_root; ?>select2/select2.min.css"></script> ./ -->

<!-- datetime picker CSS -->
<link href="<?php echo web_root; ?>css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<link href="<?php echo web_root; ?>css/datepicker.css" rel="stylesheet" media="screen">


<link rel="stylesheet" href="<?php echo web_root; ?>select2/select2.min.css">

<link href="<?php echo web_root; ?>css/nav-button-custom.css" rel="stylesheet" media="screen">
</head>
<body onload="window.print()">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
  <div class="container">
           <div class="center wow fadeInDown">
                 <h2 class="page-header">Employee Identification Card</h2>
                <!-- <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p> -->
            </div>
               
            <div class="row">
                <div class="features">
                      <div class="col-sm-3 wow fadeInDown">

                              <!-- <div class="panel">            
                                <div id="img_profile" class="panel-body">
                                <a href="" data-target="#studentmodal" data-toggle="modal" >
                                <img title="profile image" class="img-hover"    src="<?php echo web_root. 'student/'.  $res->StudPhoto; ?>">
                                </a>
                                 </div>
                              <ul class="list-group">
                              
                             
                                   <li class="list-group-item text-right"><span class="pull-left"><strong>Real name</strong></span> <?php echo $res->Firstname .' '.$res->Lastname; ?> </li>
                                  <li class="list-group-item text-right"><span class="pull-left"><strong>Course</strong></span> <?php echo $resCourse->CourseCode; ?> </li>
                                  <li class="list-group-item text-right"><span class="pull-left"><strong>Year Level</strong></span> <?php echo $res->YearLevel; ?> </li>
                                    
                                
                              </ul>  -->
                                    
                            </div>
                          
                          <div  style="border: 2px solid green;
                                        border-radius: 8px;
                                        width: 400px;
                                        margin: auto;
                               
                               padding: 5px;">  
                          <table style="margin: auto;
                                height: 100px;
                                        
                                        " >
                            <tr >
                              <td rowspan="3" >
                                <div class="panel">            
                                <div id="img_profile" class="panel-body">
                                <a href="" data-target="#studentmodal" data-toggle="modal" >
                                <img title="profile image" class="img-hover"    src="<?php echo web_root. 'student/'.  $res->StudPhoto; ?>" style="width:50px;height:50px;">
                                </a>
                                 </div>
                              </td>
                              <td style="padding-left: 5px;"><label>Id :</label></td>
                              <td >
                              <label><?php echo $res->EmployeeID; ?></label>
                              </td>

                            </tr>

                    
                            <tr>
                              <td style="padding-left: 5px;"><label>Name :</label></td>
                              <td>
                                <label><?php echo  $res->Firstname; ?></label>
                                <label><?php echo $res->Middlename; ?></label>
                                <label><?php echo $res->Lastname; ?></label>
                              </td> 
                             
                            </tr>
                            <tr>
                              <td style="padding-left: 5px;"><label>Age:</label></td>
                              <td>
                                <label><?php echo  $res->Age; ?></label>
                                
                              </td> 
                             
                            </tr>
                          </table></div>
                          <h2 style="text-align: center;
                                      font-weight: bold;">This is your QR Code</h3>
                          <div style="border: 2px solid green;
                                        border-radius: 8px;
                                        width: 215px;
                                        margin: auto;
                                        padding: 5px;">
                          <table>
                            <tr>
                              <td>
                                <?php echo "<img src = '".$file."' >";  ?>
                              </td>
                            </tr>
                          </table>
                          </div>
                        </div>

                             
                            <!--/col-3-->
                     
 
       
                
                </div><!--/.services-->
            </div><!--/.row-->  
        </div><!--/.container-->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
<footer>
</footer>
</html>