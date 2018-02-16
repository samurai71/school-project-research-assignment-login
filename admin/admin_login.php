<?php
	// ini_set('display_errrors', 1);
	// error_reporting(E_All);

	$ip = $_SERVER["REMOTE_ADDR"];
	//echo $ip;

	require_once("phpscripts/init.php");

	if(isset($_POST['submit'])) {
		//echo "Congrats, you're a good clicker";
		$username = trim($_POST['username']); //trim is to take out any spaces from doing a copy and paste
		$password = trim($_POST['password']);

		if($username != "" && $password != "") {
			$result = logIn($username, $password, $ip);
			$message = $result;
			//echo "All Good!";
		}else {
			$message = "Please fill in the required fields";
		}
	}

 ?>
 <!doctype html>
 <html>
 <head>
 	<meta charset="UTF-8">
 	<title>Log in Here</title>
 	<link rel="stylesheet" href="css/normalize.css" />
 	<link rel="stylesheet" href="css/foundation.min.css" />
 	<link rel="stylesheet" href="css/app.css" />
 	<link rel="stylesheet" href="js/vendor/modernizr.js" />

 	<style media="screen" type="text/css">

 	body {
 		background-color: #666666;
 	}

 	</style>
 </head>
 <body>
 <section id="login">
 <h1 class="hidden">CMS login Page</h1>
  <div class="row panel">
  <div class="small-10 medium-offset-4 medium-6 large-offset-4 large-4 columns">
 <h1>CMS Login</h1>
 <?php
 		if(!empty($message)) {echo $message;}
  ?>

 <form action="admin_login.php" method="post">
 	<label>Username:</label>
 	<input type="text" name="username" value="">
 	<label>Password:</label>
 	<input type="password" name="password" value=""><a href=""></a>
 	<input type="submit" name="submit" value="Login">
 </form></div>
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
