<?php

	$file = realpath(dirname(__FILE__));

	include_once $file."/lib/Session.php";
	include_once $file."/lib/student.php";

	Session::init();
	Session::checkSession();

	$student = new student();

?>

<?php

	
	
	if (isset($_GET['del'])) {
			$delId = $_GET['del'];
			$student->deleteAttendanceData($delId);
			$student->removeStudentData($delId);
			header("location:studnetlist.php");
		}

	

?>


	
				

		