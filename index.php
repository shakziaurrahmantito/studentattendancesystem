<?php include 'inc/header.php';?>
	<div class="container">
		<div class="card mb-5">
			<div class="card-body">
		<?php 
		$cur_date = date("Y-m-d");
		$cur_month = date("F-Y");
		?>

		<h6 class="h4 text-center alert alert-info mt-3">Today - Date: <?php echo $cur_date; ?></h6>



		<?php
			if ($_SERVER['REQUEST_METHOD'] == "POST") {
				$resultMsg = $student->insertAtt($_POST, $cur_date,$cur_month);
			}
		?>

		<?php if (isset($resultMsg)) { ?>

		<div id="stateAtt" class="alert alert-warning" style="font-size: 16px;"><?php echo $resultMsg; ?></div>
		<?php } ?>

		<div class="alert alert-warning" id="stateAtt" style="font-size: 16px;display: none;"></div>
		<form action="" method="post">
			<table class="table table-hover">
				<tr class="table-info">
					<th width="25%">Serial</th>
					<th width="25%">Student Name</th>
					<th width="25%">Student Roll</th>
					<th width="25%">Attendance</th>
				</tr>
				<?php
				$result = $student->getStudentData();
				if ($result) {
				$i = 1;
				while ($data = $result->fetch_assoc()) {
				?>
				<tr>
				<td><?php echo $i++; ?></td>
					<td><?php echo $data['studentName']; ?></td>
					<td><?php echo $data['studentRoll']; ?></td>
					<td>
						<input type="radio" name="attend[<?php echo $data['studentRoll']; ?>]" value="present">P
						<input type="radio" name="attend[<?php echo $data['studentRoll']; ?>]" value="absent">A
					</td>
				</tr>

				<?php }} ?>
				<?php
				if ($result == false) {
				?>
				<tr>
					<td colspan="4"><p style="text-align: center;padding: 20px 0;">There is no data avaiable.</p></td>
				</tr>
				<?php }else{ ?>
			</table>
			<div>
				<input type="submit" id="att" class="btn btn-primary btn-sm btn-block" value="Submit">
			</div>
			<?php } ?>
		</form>
	</div>

				</div>
		</div>
<?php include_once "inc/footer.php"; ?>



