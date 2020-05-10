<?php 
	require "config.php";

	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	if ($mysqli->connect_errno) {
		echo "MySQL Connection Error";
		exit();
	}

	var_dump($_POST);

	$nameSet = false;
	$passSet = false;
	$mailSet = false;

	if (isset($_POST["user_name"]) && !empty($_POST["user_name"])) {
		$nameSet = true;
	}
	if (isset($_POST["user_pass"]) && !empty($_POST["user_pass"])) {
		$passSet = true;
	}
	if (isset($_POST["user_email"]) && !empty($_POST["user_email"])) {
		$mailSet = true;
	}
	$error = true;
	if ($nameSet && $passSet && $mailSet) {

		$sql = "INSERT INTO users (user_name, user_pass, user_admin, user_email) ";
		$sql = $sql . "VALUES (?, ?, 0, ?)";

		$stmt = $mysqli->prepare($sql);
		$stmt->bind_param("sss", $_POST["user_name"], $_POST["user_pass"], $_POST["user_email"]);

		$executed = $stmt->execute();

		if($executed) {
			$added = $stmt->affected_rows;	
			$stmt->close();
			if ($added == 1) {
				$error = false;

				session_start();
				$_SESSION["logged"] = true;
				$_SESSION["user_name"] = $_POST["user_name"];
				$_SESSION["user_admin"] = 0;

				header("Location: ./index.php");
			}
		}
		else {
			echo $mysqli->error;
			$stmt->close();
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Registration Status</title>
</head>
<body>

	<div class="container-fluid">

		<?php include "nav.php"; ?>

		<?php if ($error) : ?>
			<div class="row row-margin justify-content-center">
				<div class="col col-xs-10 welcome-message">
					<h2>
						Registration Failed :(
					</h2>
				</div>
			</div>
		<?php endif; ?>


	</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>