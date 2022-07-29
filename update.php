<?php include 'inc/header.php'; ?>
	<div class="container">
		<div class="card mb-5">
			<div class="card-header">
				<h2 class="m-0">Student Attendance Update</h2>
			</div>
			<div class="card-body">
			
		<div class='alert alert-danger' style="display: none;" id="emptyMsg"><strong>Error ! </strong>Roll missing.</div>

		<?php 
			$cur_date = date("Y-m-d");
		?>
		<?php
			if (isset($_GET['dt'])) {
				$dt = $_GET['dt'];
				$dt = base64_decode($dt);
			}else{
				header("location:index.php");
			}
		?>
		<h6 class="h4 text-center alert alert-info mt-3">Attendance Date: <?php if(isset($dt)){ echo $dt; } ?></h6>
		<?php
			if ($_SERVER['REQUEST_METHOD'] == "POST") {
				$resultUpdateMsg = $student->updatetAtt($_POST, $dt);
			}
		?>
		<?php if (isset($resultUpdateMsg)) { ?>
			<div class="alert alert-success" id="stateUpdate" style="font-size: 16px;"><?php echo $resultUpdateMsg; ?></div>
		<?php } ?>

		<form action="" method="post">
			<table class="table table-striped">
				<tr>
					<th width="15%">Serial</th>
					<th width="25%">Student Name</th>
					<th width="15%">Student Roll</th>
					<th width="25%">Roll Call Time</th>
					<th width="20%">Attendance</th>
				</tr>
				<?php

					$update_result = $student->getAllStudentDataByUpdate($dt);
					if ($update_result) {
						$i = 1;
						while ($data = $update_result->fetch_assoc()) {
				?>
				<tr>
					<td><?php echo $i++; ?></td>
					<td><?php echo $data['studentName'] ?></td>
					<td><?php echo $data['roll'] ?></td>
					<td><?php echo $fm->formatDate($data['cur_date']); ?></td>
					<td>
						<input type="radio" name="attend[<?php echo $data['roll'] ?>]" value="present" <?php if ($data['attend'] == "present") {
							echo "checked=''";
						}?>>P
						<input type="radio" name="attend[<?php echo $data['roll'] ?>]" value="absent" <?php if ($data['attend'] == "absent") {
							echo "checked=''";
						}?>>A
					</td>
				</tr>
			<?php }} ?>
			<?php if ($dt == $cur_date) { ?>
				<tr>
					<td colspan="5">
						<input type="submit" class="btn btn-block btn-primary" value="Update">
					</td>
				</tr>
			<?php } ?>
			</table>
		</form>

	</div>
	</div>
	
<?php include 'inc/footer.php'; ?>