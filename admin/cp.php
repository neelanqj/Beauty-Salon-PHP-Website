<?php session_start();
	include('../common/functions.php');
	
	if($_SESSION['name'] != "" && $_SESSION['password'] != "")
		{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Control Panel</title>
<style>
	#menu {
		position:relative;
		margin-left:auto;
		margin-right:auto;
		padding:10px;
		width:300px;
		display:block;
		background-color:#DEB887;
		text-align:center;
	}
	
	#menu a {
		text-decoration:none;
	}
</style>
</head>
<body>

    <div id="menu">
        <h1><img src="../src/custom/img/cp-icon.png" width="256" height="256" /></h1><br/>
		<a href="services.php">Services</a><br/><br/>
        <a href="specials.php">Specials</a><br/><br/>
        <a href="products.php">Products</a><br/><br/>
        
    </div>
    <br/><br/><br/>
    <center>
    <a href="logout.php">Log Out Of Control Panel</a>
    <br/><br/>
    <?php include('../common/footer.php') ?>
    </center>
</body>
</html>
<?php 
} elseif($_SESSION['name'] != "" &&  $_SESSION['password'] != "") {
	displayMessage("You Do Not Have Sufficient Priviledges To Access This Page", "", "");
} else {
	redirectTo("../admin/gateway.php");
} ?>