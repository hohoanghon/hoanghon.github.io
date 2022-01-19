<?php
require_once("../include/initialize.php");
  if(!isset($_SESSION['ACCOUNT_ID'])){
  redirect(web_root."index.php");
}
$servername = "localhost";
                      $username = "root";
                      $password = "";
                      $dbname = "dbattendance";
?>
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
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h4 class="page-header ">
          <i class="fa fa"></i>Attendance Monitoring System
           <small class="pull-right">Printed Date: <?php echo date('m/d/Y'); ?></small>
        </h4>
      </div>
      <!-- /.col -->
    </div>
            <div class="center wow fadeInDown"> 
                  <h2 class="page-header">Attendance Report</h2>  
                <p class="lead"> 
                  <?php echo isset($_POST['attenddate']) ? 'As of '. $_POST['attenddate'] : '' ; ?><br/>
                  
                  <?php echo isset($_POST['events']) ?  'Event: '.  $_POST['events'] : '' ; ?>
                </p>
            </div>

                <div class="features">
                  <?php 

                  if (isset($_POST['attenddate'])) {
                    # code...
                   ?>
                   <table id="dash-table" class="table table-striped table-bordered table-hover " style="font-size:12px" cellspacing="0">
                
                  <thead>
                  <!-- <tr>
                    <th colspan="2"></th> 
                    <th colspan="2"><center>AM</center></th>
                    <th colspan="2"><center>PM</center></th>
                  </tr> -->
                    <tr>
                      <th>Employee</th>
                      <th>Date</th>
                      <th width="150px">Time-In</th>  
                      <th width="150px">Time-Out</th>
                      <th width="150px">Status</th>  
                      <!-- <th width="150px">Time-Out</th>   -->
                    </tr> 
                  </thead> 
                  <tbody>
                    <?php  
                      $conn = new mysqli($servername, $username, $password, $dbname);
                      @$attenddate = date_format(date_create($_POST['attenddate']),'Y-m-d');

                      // $mydb->setQuery("SELECT * FROM `tbltimetable` t, `tblemployee` s,`tblcourse` c
                      //          WHERE t.`EmployeeID`=s.`EmployeeID` AND s.`CourseID`=c.`CourseID` 
                      //          AND c.`CourseCode` ='{$_POST['Attendance']}' AND Date(`AttendDate`) ='{$attenddate}' AND `YearLevel`='{$_POST['YearLevel']}' ORDER BY TimeTableID desc");
                      $mydb->setQuery("SELECT * FROM `tbltimetable` t, `tblemployee` s WHERE t.`EmployeeID`=s.`EmployeeID` AND Date(`AttendDate`) ='{$attenddate}' AND t.EventTitle = 'Daily Attendance' ORDER BY TimeTableID desc");
                    
                       $sql = "SELECT Firstname, Middlename, Lastname FROM tblemployee
                       Except
                       SELECT Firstname, Middlename, Lastname FROM  `tblemployee` s,`tbltimetable` t WHERE s.`EmployeeID`=t.`EmployeeID` AND Date(`AttendDate`) ='{$attenddate}' AND t.EventTitle = 'Daily Attendance'";
                         
                      $cur = $mydb->loadResultList();
                      $result1 = mysqli_query($conn, $sql);

                    foreach ($cur as $result) { 
                      echo '<tr>';
                      echo '<td>'. $result->Middlename.' '. $result->Lastname.' '. $result->Firstname.'</td>';
                      echo '<td>'. date_format(date_create($result->AttendDate),'M. d, Y').'</td>'; 
                      echo '<td>'. $result->TimeIn.'</td>'; 
                      echo '<td>'. $result->TimeOut.'</td>';
                      echo '<td>Present</td>';
                      echo '</tr>';
                    } 
                    if ($result1->num_rows > 0) {
                      // output data of each row
                      while($row = $result1->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>'. $row["Middlename"].' '. $row["Lastname"].' '. $row["Firstname"].'</td>';
                        echo '<td>Null</td>'; 
                        echo '<td>Null</td>'; 
                        echo '<td>Null</td>';
                        echo '<td>Absent</td>';
                        echo '</tr>';
                      }
                    } else {
                      echo "0 results";
                    }
                    $conn->close();
                    ?>
                  </tbody>
                  
                </table> 
                            
                 <?php }
                 elseif (isset($_POST['events'])) {
                   
                   ?>
                 <!--   <div class="center wow fadeInDown"> 
                        <h2 class="page-header">Attendance Report</h2>  
                      <p class="lead"> <?php echo isset($_POST['attenddate']) ? 'As of '. $_POST['attenddate'] : '' ; ?><br/>
                                     <?php echo isset($_POST['Attendance']) ?  'Report Type :'.  $_POST['Attendance'] : '' ; ?><br/>
                                     <?php echo isset($_POST['YearLevel']) ?  'Year :'.  $_POST['YearLevel'] : '' ; ?> </p> -->
                  </div>
                   <table id="" class="table table-striped table-bordered table-hover " style="font-size:12px" cellspacing="0">
                
                  <thead>
                  <!-- <tr>
                    <th colspan="2"></th> 
                    <th colspan="2"><center>AM</center></th>
                    <th colspan="2"><center>PM</center></th>
                  </tr> -->
                    <tr>
                      <th>Employee</th>
                      <th>Date</th>
                      <th width="150px">Time-In</th>  
                      <th width="150px">Time-Out</th>
                      <th width="150px">Status</th>   
                    </tr> 
                  </thead> 
                  <tbody>
                    <?php  
                      

                      $conn = new mysqli($servername, $username, $password, $dbname);
                      @$attenddate = date_format(date_create($_POST['attenddate']),'Y-m-d');
                      $selected_event_title = $_POST['events'];


                      // $mydb->setQuery("SELECT * FROM `tbltimetable` t, `tblemployee` s,`tblcourse` c
                      //          WHERE t.`EmployeeID`=s.`EmployeeID` AND s.`CourseID`=c.`CourseID` 
                      //          AND c.`CourseCode` ='{$_POST['Attendance']}' AND Date(`AttendDate`) ='{$attenddate}' AND `YearLevel`='{$_POST['YearLevel']}' ORDER BY TimeTableID desc");
                      $mydb->setQuery("SELECT * FROM `tbltimetable` t, `tblemployee` s WHERE t.`EmployeeID`=s.`EmployeeID` AND t.EventTitle = '{$selected_event_title}' ORDER BY TimeTableID desc");
                    
                       $sql = "SELECT Firstname, Middlename, Lastname FROM tblemployee
                       Except
                       SELECT Firstname, Middlename, Lastname FROM `tbltimetable` t, `tblemployee` s WHERE t.`EmployeeID`=s.`EmployeeID` AND t.EventTitle = '{$selected_event_title}'";
                         
                      $cur = $mydb->loadResultList();
                      $result1 = mysqli_query($conn, $sql);

                    foreach ($cur as $result) { 
                      echo '<tr>';
                      echo '<td>'. $result->Middlename.' '. $result->Lastname.' '. $result->Firstname.'</td>';
                      echo '<td>'. date_format(date_create($result->AttendDate),'M. d, Y').'</td>'; 
                      echo '<td>'. $result->TimeIn.'</td>'; 
                      echo '<td>'. $result->TimeOut.'</td>';
                      echo '<td>Present</td>';
                      echo '</tr>';
                    } 
                    if ($result1->num_rows > 0) {
                      // output data of each row
                      while($row = $result1->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>'. $row["Middlename"].' '. $row["Lastname"].' '. $row["Firstname"].'</td>';

                        echo '<td>Null</td>'; 
                        echo '<td>Null</td>'; 
                        echo '<td>Null</td>';
                        echo '<td>Absent</td>';
                        echo '</tr>';
                      }
                    } else {
                      echo "0 results";
                    }
                    $conn->close();
                    ?>
                  </tbody>
                  
                </table> 
                            
                 <?php }
                 
                 else{
                    echo "<h2 class='center'>No Record</h2>";
                    } ?>
                 </div><!--/.services--> 
          
 
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
<footer>
</footer>
</html>
