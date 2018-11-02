<?php 
include("common/functions.php");
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Services</title>
    <link rel="icon" type="image/ico" href="src/custom/img/favicon.ico"/> 
	<link rel="shortcut icon" href="src/custom/img/favicon.ico"/>
    <link href="http://fonts.googleapis.com/css?family=Lobster+Two" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="src/library/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="src/custom/css/page.css"/>
    <link rel="stylesheet" type="text/css" href="src/custom/css/services.css"/>
    
    <script type="text/javascript" src="src/custom/js/jquery-1.11.1.min.js"></script>
	<script src="src/library/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="src/custom/js/services.js"></script>
	<script type="text/javascript" src="src/custom/js/page.js"></script>
</head>

<body>
	<div id="body"></div>
	<div id="mobileshadow"></div>
    <?php include('src/custom/inc/logo-container.inc.php'); ?>

    <div id="column-left">
      <h1>Fat Loss & Health</h1>
        <ul>            
			<?php
                $conn2 = connectdb();
                $query2 = "SELECT * FROM service WHERE servicecategory = 'Fat Loss & Health' ORDER BY service";
                $result2 = mysqli_query($conn2, $query2) or die(mysqli_error($conn2));
                while($row = $result2->fetch_assoc()){
                    echo '<li><a id="'. str_replace("&","",str_replace(" ", "", $row["servicecategory"] . $row["service"])) . '" class="service" href="#">' . $row["service"] . '</a></li>';
                }
                mysqli_close($conn2);
            ?>            
        </ul>
        
        <h1>Anti-Aging</h1>
        <ul>
			<?php
                $conn2 = connectdb();
                $query2 = "SELECT * FROM service WHERE servicecategory = 'Anti-Aging' ORDER BY service";
                $result2 = mysqli_query($conn2, $query2) or die(mysqli_error($conn2));
                while($row = $result2->fetch_assoc()){
                    echo '<li><a id="'. str_replace("&","",str_replace(" ", "", $row["servicecategory"] . $row["service"])) . '" class="service" href="#">' . $row["service"] . '</a></li>';
                }
                mysqli_close($conn2);
            ?>            

        </ul>
        
        <h1>Cosmetic</h1>
        <ul>
			<?php
                $conn2 = connectdb();
                $query2 = "SELECT * FROM service WHERE servicecategory = 'Cosmetic' ORDER BY service";
                $result2 = mysqli_query($conn2, $query2) or die(mysqli_error($conn2));
                while($row = $result2->fetch_assoc()){
                    echo '<li><a id="'. str_replace("&","",str_replace(" ", "", $row["servicecategory"] . $row["service"])) . '" class="service" href="#">' . $row["service"] . '</a></li>';
                }
                mysqli_close($conn2);
            ?>  
        </ul>
        
    </div>
    
		<?php
            $conn2 = connectdb();
            $query2 = "SELECT * FROM service";
            $result2 = mysqli_query($conn2, $query2) or die(mysqli_error($conn2));
            while($row = $result2->fetch_assoc()){
				echo '<div id="details-'
				.str_replace("&","",str_replace(" ", "", $row["servicecategory"] . $row["service"]))
				.'" class="details">
				<div class="close-details">
				<a class="close-btn" href="#">
				<img src="src/custom/img/close-img.png">
				</a>
				</div>';
				
				echo '<h1>' . $row["service"] .'</h1>';
				
				// Female
				$conn3 = connectdb();
				$query3 = "SELECT  SP.service, SUBSTRING(SP.treatment,1,LENGTH(SP.treatment) - 3) AS treatment, SP.packageprice, SP.price FROM serviceprice SP 
							WHERE SP.servicecategory = '" . $row["servicecategory"] 
							. "' AND SP.service = '" . $row["service"] . "'AND SP.treatment LIKE '%(f)%' ORDER BY SP.treatment";
				$result3 = mysqli_query($conn3, $query3) or die(mysqli_error($conn3));

				if (mysqli_num_rows($result3) > 0) {	
					echo '<br/><b>Female</b>';			
					echo '<table class="table">
							<thead>
								<tr>
									<th>Treatment</th>
									<th>Price</th>
									<th>Package Price (6 treatments)</th>
								</tr>
							</thead>
							<tbody>';
											
					while($row3 = $result3->fetch_assoc()){
						echo "<tr>
								<td>" . $row3["treatment"] . "</td>
								<td>" . $row3["price"] . "</td>
								<td>" . $row3["packageprice"] . "</td>
							  </tr>";
					}
					
					mysqli_close($conn3);
					echo '</tbody></table>';
				}				
				// End female
				
				//Male
				$conn3 = connectdb();
				$query3 = "SELECT SP.service, SUBSTRING(SP.treatment,1,LENGTH(SP.treatment) - 3) AS treatment, SP.packageprice, SP.price FROM serviceprice SP 
							WHERE SP.servicecategory = '" . $row["servicecategory"] 
							. "' AND SP.service = '" . $row["service"] . "' AND SP.treatment LIKE '%(m)%' ORDER BY SP.treatment";
				$result3 = mysqli_query($conn3, $query3) or die(mysqli_error($conn3));
				
				if (mysqli_num_rows($result3) > 0) {
					echo '<br/><b>Male</b>';
					echo '<table class="table">
							<thead>
								<tr>
									<th>Treatment</th>
									<th>Price</th>
									<th>Package Price (6 treatments)</th>
								</tr>
							</thead>
							<tbody>';
					
					while($row3 = $result3->fetch_assoc()){
						echo "<tr>
								<td>" . $row3["treatment"] . "</td>
								<td>" . $row3["price"] . "</td>
								<td>" . $row3["packageprice"] . "</td>
							  </tr>";
					}
					
					mysqli_close($conn3);
					echo '</tbody></table>';	
				}
				// End Male
				
				// Generic
				$conn3 = connectdb();
				$query3 = "SELECT SP.* FROM serviceprice SP 
							WHERE SP.servicecategory = '" . $row["servicecategory"] 
							. "' AND SP.service = '" . $row["service"] . "'AND (SP.treatment NOT LIKE '%(f)%' AND SP.treatment NOT LIKE '%(m)%') ORDER BY SP.treatment";
				$result3 = mysqli_query($conn3, $query3) or die(mysqli_error($conn3));

				if (mysqli_num_rows($result3) > 0) {		
					echo '<table class="table">
							<thead>
								<tr>
									<th>Treatment</th>
									<th>Price</th>
									<th>Package Price (6 treatments)</th>
								</tr>
							</thead>
							<tbody>';
											
					while($row3 = $result3->fetch_assoc()){
						echo "<tr>
								<td>" . $row3["treatment"] . "</td>
								<td>" . $row3["price"] . "</td>
								<td>" . $row3["packageprice"] . "</td>
							  </tr>";
					}
					
					mysqli_close($conn3);
					echo '</tbody></table>';
				}
				// End Generic
				
				echo "<br/><br/><b>The Treatment</b><br/>";
				echo $row["description"];
				
				echo "<br/><br/>";
				$conn5 = connectdb();
				$query5 = "SELECT * 
							FROM serviceimage
							WHERE servicecategory = '" 
							. $row["servicecategory"] 
							. "' AND service = '" 
							. $row["service"] . "'";
				$result5 = mysqli_query($conn5, $query5) or die(mysqli_error($conn5));
				if (mysqli_num_rows($result5) > 0) {
					echo '<b>Samples:</b><br/><center>';
					while($row5 = $result5->fetch_assoc()){					
						echo '<br/><img src="uploads/' . $row5["imagepath"] . '"/><br/>';
						echo $row5["imagedescription"] . "<br/><br/>";
					}
					echo '</center>';
				}
            	mysqli_close($conn5);				
				
				echo "</div>";
            }
			
            mysqli_close($conn2);
        ?>  
</body>
</html>