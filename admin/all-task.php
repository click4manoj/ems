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
		<h2 class="mt-5 mb-5">All Task List</h2>
		
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">Sr No.</th>
					<th scope="col">Task</th>
					<th scope="col">Date</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$i = 1; 
				$query= "Select * from task ";
				$res= mysqli_query($conn, $query);
				$count= mysqli_num_rows($res);
				if($count>0){
					while ( $row= mysqli_fetch_array($res)) {

						?>

						<tr>
							<th><?php echo $i; ?></th>
							<td><a href="view-message.php?id=<?php echo $row['t_id']; ?>" ><?php echo substr($row['task'],0,50); ?></a></td>
							<td><?php echo $row['date_time']; ?></td>
							<td><a href="view-message.php?id=<?php echo $row['t_id']; ?>" >View</a></td>
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
