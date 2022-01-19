<?php
   if (!isset($_SESSION['ACCOUNT_ID'])){
      redirect(web_root."index.php");
    } 
    $servername = "localhost";
                      $username = "root";
                      $password = "";
                      $dbname = "dbattendance";
?>
<style type="text/css">
.table_print {
  width: 100%;
  max-width: 100%;
  margin-bottom: 20px;
}
.table_print > thead > tr > th,
.table_print > tbody > tr > th,
.table_print > tfoot > tr > th,
.table_print > thead > tr > td,
.table_print > tbody > tr > td,
.table_print > tfoot > tr > td {
  padding: 8px;
  line-height: 1.42857143;
  vertical-align: top;
  /*border-top: 1px solid #ddd;*/
}
.table_print > thead > tr > th {
  vertical-align: bottom;
  /*border-bottom: 2px solid #ddd;*/
}
.table_print > caption + thead > tr:first-child > th,
.table_print > colgroup + thead > tr:first-child > th,
.table_print > thead:first-child > tr:first-child > th,
.table_print > caption + thead > tr:first-child > td,
.table_print > colgroup + thead > tr:first-child > td,
.table_print > thead:first-child > tr:first-child > td {
  border-top: 0;
}
.table_print > tbody + tbody {
  /*border-top: 2px solid #ddd;*/
}
.table_print .table_print {
  background-color: #fff;
}
.search_panel{
  margin-bottom: 5px;
}
.Search_date{
  font-size:15px;
  height:34px;
  width:160px;
}
.Search_partylist{
  font-size:15px;
  height:34px;
  width:160px;
}
.Search_partylist > option {
  padding: 6px;
  color: #000;
}
</style>
      <section id="feature" class="transparent-bg">
        <div class="container"> 
          <div class="col-md-12">
          <form action="index.php?view=attendance" method="POST" >
            <div class="row">
              <div class="search_panel pull-right">
                <label>Select Report Type</label>
                <select name="reporttype" id="reporttype"  class="Search_partylist Attendance"> 
                      <option value="day">All Users/Day</option>
                      <option value="event">All Users/Event</option>
                </select>
                <button class="btn btn-default" type="submit" name="submit" ><i class="fa fa-go">Choose</i></button>
                <?php
                  if (isset($_POST['submit'])) {
                    $selected_val = $_POST['reporttype'];
                    if ($selected_val == 'day') {
                ?>
                      <label>Date :</label> 
                      <input class="Search_date date_pickerfrom" size="11" 
                                          value="<?php Date('m/d/Y') ?>" 
                                          data-date="<?php Date('m/d/Y') ?>" data-date-format="yyyy-mm-dd" data-link-field="any" 
                                          data-link-format="yyyy-mm-dd" type="text"   name="attenddate" id="datemask2">
                      <button class="btn btn-default" type="submit" id="search_attendance"><i class="fa fa-go">GO</i></button> 
              <?php
                }
              elseif ($selected_val == 'event') {
              ?>
                      <label>Event</label>
                      <select name="events" id="events" class="Search_partylist Attendance"> 
                       <?php
                       $conn = new mysqli($servername, $username, $password, $dbname);
                        $sql_event = "SELECT EventTitle FROM tblevents";
                        $result_events = mysqli_query($conn, $sql_event);
                        if ($result_events->num_rows > 0) {
                          while($row_events = $result_events->fetch_assoc()) {
                            echo '<option value = "'.$row_events['EventTitle'].'">'.$row_events['EventTitle'].'</option>';
                      }
                    } else {
                      echo "0 results";
                    }
                    $conn->close();
                       ?>
                      </select>
                      <button class="btn btn-default" type="submit" id="search_attendance"><i class="fa fa-go">GO</i></button> 
              <?php
                }
              }
              ?>
                </div>
            </div>
            
            
           <div class="center wow fadeInDown"> 
                  <h2 class="page-header">Attendance Report</h2>  
                <p class="lead"> <?php echo isset($_POST['attenddate']) ? 'As of '. $_POST['attenddate'] : '' ; ?><br/>
                                
                               <?php echo isset($_POST['events']) ?  'Event: '.  $_POST['events'] : '' ; ?> </p>
            </div>
            <div id="error_msg" align="center"></div>

            <div class="row">
                <div class="features">
                  <?php 

                  if (isset($_POST['attenddate'])) {
                   ?>
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
                </div><!--/.row-->  
              </form>
             </div>
          </div><!--/.container-->
      </section><!--/#feature-->

<div class="container">
  <div class="row">
    <?php
      if (isset($_POST['attenddate'])) {
        # code...
    ?>
    <form action="attendance_print.php" method="POST" target="_blank">
    <input type="hidden" name="attenddate" value="<?php echo isset($_POST['attenddate']) ? $_POST['attenddate'] : ''; ?>">
    <input type="hidden" name="reporttype" value="<?php echo isset($_POST['reporttype']) ? $_POST['reporttype'] : ''; ?>">
    <button class="btn btn-primary" target="_blank" href="">Print</button> 
   </form>
   <?php
    }
    else{
   ?>
   <form action="attendance_print.php" method="POST" target="_blank">
    <input type="hidden" name="events" value="<?php echo isset($_POST['events']) ? $_POST['events'] : ''; ?>">
    <input type="hidden" name="reporttype" value="<?php echo isset($_POST['reporttype']) ? $_POST['reporttype'] : ''; ?>">
    <button class="btn btn-primary" target="_blank" href="">Print</button> 
   </form>
 <?php } ?>
  </div>
</div>
