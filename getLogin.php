<?php
	$file = realpath(dirname(__FILE__));
	include_once $file."/lib/student.php";
	$student = new student();
?>
<?php

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$student->getAdminLogin($_POST);
	}

?>
