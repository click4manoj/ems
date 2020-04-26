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
echo "string";
if(isset($_REQUEST['l_from'])){

	$l_from =$_POST['l_from'];
	$l_to =$_POST['l_to'];
	$eleave =$_POST['eleave'];
	$mleave =$_POST['mleave'];
	$cleave =$_POST['cleave'];
	$appy_by = $_POST['user_id'];
	echo $status = 'pending';

	echo $query = "INSERT INTO applied_leave(`id`,`l_from`,`l_to`,`e_leave`,`m_leave`,`c_leave`,`apply_by`,`status`) VALUE('', '$l_from','$l_to','$eleave','$mleave','$cleave','$appy_by','$status')";
	$res= mysqli_query($conn,$query);
	
		if($res){
			$_SESSION['success'] = "Leave Applied Successfully";
			header('Location:leave.php');
		}else{
			echo "Leave not Applied, Please try again";
		}
	}	


