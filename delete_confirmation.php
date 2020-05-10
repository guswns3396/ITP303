<?php 
	require "config.php";

	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	if ($mysqli->connect_errno) {
		header("location: ./error.php");
		exit();
	}

	$sql = "DELETE FROM reviews WHERE review_id = ?";
	
	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param("i", $_POST["review_id"]);

	$executed = $stmt->execute();
	if(!$executed) {
		header("location: ./error.php");
		exit();
	}
	// echo $stmt->affected_rows;

	$stmt->close();

	header("Location: ./dorm.php?dorm_id=" . $_POST["dorm_id"]);
?>