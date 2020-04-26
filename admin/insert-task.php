<?php 
session_start();
$host = 'localhost';
$username = 'root';
$pass = '';
$db = 'ems';
$conn = mysqli_connect($host, $username, $pass,$db);
if(!$conn){
	die('database connection error');
}
if(isset($_REQUEST['message'])){

	$message = mysqli_real_escape_string($conn,$_POST['message']);
	$assign_by = $_POST['assign_by'];
	$emplist = $_POST['emp'];
	foreach ($emplist as $key => $emp) {
	$query = "INSERT INTO task(`t_id`,`task`,`user_id`,`assigned_by`) VALUE('', '$message','$emp','$assign_by')";
	$res= mysqli_query($conn,$query);
	}	
	if($res){
			$_SESSION['success'] = "Message sent";
			header('Location:task.php');
		}else{
			echo "Message not sent, Please try again";
		}

}

