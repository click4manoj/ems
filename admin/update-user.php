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
	if(isset($_REQUEST['email'])){

		 $name = $_POST['name'];
		 $email = $_POST['email'];
		 $pass = md5($_POST['password']);
		 $depart = $_POST['depart'];
		 $role = $_POST['role'];
		if($pass==""){
			$query = "UPDATE users SET name = '".$name." ',email = '".$email ."', department = '".$depart."', role = '".$role."' WHERE user_id=".$ID ." ";	
		}

			$query = "UPDATE users SET name = '".$name." ',email = '".$email ."', password = '".$pass."', department = '".$depart."', role = '".$role."' WHERE user_id=".$ID ." ";
			$res= mysqli_query($conn,$query);
			print_r( $query);
		if($res){

			 $_SESSION['success'] = "Data Updated successfully!";
			header('Location:dashboard.php');
		}else{

			echo "Data Not Updated, Please try again";
		}

	}

