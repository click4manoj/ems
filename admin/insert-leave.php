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
if(isset($_REQUEST['validfrm'])){

	$validfrm =$_POST['validfrm'];
	$validto =$_POST['validto'];
	$eleave =$_POST['eleave'];
	$mleave =$_POST['mleave'];
	$cleave =$_POST['cleave'];
	$assign_by = $_POST['assign_by'];
	$emplist = $_POST['emp'];
	foreach ($emplist as $key => $emp) {
	$query = "INSERT INTO assign_leave(`id`,`v_from`,`v_to`,`e_leave`,`m_leave`,`c_leave`,`assign_to`,`assign_by`) VALUE('', '$validfrm','$validto','$eleave','$mleave','$cleave','$emp','$assign_by')";
	$res= mysqli_query($conn,$query);
	}	
	if($res){
			$_SESSION['success'] = "Leave assigned Successfully";
			header('Location:assign-leave.php');
		}else{
			echo "Leave not assigned, Please try again";
		}

}

