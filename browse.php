<?php 
	require "config.php";

	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	if ($mysqli->connect_errno) {
		echo "MySQL Connection Error";
		exit();
	}

	// echo "success";

	$mysqli->set_charset("utf8");
	$sql = "SELECT * FROM dorms;";
	$results = $mysqli->query($sql);

	if (!$results) {
		echo "SQL Error";
		exit();
	}

	// var_dump($results);
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Browse</title>
</head>
<body>

	<div class="container-fluid">

		<?php include "nav.html"; ?>

		<div class="row row-margin">
			<div class="col col-12 heading">
				<h2>Browse</h2>
			</div>
		</div>

		<div class="row justify-content-around row-margin">
			<?php while($row = $results->fetch_assoc()) :?>
				<!-- <?php
					$path = str_replace(" ", "%20", $row["dorm_name"]);
					echo $path;
				?> -->
				<div class="col col-10 col-md-5 box img-box">
					<a href="dorm.php?dorm_id=<?php echo $row["dorm_id"]; ?>">
						<img src="images/<?php echo $path ; ?>/1.jpg" alt="dorm" />
						<hr>
						<h4><?php echo $row["dorm_name"] ?></h4>
					</a>
				</div>
			<?php endwhile; ?>
		</div>
	</div>

	<!-- <div class="footer-div">
		<div class="footer">
			Copyright 2020 University of Southern California. All rights reserved.
		</div>
	</div> -->

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>