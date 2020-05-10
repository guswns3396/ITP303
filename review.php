<?php 
	require "config.php";

	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	if ($mysqli->connect_errno) {
		header("location: ./error.php");
		exit();
	}

	// echo "success";

	$mysqli->set_charset("utf8");

	if (session_status() != PHP_SESSION_ACTIVE) {
		session_start();
		
		if (!isset($_SESSION["logged"]) || empty($_SESSION["logged"])) {
			$_SESSION["logged"] = false;
		}
	}
	if (!$_SESSION["logged"]) {
		header("location: ./login.php");
	}

	$sql = "SELECT * FROM dorms;";

	$dorms = $mysqli->query($sql);

	if (!$dorms) {
		header("location: ./error.php");
		exit();
	}

	var_dump($_POST);

	$isUpdate = 0;
	if (isset($_POST["isUpdate"]) && !empty($_POST["isUpdate"])) {
		$isUpdate = 1;
		$sql = "SELECT * FROM reviews WHERE review_id = ";
		$sql = $sql . $_POST["review_id"];

		$result = $mysqli->query($sql);
		if (!$result) {
			header("location: ./error.php");
			exit();
		}
		$review = $result->fetch_assoc();
	}
?>
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
		<?php include "nav.php"; ?>

		<div class="row row-margin">
			<div class="col col-12 heading">
				<h2>Write a Review</h2>
			</div>
		</div>

		<form action="review_confirmation.php" method="POST">
			<input type="hidden" name="isUpdate" value="<?php echo $isUpdate; ?>"/>
			<?php if ($isUpdate) : ?>
				<input type="hidden" name="review_id" value="<?php echo $_POST["review_id"]; ?>"/>
			<?php endif; ?>
			<input type="hidden" name="isUpdate" value="<?php echo $isUpdate; ?>"/>
			<div class="form-group row">
				<label for="name-id" class="col-sm-3 col-form-label text-sm-right">Name:</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="name-id" name="user_name" placeholder="<?php echo $_SESSION["user_name"]; ?>" value="<?php echo $_SESSION["user_name"]; ?>" readonly>
				</div>
			</div>
			<div class="form-group row">
				<label for="dorm-id" class="col-sm-3 col-form-label text-sm-right">Dorm:</label>
				<div class="col-sm-6">
					<select name="dorm_id" id="dorm-id" class="form-control">
						<?php while ($row = $dorms->fetch_assoc()) : ?>
							<?php if ($row["dorm_id"] == $review["dorm_id"]) : ?>
								<option value="<?php echo $row["dorm_id"]; ?>" selected>
									<?php echo $row["dorm_name"]; ?>
								</option>
							<?php else : ?>
								<option value="<?php echo $row["dorm_id"]; ?>">
									<?php echo $row["dorm_name"]; ?>
								</option>
							<?php endif; ?>
						<?php endwhile; ?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label for="rating-id" class="col-sm-3 col-form-label text-sm-right">Rating:</label>
				<div class="col-sm-5">
					<input type="range" class="custom-range" min="0" max="5" step="0.1" id="rating-id" name="review_rating">
				</div>
				<div class="col-sm-1" id="slider-val">
					<span>2.5</span>
				</div>
			</div>
			
			<div class="form-group row">
				<label for="comment-id" class="col-sm-3 col-form-label text-sm-right">Comment:</label>
				<div class="col-sm-6">
					<textarea class="form-control" id="comment-id" rows="3" name="review_comment"><?php if ($isUpdate) echo $review["review_comment"]; ?></textarea>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6 mt-2">
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