<?php
include '../auth/auth.php';
include 'header.php';
include 'authentication.php';
?>
<script type="text/javascript">
		function formvalidation(){
			var name = $('#name').val();
			var email = $('#email').val();
			var password = $('#password').val();
			var passwordlength = $('#password').val().length;
			var depart = $('#depart').val();
			if(name == ""){
				alert('Please enter name');
				return false;
			}
			if(email == ""){
				alert('Please enter email');
				return false;
			}
			
			if(depart == ""){
				alert('Please enter depart');
				return false;
			}
		}
</script>
<div class="form-section">
	<div class="container">
		<div class="col-md-8 m-auto">
			<h2>Edit User Details</h2>
			<?php 

			if(isset($_SESSION['success'])){
				echo $_SESSION['success'];
				unset($_SESSION['success']);
			}
				$user_id=$_GET['id'];
				 ?>
			<form  method="POST" action="update-user.php?id=<?php echo $user_id; ?>" onsubmit=" return formvalidation();">
				<?php 
				$query = "select * from users where user_id='$user_id'";
				$res= mysqli_query($conn, $query);
				$data = mysqli_fetch_array($res);
				 ?>
				
				<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
				<div class="form-group">
					<label for="Name">Name</label>
					<input type="text" class="form-control" id="name" name="name" value="<?php echo $data['name'] ?>">
				</div>
				<div class="form-group">
					<label for="email">Email address</label>
					<input type="email" class="form-control" name="email" id="email" value="<?php echo $data['email'] ?>">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" name="password" id="password" value="<?php echo $data['password'] ?>">
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-check">
					<label>Department</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="depart" id="web" value="Web Development" <?php if($data['department']=='Web Development'){ echo "checked"; } ?>>
					<label class="form-check-label" for="web" >
						Web Development
					</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="depart" id="seo" value="SEO"  <?php if($data['department']=='SEO'){ echo "checked"; } ?>>
					<label class="form-check-label" for="seo">
						SEO
					</label>
				</div>
					</div>
					<div class="col-md-6">
						<div class="form-check">
					<label>Role</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="role" id="admin" value="admin" <?php if($data['role']=='admin'){ echo "checked"; } ?>>
					<label class="form-check-label" for="admin" >
						Admin
					</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="role" id="employee" value="employee" <?php if($data['role']=='employee'){ echo "checked"; } ?>>
					<label class="form-check-label" for="employee" >
						Employee
					</label>
				</div>
					</div>
				</div>
				
					<button type="submit" class="btn btn-primary mt-4">Update</button>
			</form>
		</div>
	</div>
</div>
<?php
include '../footer.php';
?>	
