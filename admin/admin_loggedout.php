<?php 
	// ini_set('display_errrors', 1);
	// error_reporting(E_All);
	require_once('phpscripts/init.php');
	


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
		background: url('images/terminator2-xlarge.jpeg') no-repeat fixed;
		background-size: cover;
	}

	.panel {
		background-color: rgba(255, 255, 255, .8);
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
	<h1>Your login session has been TERMINATED!</h1>
	<p>We want you back!! </p>
	<p><a href="admin_login.php" class="button round">Click here to login</a></p>
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