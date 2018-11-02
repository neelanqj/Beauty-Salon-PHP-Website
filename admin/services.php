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
<script type="text/javascript" src="../src/library/tinymce/tinymce.min.js"></script>
<script>
 tinyMCE.init({selector:'textarea#description'});
</script>
<title>Add Services</title>
	<script type="text/javascript">
        function checkEnableSubmit1(category, service) {
              if (category != "" && service != "" ) // some logic to determine if it is ok to go
                {
                    document.getElementById("submit1").disabled = false;
                }
              else // in case it was enabled and the user changed their mind
                {
                    document.getElementById("submit1").disabled = true;
                }
            }
		function checkEnableSubmit2(a, b, c) {
              if (a != "" && b != "" && c != "") // some logic to determine if it is ok to go
                {
                    document.getElementById("submit2").disabled = false;
                }
              else // in case it was enabled and the user changed their mind
                {
                    document.getElementById("submit2").disabled = true;
                }
            }
			
		function checkEnableSubmit3(a) {
              if (a != "") // some logic to determine if it is ok to go
                {
                    document.getElementById("submit3").disabled = false;
                }
              else // in case it was enabled and the user changed their mind
                {
                    document.getElementById("submit3").disabled = true;
                }
            }
    </script>
    
    <link rel="stylesheet" type="text/css" href="../src/library/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="../src/library/bootstrap/css/bootstrap-theme.css"/>
    <style>
	#panelposition {
		margin-top:100px;	
	}
	</style>
    <script type="text/javascript" src="../src/library/bootstrap/js/bootstrap.min.js"></script> 
    
</head>
<body>
	<div id="main" style="text-align:center;">
           <div id="left_col">
                <h1>Services List</h1><br/>
                <?php
                    $conn2 = connectdb();
                    $query2 = "SELECT * FROM service";
                    $result2 = mysqli_query($conn2, $query2) or die(mysqli_error($conn2));
                    echo '
                    <table class="table" align="center">
                        <thead>
                            <tr>
                                <td><b>Category</b></td>
                                <td><b>Service</b></td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>';
                    while($row = $result2->fetch_assoc()){
                        echo '<tr>
                                <td>' . $row['servicecategory'] . '</td><td>' . $row['service'] .
								'</td><td><a href="service_del.php?servicecategory='. $row['servicecategory'] 
								. '&service=' . $row['service'] . '">Del</a></td>
                              </tr>';
                    }
                    echo '</tbody>
                    </table>';
                    mysqli_close($conn2);
				?><br/><br/>
                
                <h1>Services Price List</h1><br/>
                <?php
                    $conn2 = connectdb();
                    $query2 = "SELECT * FROM serviceprice";
                    $result2 = mysqli_query($conn2, $query2) or die(mysqli_error($conn2));
                    echo '
                    <table class="table" align="center">
                        <thead>
                            <tr>
								<td><b>Service Category</b></td>
								<td><b>Service</b></td>
                                <td><b>Treatment</b></td>
                                <td><b>Price</b></td>
                                <td><b>Package Price</b></td>								
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>';
                    while($row = $result2->fetch_assoc()){
                        echo '<tr>
                                <td>' . 
								$row['servicecategory'] . 
								'</td><td>' . 
								$row['service'] .
								'</td><td>'
								. $row['treatment'] .
								'</td><td>' . 
								$row['price'] .
								'</td><td>' .
								$row['packageprice'] .
								'</td><td><a href="serviceprice_del.php?servicecategory='. $row['servicecategory'] 
								. '&service=' . $row['service'] . '&treatment=' . $row['treatment'] . '">Del</a></td>
                              </tr>';
                    }
                    echo '</tbody>
                    </table>';
                    mysqli_close($conn2);
				?>
                
                <h1>Services Images List</h1><br/>
                <?php
                    $conn2 = connectdb();
                    $query2 = "SELECT * FROM serviceimage";
                    $result2 = mysqli_query($conn2, $query2) or die(mysqli_error($conn2));
                    echo '
                    <table class="table" align="center">
                        <thead>
                            <tr>
								<td><b>Service Category</b></td>
								<td><b>Service</b></td>
                                <td><b>Image</b></td>
                                <td><b>Description</b></td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>';
                    while($row = $result2->fetch_assoc()){
                        echo '<tr>
                                <td>' . $row['servicecategory'] . '</td><td>' . $row['service'] .
								'</td><td><img src="../uploads/' . $row['imagepath'] . '"/></td><td>'
								. $row['imagedescription'] .
								'</td><td><a href="serviceimage_del.php?servicecategory='. $row['servicecategory'] 
								. '&service=' . $row['service'] . '&image=' . $row['imagepath'] . '">Del</a></td>
                              </tr>';
                    }
                    echo '</tbody>
                    </table>';
                    mysqli_close($conn2);
				?>
        </div>
		<div id="right_col">
		<?php
            if (isset($_GET['action']) && $_GET['action'] == 'addservices') {
					$category = $_POST["category"];
					$service = strip_tags(stripslashes($_POST["service"]),$allowedTags);
					$description = strip_tags(stripslashes($_POST['description']),$allowedTags);
				
                    $conn = connectdb();
                    $query = "INSERT INTO service (servicecategory, service, description) 
					VALUES ('$category',  '". str_replace(":", " ", $service) ."', '$description')";
					
                    mysqli_query($conn, $query) or die(mysqli_error($conn));
					mysqli_close($conn);					
			} elseif (isset($_GET['action']) && $_GET['action'] == 'addserviceprice') {
					$sarr = explode(":", $_POST["service"]);
					$category = $sarr[0];
					$service = $sarr[1];
					$treatment = $_POST['treatment'];
					$price = $_POST['price'];
					$packageprice = $_POST['packageprice'];
				
                    $conn = connectdb();
                    $query = "INSERT INTO serviceprice (servicecategory, service, treatment, price, packageprice) 
					VALUES ('$category',  '$service', '$treatment', '$price', '$packageprice')";
					
                    mysqli_query($conn, $query) or die(mysqli_error($conn));
					mysqli_close($conn);				
			} elseif (isset($_GET['action']) && $_GET['action'] == 'addserviceimage') {
				$sarr = explode(":", $_POST["service"]);
				$category = $sarr[0];
				$service = $sarr[1];
				$description = strip_tags(stripslashes($_POST["description"]),$allowedTags);
				
                include('../common/uploadphoto.php');
				
                $conn = connectdb();
				$query = "INSERT INTO serviceimage (servicecategory, service, imagepath, imagedescription) 
				VALUES ('$category',  '$service', '$image_name', '$description')";
			
				mysqli_query($conn, $query) or die(mysqli_error($conn));
				mysqli_close($conn);	
			}
            ?>
            
            <div id="panelposition" class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Add Service
                    </a>
                  </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                  <div class="panel-body">
                      <form action='services.php?action=addservices&title=photo' 
                       name='service' method='post' enctype="multipart/form-data">
                           <b>Service Category</b><br/>
                            <select name="category">
                              <option value="Fat Loss &amp; Health">Fat Loss &amp; Health</option>
                              <option value="Anti-Aging">Anti-Aging</option>
                              <option value="Cosmetic">Cosmetic</option>
                            </select><br/><br/>
                            
                            <b>Service</b><br/>
                            <input type="text" name="service" style="width:100%"  onkeyup="checkEnableSubmit1(document.service.service.value, document.service.category.value)"/><br/><br/>
                            
                            <b>Service Description</b><br/>
                            <textarea id="description" name="description" style="width:100%"></textarea><br/><br/>
                            
                            <input type="hidden" name="status" value="available"/>
                               <center><input type="submit" value="Add Service" style="width:100%" 
                            id="submit1" disabled="disabled" /></center>
                        </form><br/><br/>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTwo">
                  <h4 class="panel-title">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Add Service Price
                    </a>
                  </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                  <div class="panel-body">
                           <form action='services.php?action=addserviceprice&title=photo' 
                           name='serviceprice' method='post' enctype="multipart/form-data">
                            <b>Category:Service</b><br/>
                            <select name="service">
                                <?php
                                    $conna = connectdb();
                                    $querya = "SELECT servicecategory, service FROM service";
                                    $resulta = mysqli_query($conna, $querya) or die(mysqli_error($conn2));
                                      
                                    while($row = $resulta->fetch_assoc()){
                                        echo '<option value="' . $row['servicecategory'] . ':' . $row['service'] .'">
                                        ' . $row['servicecategory'] . ':' . $row['service'] .'</option>';
                                    }
                                    mysqli_close($conna);
                                ?>
                            </select><br/><br/>
                                
                                <b>Treatment(You can also have text here)</b><br/>
                                <input type="text" name="treatment" style="width:100%" onkeyup="checkEnableSubmit2(document.serviceprice.service.value, document.serviceprice.treatment.value, document.serviceprice.price.value)"/><br/><br/>
                                
                                 <b>Price (You can also have text here)</b><br/>
                                <input type="text" name="price" style="width:100%" onkeyup="checkEnableSubmit2(document.serviceprice.service.value, document.serviceprice.treatment.value, document.serviceprice.price.value)"/><br/><br/>
                                
                                 <b>Package Price (You can also have text here)</b><br/>
                                <input type="text" name="packageprice" style="width:100%"/><br/><br/>
                                
                                <input type="hidden" name="status" value="available"/>
                                   <center><input type="submit" value="Add Service Price" style="width:100%" 
                                id="submit2" disabled="disabled" /></center>
                            </form><br/><br/>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingThree">
                  <h4 class="panel-title">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      Add Service Image
                    </a>
                  </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                  <div class="panel-body">
                          <form action='services.php?action=addserviceimage&title=photo' 
                           name='serviceimage' method='post' enctype="multipart/form-data">
                               <b>Category:Service</b><br/>
                               <select name="service">
                                    <?php
                                        $conna = connectdb();
                                        $querya = "SELECT servicecategory, service FROM service";
                                        $resulta = mysqli_query($conna, $querya) or die(mysqli_error($conn2));
                                          
                                        while($row = $resulta->fetch_assoc()){
                                            echo '<option value="' . $row['servicecategory'] . ':' . $row['service'] .'">
                                            ' . $row['servicecategory'] . ':' . $row['service'] .'</option>';
                                        }
                                        mysqli_close($conna);
                                    ?>
                                </select><br/><br/>
                                
                                <b>Image Description</b><br/>
                                <textarea  name="description" style="width:100%" ></textarea><br/><br/>
                                <b>Add Photography Piece Image:</b><br/>
                                <input type="file" name="image"
                                onchange="checkEnableSubmit3(document.serviceimage.image.value)"><br/><br/>
            
                                <input type="hidden" name="status" value="available"/>
                                   <center><input type="submit" value="Add Service Image" style="width:100%" 
                                id="submit3" disabled="disabled" /></center>
                            </form><br/><br/>
                  </div>
                </div>
              </div>
            </div>
            
 
           </div>           
       </div>
       <?php include('../common/footer.php'); ?>
       
       <?php
			if (isset($_GET['action']) && ($_GET['action'] == 'addserviceimage' || $_GET['action'] == 'addserviceprice' || $_GET['action'] == 'addservices')) {
					echo '<script language="javascript">alert("Service added")</script>';
					redirectTo("services.php");

			} else if(isset($_GET['action']) && $_GET['action'] == 'del') {
					echo '<script language="javascript">alert("Service deleted")</script>';
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