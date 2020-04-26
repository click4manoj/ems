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
		<h2 class="mt-5 mb-5">Leave List <a class="btn btn-primary" href="applied-leave.php">All Applied Leave</a> </h2>
		<table class="table">
			<thead class="thead-dark">
				<tr>
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
				$user_id= $_SESSION['user_id'];
				$query= "Select * from `assign_leave` t1 join 	`users` t2 on t1.assign_to=t2.user_id where t2.user_id=$user_id";
				$res= mysqli_query($conn, $query);
				$count= mysqli_num_rows($res);
				if($count>0){
					while ( $row= mysqli_fetch_array($res)) {

						?>

						<tr>
							<td><?php echo $row['name']; ?></td>
							<td class="e_leave"><?php echo $row['e_leave']; ?></td>
							<td class="m_leave"> <?php echo $row['m_leave']; ?></td>
							<td class="c_leave"><?php echo $row['c_leave']; ?></td>
							<td class="v_from"><?php echo $row['v_from']; ?></td>
							<td class="v_to"><?php echo $row['v_to']; ?></td>
							
						</tr>
						<?php 
						$i++;
					}
				}else{
					echo "No record found";
				} ?>
			</tbody>
		</table>
		<form  method="POST" action="apply-leave.php" >
			<input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?> ">
					<div class="mb-5">
						Apply Leave
					</div>
				<div class="row">
					<div class="col-md-8">
						<div class="form-group row">
			    			<label class="col-md-3" for="message">Leave From</label>
							<input class="col-md-9 form-control" type="date" name="l_from" placeholder="dd/mm/yyyy" onblur="checkDate(this.value)">
						</div>
						<div class="form-group row">
			    			<label class="col-md-3" for="message">Leave To</label>
							<input class="col-md-9 form-control" type="date" name="l_to" placeholder="dd/mm/yyyy" onblur="checkDate(this.value)">
						</div>
						<div class="form-group row">
			    			<label class="col-md-3" for="message">Earning Leave</label>
							<input class="col-md-9 form-control" type="text" name="eleave" placeholder="No. of leave" onblur="checkeleave(this.value)">
						</div>
						<div class="form-group row">
			    			<label class="col-md-3" for="message">Medical Leave</label>
							<input class="col-md-9 form-control" type="text" name="mleave" placeholder="No. of leave" onblur="checkmleave(this.value)">
						</div>
						<div class="form-group row">
			    			<label class="col-md-3" for="message">Casual Leave</label>
							<input class="col-md-9 form-control" type="text" name="cleave" placeholder="No. of leave" onblur="checkcleave(this.value)">
						</div>
					</div>
				
				</div>
				<div class="text-left">
					<button type="submit" class="btn btn-primary mt-4">Submit</button>
				</div>
			</form>
	</div>
</div>
<script type="text/javascript">
	function checkDate(str){
		var v_from = $('.v_from').text();
		var v_to = $('.v_to').text();
		var lfrm = str;
		var date1 = new Date(v_from);
		var date2 = new Date(lfrm);
		var diffDays = parseInt((date2 - date1) / (1000 * 60 * 60 * 24));

		var date3 = new Date(lfrm);
		var date4 = new Date(v_to);
		var diffDays2 = parseInt((date3 - date4) / (1000 * 60 * 60 * 24));
		if(diffDays>=0 && diffDays2>=0){
			return true;
		}else{
			//alert('Please enter valid date');
		return false;
		}
	}
	function checkeleave(str){
		var vfrm = $('.e_leave').text();
		var lqty = str;
		if(vfrm>=lqty){
			return true;
		}else{
			//alert('Please enter valid Earning leave quantity.');
			return false;
		}
	}
	function checkmleave(str){
		var vfrm = $('.m_leave').text();
		var lqty = str;
		if(vfrm>=lqty){
			return true;	
		}else{
			//alert('Please enter valid Medical leave quantity.');
			return false;
		}
	}
	function checkcleave(str){
		var vfrm = $('.c_leave').text();
		var lqty = str;
		if(vfrm>=lqty){
			return true;
		}else{
			//alert('Please enter valid Earning leave quantity.');
			return false;
		}
	}
</script>
<?php
include '../footer.php';
?>
