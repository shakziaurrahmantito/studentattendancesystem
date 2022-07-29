<?php include 'inc/header.php';?>
	<div class="container">
		<div class="card mb-5">
			<div class="card-header">
				<h2 class="m-0">Student List</h2>
			</div>
			<div class="card-body">
			<table class="table table-hover">
				<thead>
					<tr class="table-info">
						<th width="25%">Serial</th>
						<th width="25%">Student Name</th>
						<th width="25%">Student Roll</th>
						<th width="25%">Action</th>
					</tr>
				</thead>
				<tbody>
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
						<a  href="editStudent.php?edit=<?php echo base64_encode($data['studentId']); ?>" class="btn btn-primary">Edit</a> 
						<a onclick="return confirm('Are your sure remove.')" href="proccess.php?del=<?php echo $data['studentId']; ?>" class="btn btn-danger">Delete</a>
					</td>
				</tr>
			<?php }}else{ ?>
				<tr>
					<td colspan="4"><p style="text-align: center;padding: 20px 0;">There is no data avaiable.</p></td>
				</tr>
			<?php } ?>

					
			</tbody>
			</table>

	</div>

	</div>
	
<?php include 'inc/footer.php'; ?>