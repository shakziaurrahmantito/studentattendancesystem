<?php include 'inc/header.php'; ?>

	<div class="container">


<div class="card mb-5">
			<div class="card-header">
				<h2 class="m-0">Total Attendance List</h2>
			</div>
			<div class="card-body">
		<?php
			if (isset($_GET['mt'])) {
				$mt = $_GET['mt'];
				$mt = base64_decode($mt);
			}else{
				header("location:index.php");
			}
		?>
		<h6 class="h4 text-center alert alert-info mt-3">Month: <?php 
			if (isset($mt)) {
				echo $mt;
			}
		 ?></h6>

		<form action="" method="post" style="text-align: center;">
			<table class="table table-striped">
				<tr>
					<th width="15%">Serial</th>
					<th style="text-align: left;" width="25%">Student Name</th>
					<th width="15%">Student Roll</th>
					<th style="text-align: left;" width="25%">Month</th>
					<th width="20%">Total Present</th>
				</tr>

				<?php
					$monthResult = $student->getMonthByData($mt);
					if ($monthResult) {
						$i = 1;
						while ($value = $monthResult->fetch_assoc()) {
				?>
				<?php

					$roll = $value['roll'];
					$rollResult = $student->getMonthRollByData($roll);
					if ($rollResult) {
						while ($data = $rollResult->fetch_assoc()) {
				?>
				<tr>
					<td><?php echo $i++; ?></td>
					<td style="text-align: left;"><?php echo $data['studentName']; ?></td>
					<td><?php echo $data['studentRoll']; ?></td>
					<td style="text-align: left;"><?php echo $mt; ?></td>
					<td>
						<?php
							$perRoll = $data['studentRoll'];
							$getperResult = $student->getPerAttendance($perRoll, $mt);
							if ($getperResult) {
								$totalPresent = 0;
								while ($perData = $getperResult->fetch_assoc()) {
									$totalPresent += $perData['status'];
								}
							}
							echo $totalPresent;
						?>
					</td>
				</tr>

			<?php }} ?>

			<?php }} ?>


			</table>
		</form>

	</div>
	</div>
	
<?php include 'inc/footer.php'; ?>