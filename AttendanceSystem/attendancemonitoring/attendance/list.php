<?php
	 if (!isset($_SESSION['ACCOUNT_ID'])){
      redirect(web_root."index.php");
     }

?>

 
      <section id="feature" class="transparent-bg">
        <div class="container">
           <div class="center wow fadeInDown">
                 <h2 class="page-header">Attendance</h2>
                <!-- <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p> -->
            </div>

            <div class="row">
                <div class="features">
				   			 <form class=" " action="controller.php?action=delete" Method="POST">   			
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
								  		<th width="150px">Event</th>

								  		<th width="150px">CheckIn Time</th>  
								  		<th width="150px">CheckOut Time</th>
								  		<!-- <th width="150px">Time-In</th>  
								  		<th width="150px">Time-Out</th>  
								  	</tr>	 -->
								  </thead> 
								  <tbody>
								  	<?php  
								  	// SELECT `CandidateID`, `Position`, `PartyList`, `RunningDate`, 
								  	// `TotalVotes`,`Firstname`, `Lastname`, `Middlename` `Remarks` FROM `tblcandidate` c, `tblstudent` s
								  	//  WHERE c.`StudentID`=s.`StudentID`

								  		$mydb->setQuery("SELECT * FROM `tbltimetable` t, `tblemployee` s
								  						 WHERE t.`EmployeeID`=s.`EmployeeID` ORDER BY TimeTableID desc");

								  		$cur = $mydb->loadResultList();

										foreach ($cur as $result) { 
								  		echo '<tr>';
								  	    echo '<td>'. $result->Middlename.' '. $result->Lastname.' '. $result->Firstname.'</td>';
								  		echo '<td>'. date_format(date_create($result->AttendDate),'M. d, Y').'</td>'; 
								  		echo '<td>'. $result->EventTitle.'</td>'; 
								  		echo '<td>'. $result->TimeIn.'</td>'; 
								  		echo '<td>'. $result->TimeOut.'</td>';  
								  		// echo '<td>'. $result->TimeInPM.'</td>'; 
								  		// echo '<td>'. $result->TimeOutPM.'</td>'; 
								  		 
								  		echo '</tr>';
								  	} 
								  	?>
								  </tbody>
									
								</table> 
							 
						</form>
                </div><!--/.services-->
            </div><!--/.row-->  
        </div><!--/.container-->
    </section><!--/#feature-->
