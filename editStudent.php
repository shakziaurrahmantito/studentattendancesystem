<?php include 'inc/header.php'; ?>

	<div class="container">

		<div class="mt-3" style="padding:40px;border: 1px solid #ddd;border-radius: 5px;">
			<h2 class="mb-3">Update Student Data</h2>

		<div class="alert alert-success mt-3" id="stateUpdate" style="font-size: 16px;display: none;"></div>

		<form class="mb-3" action="" method="post">
			<?php
				if (isset($_GET['edit'])) {
					$editRoll 	= $_GET['edit'];
					$editRoll 	= base64_decode($editRoll);
					$result 	= $student->getStudentDataById($editRoll);
					if ($result) {
						$value = $result->fetch_assoc();
					}

			?>
			<div class="form-group">
				<label for="name">Student Name</label>
				<input type="text" class="form-control" name="name" id="name" value="<?php echo $value['studentName']; ?>">
			</div>

			<div class="form-group">
				<label for="name">Student Roll</label>
				<input type="text" class="form-control" name="roll" id="roll" value="<?php echo $value['studentRoll']; ?>">
				<input type="hidden" class="form-control" name="rollNumber" id="rollNumber" value="<?php echo $value['studentRoll']; ?>">
				<input type="hidden" class="form-control" name="sid" id="sid" value="<?php echo $value['studentId']; ?>">
			</div>

			<div class="form-group">
				<input type="submit" class="btn btn-primary" name="addStudent" id="update" value="Update">
			</div>
		<?php }else{
			header("location:index.php");
		} ?>
		</form>
	</div>
	</div>
	
<?php include 'inc/footer.php'; ?>