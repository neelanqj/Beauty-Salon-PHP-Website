<?php session_start(); 

    include("../common/functions.php");
	if (isset($_SESSION['name']) && !empty($_SESSION['password'])) {
		
		$servicecategory = $_GET['servicecategory'];
		$service = $_GET['service'];
		
		// Service category clear
        $conn = connectdb();
		$query='DELETE FROM service WHERE servicecategory like "' . $servicecategory 
		. '%" AND service="' . $service . '"';
		
		mysqli_query($conn,$query);
		mysqli_close($conn);
		
		// Service price clear
		/*
		$conn = connectdb();
		$query='DELETE FROM serviceprice WHERE servicecategory like "' . $servicecategory 
		. '%" AND service="' . $service . '"';
		
		mysqli_query($conn,$query);
		mysqli_close($conn);
		*/
		
		// Service image clear
		$conn = connectdb();
		$query='DELETE FROM serviceimage WHERE servicecategory like "' . $servicecategory 
		. '%" AND service="' . $service . '"';
		
		mysqli_query($conn,$query);
		mysqli_close($conn);
		
		
		redirectTo("services.php?action=del");

} elseif($_SESSION['name'] != "" &&  $_SESSION['password'] != "") {
	displayMessage("You Do Not Have Sufficient Priviledges To Access This Page", "", "");
} else {
	redirectTo("../admin/gateway.php");
} ?>