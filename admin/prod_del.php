<?php session_start(); 

    include("../common/functions.php");
	if (isset($_SESSION['name']) && !empty($_SESSION['password'])) {
		
		$user = $_SESSION['name'];
		$id = $_GET['id'];
	
        $conn = connectdb();
		$query='DELETE FROM Product WHERE product_id=' . $id;
		mysqli_query($conn,$query);
		mysqli_close($conn);
		redirectTo("products.php?action=del");
		

} elseif($_SESSION['name'] != "" &&  $_SESSION['password'] != "") {
	displayMessage("You Do Not Have Sufficient Priviledges To Access This Page", "", "");
} else {
	redirectTo("../admin/gateway.php");
} ?>