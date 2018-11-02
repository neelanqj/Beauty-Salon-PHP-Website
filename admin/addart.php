<?php session_start(); 

	$user = $_SESSION['name'];
	$title = $_GET['title'];
	$page = $_GET['page'];
	
	if($_SESSION['name'] != "" && $_SESSION['password'] != "")
		{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/common.css" rel="stylesheet" type="text/css" media="all">
<title>Add Art</title>
	<script type="text/javascript">
        function checkEnableSubmit(name, description) {
              if (name == "" || description == "") // some logic to determine if it is ok to go
                {
                    document.getElementById("submit").disabled = true;
                }
              else // in case it was enabled and the user changed their mind
                {
                    document.getElementById("submit").disabled = false;
                }
            }
    </script>
    <style>
    div#center_form{position:relative; width:600px; padding:10px; margin: auto auto;
	text-align:left; background-image:url(../pictures/lined_paper.jpg) }	
	</style>
</head>
<body>
	<div id="main" style="text-align:center; "><br/><br/><br/><br/><br/><br/><br/><br/>
	<div id="center_form">
		<?php
            if ($_GET['action'] == 'add') {
                $album = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $status = $_POST['status'];
                
                include("../common/functions.php");
                include('../common/uploadphoto.php');
                
                if ($image_name != "") {	
                    connectdb();
                    $query = "INSERT INTO mn_album (owner, title, album_name, picture, date, summary, price, status) VALUES ('".$_SESSION['name']."', '$album', 'art', '$image_name', CURDATE(), '$description', '$price', '$status')";
                    mysql_query($query) or die(mysql_error());	
					echo '<script language="javascript">alert("Added image")</script>';
                    }
                }
            ?>
               <h1>Add Art Piece</h1>
               <form action='addart.php?action=add&title=art' 
               name='create_album' method='post' enctype="multipart/form-data">
                    <b>Art Piece Name</b><br/>
                    <input type="text" name="title" style="width:590px"/><br/><br/>
                    <b>Add Art Piece Image:</b>
                    <!-- <input type="hidden" name="MAX_FILE_SIZE" value="100000" /> -->
                    <input type="file" name="image"
                    onchange="checkEnableSubmit(document.create_album.image.value, 
                    document.create_album.description.value)"><br/><br/>
                    <b>Price</b><br/>
                    <textarea name="price" cols="70" rows="1"></textarea><br/><br/>
                    <input type="hidden" name="status" value="available" />
                    <b>Description</b><br/>
                    <textarea name="description" cols="70" rows="10"
                    onkeyup="checkEnableSubmit(document.create_album.image.value, 
                    document.create_album.description.value)"></textarea><br/><br/>
                    <center><input type="submit" value="Add Photo" style="width:590px" 
                    id="submit" disabled="disabled" /></center>
                </form>
           </div>
       </div>
       <?php include('../common/footer.php'); ?>
</body>
</html>
<?php 
		} elseif($_SESSION['name'] != "" &&  $_SESSION['password'] != "") {
			displayMessage("You Do Not Have Sufficient Priviledges To Access This Page", "", "");
		} else {
			redirectTo("../admin/gateway.php");
		} ?>