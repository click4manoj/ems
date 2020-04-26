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
		<h2 class="mt-5 mb-5">All applied Leave status </h2>
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">Sr No.</th>
					<th scope="col">Earning Leave</th>
					<th scope="col">Medical Leave</th>
					<th scope="col">Casual Leave</th>
					<th scope="col">Leave From</th>
					<th scope="col">Leave To</th>
					<th scope="col">status</th>
					<th scope="col">comment</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$i = 1; 
				$user_id= $_SESSION['user_id'];
				$query= "Select * from `applied_leave`  where `apply_by`=$user_id";
				$res= mysqli_query($conn, $query);
				$count= mysqli_num_rows($res);
				if($count>0){
					while ( $row= mysqli_fetch_array($res)) {

						?>

						<tr>
							<td><?php echo $i; ?></td>
							<td class="e_leave"><?php echo $row['e_leave']; ?></td>
							<td class="m_leave"> <?php echo $row['m_leave']; ?></td>
							<td class="c_leave"><?php echo $row['c_leave']; ?></td>
							<td class="v_from"><?php echo $row['l_from']; ?></td>
							<td class="v_to"><?php echo $row['l_to']; ?></td>
							<td class="status"><?php echo $row['status']; ?></td>
							<td class="status"><?php echo $row['comment']; ?></td>
							
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
