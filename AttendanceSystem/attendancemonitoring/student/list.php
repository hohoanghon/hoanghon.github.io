<?php
	 if (!isset($_SESSION['ACCOUNT_ID'])){
      redirect(web_root."index.php");
     }

?>

 
      <section id="feature" class="transparent-bg">
        <div class="container">
           <div class="center wow fadeInDown">
                 <h2 class="page-header">List of Employees </h2>
                <!-- <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p> -->
            </div>

            <div class="row">
                <div class="features">
				   			 <form class=" wow fadeInDown" action="controller.php?action=delete" Method="POST">   			
								<table id="dash-table" class="table table-striped table-bordered table-hover " style="font-size:12px" cellspacing="0">
								
								  <thead>
								  	<tr>
								  		<th> <input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');"> No.</th>
								  		<th>Employee ID</th>
								  		<th>
								  		
								  		 Name</th>
								  		<th>Sex</th> 
								  		<!-- <th>Age</th> -->
								  		<th>Address</th>
								  		<th>Contact No.</th>
								  		<th>Team</th>
								  		<!-- <th>Status</th> -->
								  		<th width="20%" >Action</th>
								 
								  	</tr>	
								  </thead> 
								  <tbody>
								  	<?php  

								  		$mydb->setQuery("SELECT * FROM `tblemployee` s,`tblteam` c WHERE s.`TeamID`=c.`TeamID` ORDER BY ID DESC");

								  		$cur = $mydb->loadResultList();
								  		$i = 0;
										foreach ($cur as $result) {
										$i++;
								  		echo '<tr>';
								  		echo '<td  ><input type="checkbox" name="selector[]" id="selector[]" value="'.$result->ID. '"/>'.$i.'&nbsp</td>';
								  		//echo '<td width="5%" align="center"></td>';
								  		// echo '<td><input type="checkbox" name="selector[]" id="selector[]" value="'.$result->EmployeeID. '"/> ' . $result->EmployeeID.'</a></td>';


								  		echo '<td>' . $result->EmployeeID.'</a></td>';
								  		echo '<td>'. $result->Middlename.' '. $result->Lastname.' '. $result->Firstname.'</td>';
								  		echo '<td>'. $result->Gender.'</td>';
								  		// echo '<td>' .$age.'</td>';
								  		echo '<td>'. $result->Address.'</td>';
								  		echo '<td>'. $result->ContactNo.'</td>';
								  		echo '<td>' . $result->TeamCode.'-' . $result->Description.'</a></td>';
								  		 
								  		echo '<td align="center" > <a title="View Information" href="index.php?view=view&id='.$result->ID.'"  class="btn btn-info btn-xs  ">View <span class="fa fa-info-circle fw-fa"></span></a>
								  					 <a title="Update Students" href="index.php?view=edit&id='.$result->ID.'" class="btn btn-info btn-xs" >Edit <span class="fa fa-pencil fw-fa"></span> </a>
								  					  <a title="code Students" href="index.php?view=qrcode&id='.$result->ID.'" class="btn btn-info btn-xs" >QRCode <span class="fa fa-pencil fw-fa"></span> </a>
								  					 </td>';
								  		// echo '<td align="center" > <a title="View Grades" href="index.php?view=grades&id='.$result->StudentID.'" class="btn btn-primary btn-xs" >Grades <span class="fa fa-info-circle fw-fa"></span> </a>
								  		// 			 </td>';
								  		echo '</tr>';
								  	} 
								  	?>
								  </tbody>
									
								</table>
				 
								<div class="btn-group">
								  <a href="index.php?view=add" class="btn btn-primary"><i class="fa fa-plus"></i> New</a>
								  <button type="submit" class="btn btn-default" name="delete" style="margin-top: 10px"><span class="fa fa-trash"></span> Delete Selected</button>
						  
							</div>
						</form>
                </div><!--/.services-->
            </div><!--/.row-->  
        </div><!--/.container-->
    </section><!--/#feature-->