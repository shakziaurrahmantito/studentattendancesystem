<?php
	$file = realpath(dirname(__FILE__));
	include_once $file."/../lib/Session.php";
	include_once $file."/../lib/student.php";
	include_once $file."/../lib/Format.php";
	Session::init();
	Session::checkSession();
	$student = new student();
	$fm 	 = new Format();

?>
<?php
	if (isset($_GET['action']) && $_GET['action'] == "logout") {
		Session::destroy();
		header("location:login.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Student/Employee Attendance System PHP</title>
		<link rel="stylesheet" type="text/css" href="inc/bootstrap.min.css">
	</head>
	<body>
		<nav class="navbar navbar-dark sticky-top bg-dark navbar-expand-lg">
        	<div class="container">
          		<a class="navbar-brand" href="index.php">Online - Attendance System</a>

		        <button class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#navBar"><span class="navbar-toggler-icon"></span></button>

		        <div class="collapse navbar-collapse" id="navBar">
	              <ul class="navbar-nav ml-auto">
	                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
	                <li class="nav-item"><a class="nav-link" href="add.php">Add Student</a></li>
	                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-toggle="dropdown" href="">List</a>
	                  <div class="dropdown-menu">
	                    <a class="dropdown-item" href="view_date.php">Day by day List</a>
	                    <a class="dropdown-item" href="viewMonths.php">Month by month List</a>
	                  </div>
	                </li>
	                <li class="nav-item"><a class="nav-link" href="studnetlist.php">Student List</a></li>
	                <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
	                <li class="nav-item"><a class="nav-link" href="?action=logout">Logout</a></li>
	             </ul>
          	</div>
        </div>
      </nav>
	