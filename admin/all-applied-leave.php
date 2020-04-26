<?php
include '../auth/auth.php';
include 'header.php';
include 'authentication.php';
?>
<?php 
			if(isset($_GET['approved'])){
				$status = "approved";
				$comment = $_GET['comment'];
				$id = $_GET['id'];
				$query = "UPDATE `applied_leave` SET `status` = '".$status."', `comment`='".$comment."' WHERE `applied_leave`.`id` = ".$id."";
				
				$res= mysqli_query($conn,$query);
				
				if($res){
					$_SESSION['success'] = "updated Successfully";
				}else{
					echo "Data not updated, Please try again";
				}


			}

			if(isset($_GET['rejected'])){
				$status = "rejected";
				$comment = $_GET['comment'];
				$id = $_GET['id'];
				$query = "UPDATE `applied_leave` SET `status` = '".$status."', `comment`='".$comment."' WHERE `applied_leave`.`id` = ".$id."";
				$res= mysqli_query($conn,$query);
				
				if($res){
					$_SESSION['success'] = "updated Successfully";
				}else{
					echo "Data not updated, Please try again";
				}
			}

		?>


<div class="admin-dashboard">
	<?php	if(isset($_SESSION['success'])){  ?>
		<div class="alert alert-success text-center" role="alert">
			<?php 	echo $_SESSION['success'];
			unset($_SESSION['success']);
			?>
		</div>
		<?php
	}

 ?>

	<div class="container">
		<h2 class="mt-5 mb-5">All Applied leave List</h2>
		
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">Sr No.</th>
					<th scope="col">Employee Name</th>
					<th scope="col">Earning Leave</th>
					<th scope="col">Medical Leave</th>
					<th scope="col">Casual Leave</th>
					<th scope="col">From</th>
					<th scope="col">To</th>
					<th scope="col">Status</th>
					<th scope="col">Comment</th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$i = 1; 
				$query= "Select * from `applied_leave` t1 join 	`users` t2 on t1.apply_by=t2.user_id";
				$res= mysqli_query($conn, $query);
				$count= mysqli_num_rows($res);
				if($count>0){
					while ( $row= mysqli_fetch_array($res)) {

						?>

						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $row['name']; ?></td>
							<td><?php echo $row['e_leave']; ?></td>
							<td><?php echo $row['m_leave']; ?></td>
							<td><?php echo $row['c_leave']; ?></td>
							<td><?php echo $row['l_from']; ?></td>
							<td><?php echo $row['l_to']; ?></td>
							<td><?php echo $row['status']; ?></td>
							<td>
								<form mathod="post" action="">
									<textarea class="form-control" name="comment"></textarea>
									<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
							</td>
							<td>
								<input type="submit" name="approved" class="btn btn-primary mb-2" value="Approved">
								<input type="submit" name="rejected" class="btn btn-primary"  value="Reject">
								</form>
							</td>

							
						</tr>
						<?php 
						$i++;
					}
				}else{
					echo "No record found";
				} ?>
			</tbody>
		</table>
	</div>
</div>
<?php
include '../footer.php';
?>
