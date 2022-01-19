<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbattendance";

$conn = new mysqli($servername, $username, $password, $dbname);
	if (isset($_POST['id_quocgia'])) {
		$id_quocgia = $_POST['id_quocgia'];
		$sql_thudo = mysqli_query($conn, "SELECT * From tblevents")
		$output = '';
		while ($row_thudo = mysqli_fetch_array($sql_thudo)) {
			$output = '<option value ="'.$row_thudo['EventTitle'].'">'.$row_thudo['EventTitle'].'</option>';
		}
		echo $output;
		
	}
?>