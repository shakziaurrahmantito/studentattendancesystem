<?php
	$file = realpath(dirname(__FILE__));
	include_once $file."/lib/Session.php";
	Session::init();
	Session::checkLogin();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome Login panel</title>
	<link rel="stylesheet" type="text/css" href="inc/bootstrap.min.css">
	<script type="text/javascript" src="inc/bootstrap.min.js"></script>
	<script type="text/javascript" src="inc/bootstrap.css"></script>
	<script type="text/javascript" src="inc/jquery.js"></script>
	<script type="text/javascript" src="inc/main.js"></script>
	<style type="text/css">
		.main {
			width: 450px;
			margin: 0 auto;
			margin-top: 75px;
			padding: 80px 60px;
			border: 1px solid #ddd;
			border-radius: 5px;
		}
		.error{color: red;}
		.success{color: green;}
	</style>
</head>
	<body>
		<div class="main">
			<h3 style="text-align: center;">Login Panel</h3>
			<div class="panel-body">
				<p style="text-align: center;font-size: 16px;font-style: italic;" id="state"></p>
				<form action="" method="post">
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" id="username">
					</div>

					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password">
					</div>

					<div class="form-group">
						<input type="submit" class="btn btn-primary" id="logins" value="Login">
					</div>
				</form>
			</div>
		</div>
	</body>
</html>