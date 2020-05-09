<?php 
	require "config.php";

	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	if ($mysqli->connect_errno) {
		echo "MySQL Connection Error";
		exit();
	}

	// echo "success";

	$mysqli->set_charset("utf8");
	$sql1 = "SELECT * FROM prices;";
	$sql2 = "SELECT * FROM locations;";
	$sql3 = "SELECT * FROM room_types;";

	$prices = $mysqli->query($sql1);
	$locations = $mysqli->query($sql2);
	$room_types = $mysqli->query($sql3);

	if (!$prices || !$locations || !$room_types) {
		echo "SQL Error";
		exit();
	}

	// var_dump($prices);
	// var_dump($locations);
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Search</title>
</head>
<body>

	<div class="container-fluid">
		<?php include "nav.html"; ?>

		<div class="row row-margin">
			<div class="col col-12 heading">
				<h2>Search</h2>
			</div>
		</div>


		<form action="results.php" method="GET">
			<!-- name, rating, location, price, room -->
			<div class="form-group row">
				<label for="name-id" class="col-sm-3 col-form-label text-sm-right">Name:</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="name-id" name="name">
				</div>
			</div>
			<div class="form-group row">
				<label for="location-id" class="col-sm-3 col-form-label text-sm-right">Location:</label>
				<div class="col-sm-6">
					<select name="location_id" id="location-id" class="form-control">
						<option value="" selected>-- All --</option>
						<?php while($row = $locations->fetch_assoc()) : ?>
							<option value="<?php echo $row["location_id"]; ?>">
								<?php echo $row["location_name"]; ?>
							</option>	
						<?php endwhile; ?>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label for="price-id" class="col-sm-3 col-form-label text-sm-right">Price:</label>
				<div class="col-sm-6">
					<select name="price_id" id="price-id" class="form-control">
						<option value="" selected>-- All --</option>
						<?php while($row = $prices->fetch_assoc()) : ?>
							<option value="<?php echo $row["price_id"]; ?>">
								<?php echo $row["price"]; ?>
							</option>	
						<?php endwhile; ?>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label text-sm-right">Room Type:</label>
				<div class="col-sm-6">
					<select name="room_type_id" id="room-id" class="form-control">
						<option value="" selected>-- All --</option>
						<?php while($row = $room_types->fetch_assoc()) : ?>
							<option value="<?php echo $row["room_type_id"]; ?>">
								<?php echo $row["room_type_name"]; ?>
							</option>	
						<?php endwhile; ?>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-3"></div>
				<div class="col-sm-9 mt-2">
					<button type="submit" class="btn btn-color rounded-0">Search</button>
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
</body>
</html>