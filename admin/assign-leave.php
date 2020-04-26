<?php
include '../auth/auth.php';
include 'header.php';
include 'authentication.php';
?>
<script type="text/javascript">
	function formvalidation(){
		var message= $('#message').val();
		if(message == ""){
				alert('Please enter Message');
				return false;
			}
	}
</script>
<div class="form-section">
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
		<div class="col-md-8 m-auto">
			<h2 class="mt-5 mb-5">Assign Emplyoee Leave</h2>
			
			<form  method="POST" action="insert-leave.php" >
					<div class="mb-5">
						Assign Leave
						<a href="all-leave.php" class="btn btn-primary">all Leave</a>
						<a href="all-applied-leave.php" class="btn btn-primary">Apllied Leave</a>
					</div>
				<div class="row">
					<div class="col-md-4">
						<div class="list-emp" style="background-color: #d9d9d9;padding: 15px;">
						<div class="form-check">
							<label>Employee List</label>
							<input type="hidden" name="assign_by" value="<?php echo $_SESSION['user_id']; ?>">
						</div>
						<?php
						$query= "select * from users WHERE `role`= 'employee' order by user_id DESC";
						$res= mysqli_query($conn, $query);
						$count= mysqli_num_rows($res);
								
						while ( $row= mysqli_fetch_array($res)) {
						?>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" name="emp[]" id="emp<?php echo $row['user_id']; ?>" value="<?php echo $row['user_id']; ?>">
								<label class="form-check-label" for="emp<?php echo $row['user_id']; ?>">
								<?php echo $row['name']; ?>
								</label>
							</div>
						<?php } ?>
						</div>
					</div>
					<div class="col-md-8">
						<div class="form-group row">
			    			<label class="col-md-3" for="message">Valid From</label>
							<input class="col-md-9 form-control" type="date" name="validfrm" placeholder="dd/mm/yyyy">
						</div>
						<div class="form-group row">
			    			<label class="col-md-3" for="message">Valid To</label>
							<input class="col-md-9 form-control" type="date" name="validto" placeholder="dd/mm/yyyy">
						</div>
						<div class="form-group row">
			    			<label class="col-md-3" for="message">Earning Leave</label>
							<input class="col-md-9 form-control" type="text" name="eleave" placeholder="No. of leave">
						</div>
						<div class="form-group row">
			    			<label class="col-md-3" for="message">Medical Leave</label>
							<input class="col-md-9 form-control" type="text" name="mleave" placeholder="No. of leave">
						</div>
						<div class="form-group row">
			    			<label class="col-md-3" for="message">Casual Leave</label>
							<input class="col-md-9 form-control" type="text" name="cleave" placeholder="No. of leave">
						</div>
					</div>
				
				</div>
				<div class="text-right">
					<button type="submit" class="btn btn-primary mt-4">Submit</button>
				</div>
			</form>

		</div>
	</div>
</div>
<?php
include '../footer.php';
?>	
