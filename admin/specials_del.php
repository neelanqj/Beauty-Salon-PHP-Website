<?php session_start(); 

    include("../common/functions.php");
	if (isset($_SESSION['name']) && !empty($_SESSION['password'])) {
		
		$special = $_GET['d'];
		$price = $_GET['p'];
		$sessions = $_GET['pp'];
	
        $conn = connectdb();
		$query='DELETE FROM specialprice WHERE special="' . $special 
		. '" AND price="' . $price 
		. '" AND sessions="' . $sessions . '"';
		
		mysqli_query($conn,$query);
		mysqli_close($conn);
		
		$conn = connectdb();
		$query='DELETE FROM special WHERE special="' . $special 
		. '" AND (select count(*) from specialprice where special ="'. $special .'") = 0';
		
		mysqli_query($conn,$query);
		mysqli_close($conn);
		
		redirectTo("specials.php?action=del");


} elseif($_SESSION['name'] != "" &&  $_SESSION['password'] != "") {
	displayMessage("You Do Not Have Sufficient Priviledges To Access This Page", "", "");
} else {
	redirectTo("../admin/gateway.php");
} ?>