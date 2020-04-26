<?php
session_start();
include 'header.php';
?>

<script type="text/javascript">
	function formvalidation(){
		var name = $('#name').val();
		var email = $('#email').val();
		var password = $('#password').val();
		var passwordlength = $('#password').val().length;
		var depart = $('#depart').val();

		if(email == ""){
			alert('Please enter email');
			return false;
		}
		if(password == ""){
			alert('Please enter password');
			return false;
		}
	}


</script>
<?php if(isset($_SESSION['error'])){
	?>
	<div class="alert alert-danger text-center" role="alert">
		<?php echo $_SESSION['error']; ?>
	</div>
	<?php
	unset($_SESSION['error']);
} 
if(isset($_SESSION['success'])){
	?>
	<div class="alert alert-success text-center" role="alert">
		<?php echo $_SESSION['success']; ?>
	</div>
	<?php unset($_SESSION['success']);

} ?>
<div class="form-section">
	<div class="container">
		<div class="col-md-8 m-auto">
			<h2>Login</h2>
			<form  method="POST" action="login-account.php" onsubmit=" return formvalidation();">
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" name="email" id="email" value="">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" name="password" id="password" value="">
				</div>

				<button type="submit" class="btn btn-primary mt-4">Login</button>
			</form>
		</div>
	</div>
</div>
<?php
include 'footer.php';
?>
