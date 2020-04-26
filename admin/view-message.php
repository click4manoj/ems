<?php
include '../auth/auth.php';
include 'header.php';
include 'authentication.php';
?>
<?php 
if(isset($_REQUEST['m_reply'])){

	$mid = $_POST['m_id'];
	$user_id = $_POST['user_id'];
	$reply= mysqli_real_escape_string($conn,$_POST['m_reply']);

	$query = "INSERT INTO `task_reply`(`r_id`,`reply`,`m_id`,`reply_by`) values('','$reply','$mid','$user_id')";
	$res = mysqli_query($conn,$query);
	if($res){
		?>
		<div class="alert alert-success text-center" role="alert">
			<?php echo "Reply inserted successfully"; ?>
		</div>
		<?php 
	}else{

		echo "Error in reply, Please try again";
	}
}
 ?>
<div class="admin-dashboard">
	<div class="container">
			<h2 class="mt-5 mb-5">Message Details View</h2>
			<?php 
				$m_id = $_GET['id'];
				$query= "Select * from task where t_id= '".  $m_id."'";
				$res= mysqli_query($conn, $query);
				$count= mysqli_num_rows($res);
				$row= mysqli_fetch_array($res);
			 ?>
			 <div class="message-view  mb-5" style="background-color: #f9f9f9;padding: 15px;">
			 	<?php echo $row['task']; ?>
			 </div>
			 <div class="reply-message">
			 	<div class="col-md-10">
			 		<form action="" method="POST">
			 			<input type="hidden" name="m_id" value="<?php echo $m_id; ?> "> 
			 			<input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?> "> 
			 			<textarea class="form-control" name="m_reply" rows="10" placeholder="Write your Reply" style="width: 100%; background-color: #d9d9d9;"></textarea>
			 			<button type="submit" class="btn btn-primary mt-4">Submit Reply</button>
			 		</form>
			 	</div>
			 </div>
			 <div class="your-reply mt-5 mb-5">
			 	<div class="col-md-10">
			 	<label>Your reply</label>
			 	<?php 
				//$query2= "Select * from task where t_id= '".  $m_id."'";
				 $query2= "select * from `task_reply` join `users` on `users`.`user_id`=`task_reply`.`reply_by` where m_id= '".$m_id."' ";
				 //$query2= "select * from `task_reply` where `m_id`= '".  $m_id."' AND `reply_by`= '". $_SESSION['user_id'] . " ' ";
				$res2= mysqli_query($conn, $query2);
				$count2= mysqli_num_rows($res2);
				// $row2= mysqli_fetch_array($res2);
					while ( $row2= mysqli_fetch_array($res2)) {
						?>
						  <div class="message-view  mb-2" style="background-color: #f9f9f9;padding: 15px;">
						 	<?php echo $row2['name'] .':- 	'. $row2['reply'];
						 	 ?>
						 </div>
						<?php
					 }

				 ?>
				 </div>
			 </div>
	</div>
</div>
<?php
include '../footer.php';
?>
