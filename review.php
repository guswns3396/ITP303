<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Review</title>
</head>
<body>

	<div class="container-fluid">
		<?php include "nav.html"; ?>

		<div class="row row-margin">
			<div class="col col-12 heading">
				<h2>Write a Review</h2>
			</div>
		</div>

		<form action="dorm.php" method="">
			<!-- name, rating, location, price, room -->
			<div class="form-group row">
				<label for="dorm-id" class="col-sm-3 col-form-label text-sm-right">Dorm:</label>
				<div class="col-sm-9">
					<select name="dorm" id="dorm-id" class="form-control">
						<option value="1" selected="">International Residential College</option>
						<option value="2">North</option>
						<option value="3">South</option>
						<option value="4">West</option>
						<option value="5">Village</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label for="name-id" class="col-sm-3 col-form-label text-sm-right">Name:</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="name-id" name="name">
				</div>
			</div>
			
			<div class="form-group row">
				<label for="comment-id" class="col-sm-3 col-form-label text-sm-right">Comment:</label>
				<div class="col-sm-9">
					<textarea class="form-control" id="comment-id" rows="3" name="comment"></textarea>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-9 mt-2">
					<button type="submit" class="btn btn-color rounded-0">Submit</button>
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
<script src="js/review.js"></script>
</body>
</html>