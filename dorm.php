<?php
	require "config.php";

	// echo $_GET["dorm_id"];

	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	if ($mysqli->connect_errno) {
		echo "MySQL Connection Error";
		exit();
	}

	$error = true;

	if (isset($_GET["dorm_id"]) && !empty($_GET["dorm_id"])) {

		$mysqli->set_charset("utf8");

		$sql = "SELECT * FROM dorms WHERE dorm_id = ";
		$sql = $sql . $_GET["dorm_id"] . ";";
		// echo $sql;

		$results = $mysqli->query($sql);

		if (!$results) {
			echo "SQL Error";
			exit();
		}

		$dorm = $results->fetch_assoc();
	}

	if (isset($dorm) && !empty($dorm)) {
		$error = false;

		$path = str_replace(" ", "%20", $dorm["dorm_name"]);
		// echo $path;

		$sql = "SELECT * FROM locations WHERE location_id = ";
		$sql = $sql . $dorm["location_id"];
		// echo $sql;

		$results = $mysqli->query($sql);
		$location = $results->fetch_assoc();
		// echo $location["location_name"];	

		$sql = "SELECT * FROM prices WHERE price_id = ";
		$sql = $sql . $dorm["price_id"];
		// echo $sql;

		$results = $mysqli->query($sql);
		$price = $results->fetch_assoc();
		// echo $price["price"];

		$sql = "SELECT * FROM room_types WHERE room_type_id = ";
		$sql = $sql . $dorm["room_type_id"];
		// echo $sql;

		$results = $mysqli->query($sql);
		$room = $results->fetch_assoc();
		// echo $room["room_type_name"];

		$desc = "";
		for ($i = 0; $i < 330; $i++) {
			$desc = $desc . $dorm["dorm_desc"][$i];
		}
		$desc = $desc . " ... ";
		// echo $desc;
	}

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Dorm</title>
</head>
<body>

	<div class="container-fluid">

		<?php include "nav.html"; ?>

		<?php if (!$error) : ?>
			<!-- slide show -->
			<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
			  <div class="carousel-inner">
			    <div class="carousel-item active">
			      <img class="d-block w-100" src="images/<?php echo $path ; ?>/1.jpg" alt="First slide">
			    </div>
			    <div class="carousel-item">
			      <img class="d-block w-100" src="images/<?php echo $path ; ?>/2.jpg" alt="Second slide">
			    </div>
			    <div class="carousel-item">
			      <img class="d-block w-100" src="images/<?php echo $path ; ?>/3.jpg" alt="Third slide">
			    </div>
			  </div>
			  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
			    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
			    <span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>
		<?php endif; ?>

		<?php if ($error) : ?>
			<div class="row row-margin justify-content-center">
				<div class="col col-xs-10 welcome-message">
					<h2>
						The dorm does not exist :o
					</h2>
				</div>
			</div>
		<?php else : ?>
			<div class="row row-margin justify-content-center">
				<div class="col col-xs-10 welcome-message">
					<h2>
						<?php echo $dorm["dorm_name"]; ?>
					</h2>
				</div>
			</div>

			<div class="row justify-content-around row-margin">
				<div class="col col-10 col-md-5 box">
					<h4>Quick Overview</h4>
					<hr>
					<ul>
						<li>Location: <?php echo $location["location_name"]; ?></li>
						<li>Rating: 3.9</li>
						<li>Price: <?php echo $price["price"]; ?></li>
						<li>Room Type: <?php echo $room["room_type_name"]; ?></li>
					</ul>
				</div>
				<div class="col col-10 col-md-5 box">
					<h4>Write a Review</h4>
					<hr>
					<p>Help the incoming freshmen pick which dorm they should live in. Write a review for the dorm here!</p>
					<a class="btn btn-color btn-position rounded-0" href="review.php?dorm_id=<?php echo $dorm["dorm_id"]; ?>" role="button">REVIEW</a>
				</div>
			</div>

			<div class="row justify-content-center row-margin">
				<div class="col col-10 box" id="desc-box">
					<h4>About</h4>
					<hr>
					<p id="short"><?php echo $desc; ?></p>
					<p id="long" class="hidden"><?php echo $dorm["dorm_desc"]; ?></p>
					<h6 id="more">show more</h6>
					<h6 id="less" class="hidden">show less</h6>
				</div>
			</div>

			<hr>

			<div class="row justify-content-center row-margin">
				<div class="col col-12 box">
					<h4>Ratings</h4>
					<div class="table-responsive review">
						<table class="table table-hover mt-4">
							<thead>
								<tr>
									<th>Name</th>
									<th>Date</th>
									<th>Rating</th>
									<th>Comment</th>
									<th></th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Jack Yang</td>
									<td>August 20, 2019</td>
									<td>4.5</td>
									<td>Amazing place with amazing people!</td>
									<td>
										<a href="review.php" class="btn btn-color rounded-0">
											UPDATE
										</a>
									</td>
									<td>
										<a href="dorm.php" class="btn btn-color-danger rounded-0">
											DELETE
										</a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>

<!-- 	<div class="footer-div">
		<div class="footer">
			Copyright 2020 University of Southern California. All rights reserved.
		</div>
	</div> -->


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="dorm.js"></script>
</body>
</html>