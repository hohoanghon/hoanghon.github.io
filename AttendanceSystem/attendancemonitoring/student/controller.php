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

	case 'checkid' :
	Check_StudentID();
	break;
 
	}
   $servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbattendance";

$conn = new mysqli($servername, $username, $password, $dbname);
	function doInsert(){
		if(isset($_POST['save'])){


		// if ($_POST['EmployeeID'] == "" OR $_POST['Firstname'] == "" OR $_POST['Lastname'] == ""
		// 	OR $_POST['Middlename'] == "" OR $_POST['CourseID'] == "none"  OR $_POST['Address'] == "" 
		// 	OR $_POST['ContactNo'] == "") {
		// 	$messageStats = false;
		// 	message("All fields are required!","error");
		// 	redirect('index.php?view=add');
		// }else{	
			// $sql = "SELECT * FROM tblemployee WHERE ACCOUNT_USERNAME='".$_POST['U_USERNAME']."'";
			// $result = mysqli_query($conn, $sql);


			// if ($userresult) {
			
			$birthdate =  $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];

			$age = date_diff(date_create($birthdate),date_create('today'))->y;

			if ($age < 15){
			message("Invalid age. 15 years old and above is allowed.", "error");
			redirect("index.php?view=add");

			}
			else{
				// error message 
				// duplicate student id
				 // date_format(date_create($_POST['BirthDate']),'Y-m-d'); 

				//$sql = "SELECT * FROM tblstudent WHERE StudentID='" .$_POST['StudentID']. "'";
				//$res = mysql_query($sql) or die(mysql_error());
				//$maxrow = mysql_num_rows($res);
				//if ($maxrow > 0) { 
					# code... 
					//message("Student ID already in use!", "error");
					//redirect("index.php?view=add");
				//}else{

			$sql = "SELECT * FROM tblemployee WHERE ACCOUNT_USERNAME='".$_POST['U_USERNAME']."'";
			$result = mysqli_query($conn, $sql);
			if ($result->num_rows > 0) {
				# code...
				message("Username is already taken.", "error");
				redirect('index.php?view=add');
			}else{
					$stud = New Student(); 
					$stud->EmployeeID 		= $_POST['EmployeeID'];
					$stud->Firstname		= $_POST['Firstname']; 
					$stud->Lastname			= $_POST['Lastname'];
					$stud->Middlename 	    = $_POST['Middlename'];
					$stud->TeamID			= $_POST['TeamID']; 
					$stud->ACCOUNT_USERNAME	= $_POST['U_USERNAME'];
					$stud->ACCOUNT_PASSWORD	= sha1($_POST['U_PASS']);
					$stud->ACCOUNT_TYPE		=  $_POST['U_ROLE'];
					$stud->Address			= $_POST['Address']; 
					$stud->BirthDate	 	= $birthdate;
					$stud->Age			    = $age;
					$stud->Gender 			= $_POST['optionsRadios']; 
					$stud->ContactNo		= $_POST['ContactNo'];
					
					// $stud->YearLevel		= $_POST['YearLevel'];
					
					
					$stud->create();
					}

					message("New student created successfully!", "success");
					redirect("index.php");

				}
				
			}

		// 	if ($_POST['U_NAME'] == "" OR $_POST['U_USERNAME'] == "" OR $_POST['U_PASS'] == "") {
		// 	$messageStats = false;
		// 	message("All field is required!","error");
		// 	redirect('index.php?view=add');
		// }else{	
		// // $name =  $_POST['U_USERNAME'];
		// // echo $name;

		// 	// $sql = "SELECT * FROM useraccounts WHERE ACCOUNT_USERNAME='".$name."'";
		// 	// $res = mysqli_query($this->conn,$sql); //or die(mysql_error());
		// 	// $userresult = $res->fetch_assoc();
		// 	$sql = "SELECT * FROM useraccounts WHERE ACCOUNT_USERNAME='".$_POST['U_USERNAME']."'";
		// 	$result = mysqli_query($conn, $sql);
		// 	$sql1 = "SELECT max(ID) FROM tblemployee";
		// 	$result1 = mysqli_query($conn, $sql1);

		// 	// if ($userresult) {
		// 	$row = $result1->fetch_assoc();
		// 	$user_id = $row['ID']+1;
		// 	if ($result->num_rows > 0) {
		// 		# code...
		// 		message("Username is already taken.", "error");
		// 		redirect('index.php?view=add');
		// 	}else{

		// 	$user = New User();
		// 	$user->ACCOUNT_ID 		= $user_id;
		// 	$user->ACCOUNT_NAME 		= $_POST['U_NAME'];
		// 	$user->ACCOUNT_USERNAME		= $_POST['U_USERNAME'];
		// 	$user->ACCOUNT_PASSWORD		=sha1($_POST['U_PASS']);
		// 	$user->ACCOUNT_TYPE			=  $_POST['U_ROLE'];
		// 	$user->EmployeeID 		= $_POST['EmployeeID'];
		// 	$user->create();

		// 				// $autonum = New Autonumber(); 
		// 				// $autonum->auto_update(2);

		// 	message("New [". $_POST['U_NAME'] ."] created successfully!", "success");
		// 	redirect("index.php");

		// 	} 
		//  }
		}

	 

	function doEdit(){
	if(isset($_POST['save'])){

		// if ($_POST['EmployeeID'] == "" OR $_POST['Firstname'] == "" OR $_POST['Lastname'] == ""
		// OR $_POST['Middlename'] == "" OR $_POST['CourseID'] == "none"  OR $_POST['Address'] == "" 
		// OR $_POST['ContactNo'] == "") {
		// 	$messageStats = false;
		// 	message("All fields are required!","error");
		// 	redirect('index.php?view=add');
		// }else{	

			$birthdate =  $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];

			$age = date_diff(date_create($birthdate),date_create('today'))->y;
		 	if ($age < 15){
		       message("Invalid age. 15 years old and above is allowed.", "error");
		       redirect("index.php?view=view&id=".$_POST['EmployeeID']);

		    }else{

		  // echo  $_POST['optionsRadios']; 
		    	$stud = New Student(); 
				$stud->EmployeeID 		= $_POST['IDNO'];
				$stud->Firstname		= $_POST['Firstname']; 
				$stud->Lastname			= $_POST['Lastname'];
				$stud->Middlename 	    = $_POST['Middlename'];
				$stud->ACCOUNT_USERNAME	= $_POST['U_USERNAME'];
				$stud->ACCOUNT_PASSWORD	= sha1($_POST['U_PASS']);
				$stud->ACCOUNT_TYPE		= $_POST['U_ROLE'];
				$stud->TeamID			= $_POST['TeamID']; 
				$stud->Address			= $_POST['Address']; 
				$stud->BirthDate	 	= $birthdate;
				$stud->Age			    = $age;
				$stud->Gender 			= $_POST['optionsRadios']; 
				$stud->ContactNo		= $_POST['ContactNo'];
				$stud->update($_POST['EmployeeID']);
				message("Student has been updated!", "success");
				redirect("index.php?view=view&id=".$_POST['EmployeeID']);
	    	}



		}
  	
	 
	}

//} 

	function doDelete(){
		
		if (isset($_POST['selector'])==''){
		message("Select the records first before you delete!","error");
		redirect('index.php');
		}else{

		$id = $_POST['selector'];
		$key = count($id);

		for($i=0;$i<$key;$i++){

			$subj = New Student();
			$subj->delete($id[$i]);

		
				// $id = 	$_GET['id'];

				// $subj = New Student();
	 		//  	$subj->delete($id);
			 
		
		}
			message("Student(s) already Deleted!","success");
			redirect('index.php');
		}

		
	}
	function doupdateimage(){
 
			$errofile = $_FILES['photo']['error'];
			$type = $_FILES['photo']['type'];
			$temp = $_FILES['photo']['tmp_name'];
			$myfile =$_FILES['photo']['name'];
		 	$location="photo/".$myfile;


		if ( $errofile > 0) {
				message("No Image Selected!", "error");
				redirect("index.php?view=view&id=". $_GET['id']);
		}else{
	 
				@$file=$_FILES['photo']['tmp_name'];
				@$image= addslashes(file_get_contents($_FILES['photo']['tmp_name']));
				@$image_name= addslashes($_FILES['photo']['name']); 
				@$image_size= getimagesize($_FILES['photo']['tmp_name']);

			if ($image_size==FALSE ) {
				message("Uploaded file is not an image!", "error");
				redirect("index.php?view=view&id=". $_GET['id']);
			}else{
					//uploading the file
					move_uploaded_file($temp,"photo/" . $myfile);
		 	
					 

						$stud = New Student();
						$stud->StudPhoto	= $location;
						$stud->studupdate($_POST['EmployeeID']);
						redirect("index.php?view=view&id=". $_POST['EmployeeID']);
						 
							
					}
			}
			 
		}

	function Check_StudentID(){

	  
		// $stud = New Student();  
		// $res = $stud->single_student($_POST['IDNO']);

		$sql = "SELECT * FROM tblemployee WHERE Employee='" .$_POST['IDNO']. "'";
		$res = mysql_query($sql) or die(mysql_error());
		$maxrow = mysql_num_rows($res);
		if ($maxrow > 0) { 
			# code...
			echo "Student ID already in use!"; 
		}
   

	}
 
?>