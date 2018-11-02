<?php session_start(); 

    include("../common/functions.php");
	if (isset($_SESSION['name']) && !empty($_SESSION['password'])) {
		
		$servicecategory = $_GET['servicecategory'];
		$service = $_GET['service'];
		$image = $_GET['image'];
				
		// Service price clear
		$conn = connectdb();
		$query='DELETE FROM serviceimage WHERE servicecategory like "' . $servicecategory 
		. '%" AND service="' . $service . '" AND imagepath ="' .$image . '"';
		//echo $query;
		mysqli_query($conn,$query);
		mysqli_close($conn);		
		
		redirectTo("services.php?action=del");

} elseif($_SESSION['name'] != "" &&  $_SESSION['password'] != "") {
	displayMessage("You Do Not Have Sufficient Priviledges To Access This Page", "", "");
} else {
	redirectTo("../admin/gateway.php");
} ?>