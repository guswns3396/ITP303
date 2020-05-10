<?php 
	require "config.php";

	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	if ($mysqli->connect_errno) {
		header("location: ./error.php");
		exit();
	}

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Home</title>
</head>
<body>

	<div class="container-fluid">
		<?php include "nav.php"; ?>

		<!-- top section -->
		<div class="row home-image">

			<!-- slide show -->
			<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
			  <div class="carousel-inner">
			    <div class="carousel-item active">
			      <img class="d-block w-100" src="images/slider1.jpg" alt="First slide">
			    </div>
			    <div class="carousel-item">
			      <img class="d-block w-100" src="images/slider2.jpg" alt="Second slide">
			    </div>
			    <div class="carousel-item">
			      <img class="d-block w-100" src="images/slider3.jpg" alt="Third slide">
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

			<h6>JUST A GLIMPSE OF YOUR NEW HOME</h6>
		</div>

		<div class="row row-margin justify-content-center">
			<div class="col col-xs-10 welcome-message">
				<h2>Welcome to the Trojan family!</h2>
				<h5>Let us help find your best housing...</h5>
			</div>
		</div>

		<div class="row justify-content-around row-margin">
			<div class="col col-10 col-md-5 box">
				<h4>Search</h4>
				<hr>
				<p>Use our search form to quickly find a dorm that fits your criteria</p>
				<a class="btn btn-color btn-position rounded-0" href="search.php" role="button">SEARCH</a>
			</div>
			<div class="col col-10 col-md-5 box">
				<h4>Browse</h4>
				<hr>
				<p>Use our browse page to simply look for dorms from our list</p>
				<a class="btn btn-color btn-position rounded-0" href="browse.php" role="button">BROWSE</a>
			</div>
		</div>

		<div class="row justify-content-center row-margin">
			<div class="col col-10 box">
				<h4>About Us</h4>
				<hr>
				<p>Adjusting to a new environment is hard - especially if you are away from home and family. That's why we want to make your transition to college life as easy as possible by providing you with information about housing options directly from fellow students.</p>
			</div>
		</div>
	</div>

<!-- 	<div class="footer-div">
		<div class="footer">
			Copyright 2020 University of Southern California. All rights reserved.
		</div>
	</div> -->



<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>