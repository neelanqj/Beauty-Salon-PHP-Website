<?php 
include("common/functions.php");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<title>Products</title>
<link href="http://fonts.googleapis.com/css?family=Lobster+Two" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="src/library/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="src/custom/css/page.css"/>
<link rel="stylesheet" type="text/css" href="src/custom/css/products.css"/>
<script type="text/javascript" src="src/custom/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="src/custom/js/page.js"></script>
</head>

<body>
	<div id="body"></div>
    <?php include('src/custom/inc/logo-container.inc.php'); ?>
    
    <div id="product-desc" class="purple-transparent hide-div text-center">
    <br/>
   	<center>About our Products</center><br/>

The Dead Sea is a closed salt lake that formed three millions years ago in western Arabia. The lake is situated in a tectonic depression of the Negev Desert in Israel, about 500 meters below the world ocean level, which point on lowest place on Earth.<br/><br/>
﻿
Seavital's ﻿Dead sea cosmetics utilizes salubrious and regenerative properties of the Dead Sea minerals and herbal components almost in their original form in order to create the finest in cosmetics.
<br/><br/>
    </div>
    
    <div id="products">
   	<center><img src="src/custom/img/seavital.png"/></center>
    	<center><h1>Products</h1></center><br/>
		<?php
        $conn2 = connectdb();
        $query2 = "SELECT * FROM product ORDER BY description";
        $result2 = mysqli_query($conn2, $query2) or die(mysqli_error($conn2));
		
        while($row = $result2->fetch_assoc()){
		?>
        <div class="prod-row">
            <div class="col1"><img src="../uploads/<?php echo $row['image']; ?>"></div>
            <div class="prod-col col2"><?php echo $row['description']; ?></div>
            <div class="prod-col price-col"><?php echo $row['price']; ?></div>
        </div>
        <?php 
		}?>
    </div>
    
    
    
</body>
</html>