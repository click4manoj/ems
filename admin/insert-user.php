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

	if(isset($_REQUEST['email'])){

		 $name = $_POST['name'];
		 $email = $_POST['email'];
		 $pass = md5($_POST['password']);
		 $depart = $_POST['depart'];
		 $role = $_POST['role'];


		$query = "INSERT INTO users(`user_id`,`name`,`email`,`password`,`department`,`role`) VALUE('', '$name','$email','$pass','$depart','$role')";
		$res= mysqli_query($conn,$query);
		if($res){
			$_SESSION['success'] = "Data inserted successfully!";
			header('Location:register.php');
		}else{
			echo "Data Not inserted, Please try again";
		}

	}

