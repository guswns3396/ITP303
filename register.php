<?php 
	require "config.php";

	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	if ($mysqli->connect_errno) {
		header("location: ./error.php");
		exit();
	}

	// echo "success";

	$mysqli->set_charset("utf8");

	// var_dump($_GET);
	$sql = "SELECT * FROM dorms NATURAL JOIN locations NATURAL JOIN prices";
	$sql = $sql . " NATURAL JOIN room_types WHERE 1=1";

	foreach ($_GET as $key => $val) {
		if (isset($val) && !empty($val)) {
			$sql = $sql . " AND ";	
			if ($key == "name") {
				$sql = $sql . "dorm_name LIKE '%" . $val . "%'";
			}
			else {
				$sql = $sql . $key . " = " . $val;
			}	
		}
	}
	$sql = $sql . ";";
	// echo $sql;

	$results = $mysqli->query($sql);

	if (!$results) {
		header("location: ./error.php");
		exit();
	}
	// var_dump($results);

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Register</title>
</head>
<body>

	<div class="container-fluid">
		<?php include "nav.php"; ?>

		<div class="row row-margin">
			<div class="col col-12 heading">
				<h2>Register</h2>
			</div>
		</div>

		<form action="registered.php" method="POST">
			<div class="form-group row">
				<label for="email-id" class="col-sm-3 col-form-label text-sm-right">Email:</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="email-id" name="user_email">
					<small class="form-text text-danger hidden">
						You must type in a valid email
					</small>
				</div>
			</div>
			<div class="form-group row">
				<label for="name-id" class="col-sm-3 col-form-label text-sm-right">User Name:</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="name-id" name="user_name">
					<small class="form-text text-danger hidden">
						You must type in a valid user name
					</small>
				</div>
			</div>
			<div class="form-group row">
				<label for="pw-id" class="col-sm-3 col-form-label text-sm-right">Password:</label>
				<div class="col-sm-6">
					<input type="password" class="form-control" id="pw-id" name="user_pass">
					<small class="form-text text-danger hidden">
						Your password must be at least 7 characters
					</small>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-3"></div>
				<div class="col-sm-9 mt-2">
					<button type="submit" class="btn btn-color rounded-0">SIGN UP</button>
				</div>
			</div>
		</form>

		
	</div>
		

<!-- 	<div class="footer">
		Copyright 2020 University of Southern California. All rights reserved.
	</div> -->


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="js/register.js"></script>
</body>
</html>