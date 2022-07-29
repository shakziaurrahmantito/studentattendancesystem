<?php include 'inc/header.php'; ?>
	<div class="container">
		<div class="card mb-5">
			<div class="card-header">
				<h2>Attenance Month List</h2>
			</div>
			<div class="card-body">
			<table class="table table-striped">
				<tr>
					<th width="40%">Serial</th>
					<th width="50%">Month</th>
					<th width="10%">Action</th>
				</tr>
				<?php
					$month_result = $student->getViewDataByMonth();
					if ($month_result) {
						$i = 1;
						while ($data = $month_result->fetch_assoc()) {
				?>
				<tr>
					<td><?php echo $i++; ?></td>
					<td><?php echo $data['current_month']; ?></td>
					<td>
						<a href="monthList.php?mt=<?php echo base64_encode($data['current_month']); ?>" class="btn btn-primary">View</a>
					</td>
				</tr>
			<?php }}else{ ?>
				<tr>
					<td colspan="3"><p style="text-align: center;padding: 20px 0;">There is no data avaiable.</p></td>
				</tr>
			<?php } ?>
			
			</table>
	</div>
	
<?php include 'inc/footer.php'; ?>