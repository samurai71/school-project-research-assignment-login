<?php

	function redirect_to($location) {
		if($location != NULL) {
			header("Location: {$location}");
			exit;
		}
	}

	function url_for($script_path) {
	  // add the leading '/' if not present
	  if($script_path[0] != '/') {
	    $script_path = "/" . $script_path;
	  }
	  return WWW_ROOT . $script_path;
	}

	function u($string="") {
	  return urlencode($string);
	}

	function raw_u($string="") {
	  return rawurlencode($string);
	}

	function h($string="") {
	  return htmlspecialchars($string);
	}

	function is_post_request() {
	  return $_SERVER['REQUEST_METHOD'] == 'POST';
	}

	function is_get_request() {
	  return $_SERVER['REQUEST_METHOD'] == 'GET';
	}

	function display_errors($errors=array()) {
	  $output = '';
	  if(!empty($errors)) {
	    $output .= "<div class=\"errors\">";
	    $output .= "Please fix the following errors:";
	    $output .= "<ul>";
	    foreach($errors as $error) {
	      $output .= "<li>" . h($error) . "</li>";
	    }
	    $output .= "</ul>";
	    $output .= "</div>";
	  }
	  return $output;
	}

	function get_and_clear_session_message() {
	  if(isset($_SESSION['message']) && $_SESSION['message'] != '') {
	    $msg = $_SESSION['message'];
	    unset($_SESSION['message']);
	    return $msg;
	  }
	}

	function display_session_message() {
	  $msg = get_and_clear_session_message();
	  if(!is_blank($msg)) {
	    return '<div id="message">' . h($msg) . '</div>';
	  }
	}


	function greetings(){
		date_default_timezone_set('EST');//found this at php.net date function
		//echo date('l F jS \of Y H:i:s'); // To see what the time and date are
	if(date("H")< 12){
		return "Top of the morning to you";
	}elseif (date("H")> 11 && date("H") < 18) {
		return "Cherio, time for afternoon tea";
	}elseif (date("H") > 17) {
		return "Have a safe evening";
	} // http://www.dreamweaverclub.com/forum/showthread.php?t=25544 is where I found this to get this to work. I changed the funtion name and the messages being displayed
}

?>
