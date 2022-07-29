<?php include 'inc/header.php'; ?>
	<div class="container">
		<div class="card mb-5">
			<div class="card-header">
				<h2 class="m-0">Add New Student</h2>
			</div>
			<div class="card-body">
			<div class="alert alert-warning" id="stateAdd" style="font-size: 16px;display: none;"></div>

			<form class="mt-3" action="" method="post">
				<div class="form-group">
					<label for="name">Student Name</label>
					<input type="text" class="form-control" name="name" id="name">
				</div>
				<div class="form-group">
					<label for="name">Student Roll</label>
					<input type="text" class="form-control" name="roll" id="roll">
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-primary" name="addStudent" id="add" value="Add Student">
				</div>
			</form>
	</div>
	</div>
<?php include 'inc/footer.php'; ?>