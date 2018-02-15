<?php
	
	 // ini_set('display_errors',1);
  //    error_reporting(E_ALL);
	
	// require_once('admin/phpscripts/init.php');

	// if(isset($_GET['filter'])) {
	// 	$tbl1 = "tbl_movies";
	// 	$tbl2 = "tbl_cat";
	// 	$tbl3 = "tbl_l_mc";
	// 	$col1 = "movies_id";
	// 	$col2 = "cat_id";
	// 	$col3 = "cat_name";
	// 	$filter = $_GET['filter'];
	// 	$getMovies = filterType($tbl1, $tbl2, $tbl3, $col1, $col2, $col3, $filter);
	// }else{
	// 	$tbl = "tbl_movies";
	// 	$getMovies = getAll($tbl);
	// }
	header("Location: admin/admin_index.php");
	
?>
