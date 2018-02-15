<?php 
	function logIn($username, $password, $ip) {
		require_once("connect.php");
		$username = mysqli_real_escape_string($link,$username);
		$password = mysqli_real_escape_string($link,$password);
		$loginString = "SELECT * FROM tbl_user WHERE user_name='{$username}' AND user_pass = '{$password}'";
		//echo $loginString;
		$user_set = mysqli_query($link, $loginString);

		if(mysqli_num_rows($user_set)) {
			$found_user = mysqli_fetch_array($user_set, MYSQLI_ASSOC);
			//echo $found_user['user_fname'];
			$id = $found_user['user_id'];
			$_SESSION['users_creds']= $id;
			$_SESSION['users_name']= $found_user['user_name'];
			if(mysqli_query($link, $loginString)){
				// $loginDate = date("Y-m-d H:i:s"); I was trying to get the date and time into the database
				// $updateString = "UPDATE tbl_user SET user_ip='{$ip}' WHERE user_id={$id}" . "UPDATE tbl_user SET user_date='{$loginDate}' WHERE user_id={$id}"; I thought I could concantonate the query to have it add the date and time to the table 
				$updateString = "UPDATE tbl_user SET user_ip='{$ip}' WHERE user_id={$id}";
				$updateQuery = mysqli_query($link, $updateString);

			}

			redirect_to("admin_index.php");

		}else{
			$message = "Danger Will Robinson Danger! Username/Password was incorrect. You now have X chances to get it right";
			return $message;
		}
		mysqli_close($link);
	}





 ?>