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
			if(password == ""){
				alert('Please enter password');
				return false;
			}
			if(passwordlength <= 5){
				alert('Enter 5 digit password');
				return false;	
			}
			if(depart == ""){
				alert('Please enter depart');
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
			<h2 class="mt-5 mb-5">Register</h2>
			<form  method="POST" action="insert-user.php" onsubmit=" return formvalidation();">
				<div class="form-group">
					<label for="Name">Name</label>
					<input type="text" class="form-control" id="name" name="name" value="">
				</div>
				<div class="form-group">
					<label for="email">Email address</label>
					<input type="email" class="form-control" name="email" id="email" value="">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" name="password" id="password" value="">
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-check">
					<label>Department</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="depart" id="Web" value="Web Development" checked>
					<label class="form-check-label" for="web">
						Web Development
					</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="depart" id="seo" value="SEO">
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
					<input class="form-check-input" type="radio" name="role" id="admin" value="admin" checked>
					<label class="form-check-label" for="admin">
						Admin
					</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="role" id="employee" value="employee">
					<label class="form-check-label" for="employee">
						Employee
					</label>
				</div>
					</div>
				</div>
					
				
					<button type="submit" class="btn btn-primary mt-4">Submit</button>
			</form>
		</div>
	</div>
</div>
<?php
include '../footer.php';
?>	
