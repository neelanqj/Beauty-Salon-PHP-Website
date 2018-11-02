<?php session_start(); 

	if (isset($_SESSION['name']) && !empty($_SESSION['password'])) {
		
		$user = $_SESSION['name'];
		
		if (isset($_GET['title']) && isset($_GET['page'])) {
			$title = $_GET['title'];
			$page = $_GET['page'];
		}
		
        include("../common/functions.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../src/custom/css/common.css" rel="stylesheet" type="text/css" media="all">
<title>Add Product</title>
	<script type="text/javascript">
        function checkEnableSubmit(name, description, image) {
              if (name != "" && description != "" && image != "") // some logic to determine if it is ok to go
                {
                    document.getElementById("submit").disabled = false;
                }
              else // in case it was enabled and the user changed their mind
                {
                    document.getElementById("submit").disabled = true;
                }
            }
    </script>
    
    <link rel="stylesheet" type="text/css" href="../src/library/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="../src/library/bootstrap/css/bootstrap-theme.css"/>
    <script type="text/javascript" src="../src/library/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<div id="main" style="text-align:center; width:80%; ">
           <div id="left_col">
                <h1>Product List</h1><br/>
                <?php
                    $conn2 = connectdb();
                    $query2 = "SELECT * FROM product";
                    $result2 = mysqli_query($conn2, $query2) or die(mysqli_error($conn2));
                    echo '
                    <table class="table" align="center">
                        <thead>
                            <tr>
                                <td><b>Image</b></td>
                                <td><b>Description</b></td>
                                <td><b>Price</b></td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>';
                    while($row = $result2->fetch_assoc()){
                        echo '<tr>
                                <td><img src="..\\uploads\\'.$row['image'].'"></td>
                                <td>' . $row['description']	. '</td>
                                <td>'. $row['price'] . '</td>
                                <td><a href="prod_del.php?id=' . $row['product_id']. '">Del</a></td>
                              </tr>';
                    }
                    echo '</tbody>
                    </table>';
                    mysqli_close($conn2);
				?>
        </div>
		<div id="right_col">
		<?php
            if (isset($_GET['action']) && $_GET['action'] == 'add') {
                $title = $_POST['title'];
                $price = $_POST['price'];
                $status = $_POST['status'];
                
                include('../common/uploadphoto.php');
                
                if ($image_name != "") {	
                    $conn = connectdb();
                    $query = "INSERT INTO product (image, description, price) VALUES ('$image_name',  '$title', '$price')";
					
                    mysqli_query($conn, $query) or die(mysqli_error($conn));
					mysqli_close($conn);
					
				}
			}
            ?>
               <h1>Add Product</h1><br/>
               <form action='products.php?action=add&title=photo' 
               name='create_album' method='post' enctype="multipart/form-data">
                    <b>Product Description</b><br/>
                    <input type="text" name="title" style="width:100%"  onkeyup="checkEnableSubmit(document.create_album.price.value, document.create_album.title.value, document.create_album.image.value)"/><br/><br/>
                    <b>Add Photography Piece Image:</b>
                    <!-- <input type="hidden" name="MAX_FILE_SIZE" value="100000" /> -->
                    <input type="file" name="image"
                    onchange="checkEnableSubmit(document.create_album.price.value, 
                    document.create_album.title.value, document.create_album.image.value)"><br/><br/>
                    <b>Price (you can also have text here)</b><br/>
                    <input type="text" name="price" style="width:100%" onkeyup="checkEnableSubmit(document.create_album.price.value, document.create_album.title.value, document.create_album.image.value)"></textarea><br/><br/>
                    <input type="hidden" name="status" value="available"/>
                       <center><input type="submit" value="Add Photo" style="width:100%" 
                    id="submit" disabled="disabled" /></center>
                </form>
           </div>           
       </div>
       <?php include('../common/footer.php'); ?>
       
       <?php
			if (isset($_GET['action']) && $_GET['action'] == 'add') {
					echo '<script language="javascript">alert("Product added")</script>';
					redirectTo("products.php");

			} else if(isset($_GET['action']) && $_GET['action'] == 'del') {
					echo '<script language="javascript">alert("Product deleted")</script>';

			}
	   ?>
</body>
</html>
<?php 
		} elseif($_SESSION['name'] != "" &&  $_SESSION['password'] != "") {
			displayMessage("You Do Not Have Sufficient Priviledges To Access This Page", "", "");
		} else {
			redirectTo("../admin/gateway.php");
		} ?>