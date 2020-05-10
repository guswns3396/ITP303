<?php 
	require "config.php";

	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	if ($mysqli->connect_errno) {
		echo "MySQL Connection Error";
		exit();
	}

	$stmt = $mysqli->prepare("SELECT * FROM users WHERE user_name = ?");
	$stmt->bind_param("s", $_POST["user_name"]);
	$stmt->execute();

	$result = $stmt->get_result();
	$user = $result->fetch_assoc();

	$stmt->close();

	if (isset($user) && !empty($user)) {
		session_start();

		if ($_POST["user_pass"] == $user["user_pass"]) {
			$_SESSION["logged"] = true;
			$_SESSION["user_name"] = $user["user_name"];
			$_SESSION["user_admin"] = $user["user_admin"];
			header("Location: ./index.php");
		}
		else {
			$_SESSION["logged"] = false;
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Log In Status</title>
</head>
<body>

	<div class="container-fluid">

		<?php include "nav.php"; ?>

		<?php if (!$_SESSION["logged"]) : ?>
			<div class="row row-margin justify-content-center">
				<div class="col col-xs-10 welcome-message">
					<h2>
						Username / Password Incorrect :(
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