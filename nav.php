<?php
	if (session_status() != PHP_SESSION_ACTIVE) {
		session_start();
		
		if (!isset($_SESSION["logged"]) || empty($_SESSION["logged"])) {
			$_SESSION["logged"] = false;
		}

		// $_SESSION["logged"] = true;
	}

	var_dump($_SESSION);
?>
<!-- header -->
<div class="row header">

	<!-- nav bar -->
	<div class="col col-3 center">
		<nav class="navbar navbar-expand-lg navbar-light">
		  <button class="navbar-toggler button-color" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNav">
		    <ul class="navbar-nav">
		      <li class="nav-item">
		        <a class="nav-link" href="index.php"><span class="item-color">Home</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="search.php"><span class="item-color">Search</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="browse.php"><span class="item-color">Browse</span></a>
		      </li>
		    </ul>
		  </div>
		</nav>
	</div>

	<!-- title -->
	<div class="col col-6 center" id="title">
		<a href="index.php">
			<h1><span>USC </span>Rate My Dorm</h1>
		</a>
	</div>

	<?php if (!$_SESSION["logged"]) : ?>
		<div class="col col-2 item-color log">
			<a href="login.php">LOG IN</a>
		</div>
	<?php else : ?>
		<div class="col col-1 item-color log">
			<h5><?php echo $_SESSION["user_name"]; ?></h5>
		</div>
		<div class="col col-1 item-color log">
			<a href="loggedout.php">LOG OUT</a>
		</div>
	<?php endif; ?>

	<!-- icon -->
	<div class="col col-1" id="icon">
		<img src="images/icon.png" alt="USC icon"/>
	</div>

</div>