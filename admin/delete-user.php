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
	$ID= $_GET['id'];
		$query = "DELETE FROM users  WHERE user_id=".$ID ." ";
			$res= mysqli_query($conn,$query);
			print_r( $query);
		if($res){

			 $_SESSION['success'] = "Deleted successfully!";
			header('Location:dashboard.php');
		}else{

			echo "Data Not Deleted, Please try again";
		}


