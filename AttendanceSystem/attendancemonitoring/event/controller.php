<?php
require_once ("../include/initialize.php");
	 if (!isset($_SESSION['ACCOUNT_ID'])){
      redirect(web_root."index.php");
     }

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert();
	break;
	
	case 'edit' :
	doEdit();
	break;
	
	case 'delete' :
	doDelete();
	break;

	case 'photos' :
	doupdateimage();
	break;

 
	}
   
	function doInsert(){
		if(isset($_POST['save'])){
		$evdate =  $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];

		if ($_POST['EVENT_NAME'] == "" OR $_POST['EVENT_DESC'] == "") {
			$messageStats = false;
			message("All field is required!","error");
			redirect('index.php?view=add');
		}else{	
			$dept = New Event(); 
		    $dept->EventTitle 		= $_POST['EVENT_NAME'];
			$dept->EventDescription		= $_POST['EVENT_DESC'];
			// $dept->EventDateStart = $evdate;
			$dept->EventPlace  = $_POST['EVENT_PLACE'];
			// $dept->EventDateTimeStart  = $_POST['event_starttime'];
			// $dept->EventDateTimeEnd = $_POST['event_endtime'];
			// $dept->AttendanceTimeInStart  = $_POST['att_timein_start'];
			// $dept->AttendanceTimeInEnd = $_POST['att_timein_end'];
			// $dept->AttendanceTimeOutStart  = $_POST['att_timeout_start'];
			// $dept->AttendanceTimeOutEnd = $_POST['att_timeout_end'];
			$dept->Status		= $_POST['status'];
			$dept->create();

			// $autonum = New Autonumber(); 
			// $autonum->auto_update(2);

			message("New [". $_POST['EVENT_NAME'] ."] created successfully!", "success");
			redirect("index.php");
			
		}
		}

	}

	function updateStatus(){
		$dept = New Event(); 
	}

	function doEdit(){
	if(isset($_POST['save'])){ 
		$evdate =  $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];

			$dept = New Event(); 
		    $dept->EventTitle 		= $_POST['EVENT_NAME'];
			$dept->EventDescription		= $_POST['EVENT_DESC'];
			// $dept->EventDateStart = $evdate;
			$dept->EventPlace  = $_POST['EVENT_PLACE'];
			$dept->Status		= $_POST['status'];
			// $dept->EventDateTimeStart  = $_POST['event_starttime'];
			// $dept->EventDateTimeEnd = $_POST['event_endtime'];
			// $dept->AttendanceTimeInStart  = $_POST['att_timein_start'];
			// $dept->AttendanceTimeInEnd = $_POST['att_timein_end'];
			// $dept->AttendanceTimeOutStart  = $_POST['att_timeout_start'];
			// $dept->AttendanceTimeOutEnd = $_POST['att_timeout_end']; 
			$res = $dept->update($_POST['DEPT_ID']);

			  message("[". $_POST['EVENT_NAME'] ."] has been updated!", "success");
			redirect("index.php");
			 
			
		}
	}


	function doDelete(){
		
	 
				$id = 	$_GET['id'];

				$dept = New Event();
	 		 	$dept->delete($id);
			 
			message("Event already Deleted!","info");
			redirect('index.php');
		 
		
	}

	 
 
?>