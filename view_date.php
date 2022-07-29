<?php include 'inc/header.php'; ?>
	<div class="container">
		<div class="card mb-5">
			<div class="card-header">
				<h2>Attenance Date List</h2>
			</div>
			<div class="card-body">
			<table class="table">
				<tr>
					<th width="40%">Serial</th>
					<th width="50%">Attendance Date</th>
					<th width="10%">Action</th>
				</tr>
				<?php
					$view_result = $student->getViewDataByDate();
					if ($view_result) {
						$i = 1;
						while ($value = $view_result->fetch_assoc()) {
				?>
				<tr>
					<td><?php echo $i++; ?></td>
					<td><?php echo $value['att_date']; ?></td>
					<td>
						<a href="update.php?dt=<?php echo base64_encode($value['att_date']); ?>" class="btn btn-info">View</a>
					</td>
				</tr>
			<?php }}else{ ?>
				<tr>
					<td colspan="3"><p style="text-align: center;padding: 20px 0;">There is no data avaiable.</p></td>
				</tr>
			<?php } ?>
			</table>
	</div>
	</div>
	
<?php include 'inc/footer.php'; ?>