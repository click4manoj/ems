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
		<h2 class="mt-5 mb-5">All leave List</h2>
		
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">Sr No.</th>
					<th scope="col">Employee Name</th>
					<th scope="col">Earning Leave</th>
					<th scope="col">Medical Leave</th>
					<th scope="col">Casual Leave</th>
					<th scope="col">Valid From</th>
					<th scope="col">Valid To</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$i = 1; 
				$query= "Select * from `assign_leave` t1 join 	`users` t2 on t1.assign_to=t2.user_id";
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
							<td><?php echo $row['v_from']; ?></td>
							<td><?php echo $row['v_to']; ?></td>
							
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
