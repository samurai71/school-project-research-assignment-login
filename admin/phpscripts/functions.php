<?php

	function redirect_to($location) {
		if($location != NULL) {
			header("Location: {$location}");
			exit;
		}
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
