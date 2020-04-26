<?php
include '../auth/auth.php';
include 'header.php';
include 'authentication.php';
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
		<h2 class="mt-5 mb-5">Admin Dashboard</h2>
		
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">Sr No.</th>
					<th scope="col">Name</th>
					<th scope="col">Email</th>
					<th scope="col">Department</th>
					<th scope="col">Role</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$i = 1; 
				$query= "Select * from users";
				$res= mysqli_query($conn, $query);
				$count= mysqli_num_rows($res);
				if($count>0){
					while ( $row= mysqli_fetch_array($res)) {

						?>

						<tr>
							<th><?php echo $i; ?></th>
							<td><?php echo $row['name']; ?></td>
							<td><?php echo $row['email']; ?></td>
							<td><?php echo $row['department']; ?></td>
							<td><?php echo $row['role']; ?></td>
							<td><a href="edit-user.php?id=<?php echo $row['user_id']; ?>" >Edit</a>|<a href="delete-user.php?id=<?php echo $row['user_id']; ?> ">Delete</a></td>
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
<style type="text/css">
	table.table a {
		display: inline-block;
		padding: 0 6px;
	}
</style>

<?php
include '../footer.php';
?>
