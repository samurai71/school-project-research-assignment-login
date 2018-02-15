<?php 
	// ini_set('display_errrors', 1);
	// error_reporting(E_All);
	require_once('phpscripts/init.php');
	confirm_logged_in();
	//include('welcome.php');


 ?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Welcome to your Admin Panel</title>
	<link rel="stylesheet" href="css/normalize.css" />
	<link rel="stylesheet" href="css/foundation.min.css" />
	<link rel="stylesheet" href="css/app.css" />
	<link rel="stylesheet" href="js/vendor/modernizr.js" />
	<style media="screen" type="text/css">

	body {
		background: url('images/Daniel-Craig-james-bond-BW.jpeg') no-repeat fixed;
		background-size: cover;
	}

	.panel {
		background-color: rgba(255, 255, 255, .5);
		margin-top: 1em;
		border: none;
	}

	.username {
		font-weight: bold;
		font-style: italic;
	}

	</style>
</head>
<body>
	<section>
	<div class="row panel">
	<h1><?php echo greetings(); ?> <span class="username"><?php echo $_SESSION['users_name']; ?></span></h1>
	<p>I hope you are well since your last successful login: <?php echo $_SESSION['users_name']; ?>  at</p>
	<p>The force is strong in you <span class="username"><?php echo $_SESSION['users_name']; ?></span></p>
	<a href="phpscripts/caller.php?caller_id=logout" class="button round success">Log out you must!</a>
	</div>
	</section>

	<script src="js/vendor/jquery.js"></script>
	   <script src="js/foundation.min.js"></script>
	   <script src="js/main.js"></script>
	   <script>
	     $(document).foundation();
	   </script>
</body>
</html>