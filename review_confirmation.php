<?php 
	require "config.php";

	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	if ($mysqli->connect_errno) {
		echo "MySQL Connection Error";
		exit();
	}

	$isUpdate = (int)$_POST["isUpdate"];
	date_default_timezone_set('America/Los_Angeles');
	$date = date("Y-m-d");
	
	echo $date;
	var_dump($_POST);

	if ($isUpdate) {
		$sql = "UPDATE "
	}
	else {
		$sql = "INSERT INTO reviews (review_comment, review_rating, review_date, user_name, dorm_id) ";
		$sql = $sql . "VALUES(?, ?, ?, ?, ?)";
		
		$stmt = $mysqli->prepare($sql);
		$stmt->bind_param("sdssi", $_POST["review_comment"], $_POST["review_rating"], $date, $_POST["user_name"], $_POST["dorm_id"]);

		$executed = $stmt->execute();
		if(!$executed) {
			echo $mysqli->error;
			exit();
		}
		// echo $stmt->affected_rows;

		$stmt->close();
	}
	header("Location: ./dorm.php?dorm_id=" . $_POST["dorm_id"]);
?>