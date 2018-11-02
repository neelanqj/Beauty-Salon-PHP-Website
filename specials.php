
<?php include("common/functions.php"); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
	<title>Mila Laser Clinic</title>
    <link rel="icon" type="image/ico" href="src/custom/img/favicon.ico"/> 
	<link rel="shortcut icon" href="src/custom/img/favicon.ico"/>
    <link href="http://fonts.googleapis.com/css?family=Lobster+Two" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="src/library/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="src/custom/css/specials.css"/>
    <link rel="stylesheet" type="text/css" href="src/custom/css/page.css"/>
    <link rel="stylesheet" type="text/css" href="src/library/slider/src/css/slider.css">
    
    <script type="text/javascript" src="src/custom/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="src/custom/js/specials.js"></script>
	<script type="text/javascript" src="src/custom/js/page.js"></script>
    <script src="src/library/slider/src/js/custom/slider.js"></script>
</head>

<body>
    
    <div id="body"></div>
    
    <?php include('src/custom/inc/logo-container.inc.php'); ?>
    
    <!--
    <div id="specials" class="details-box purple-transparent text-center">
        <div class="slider">
            <ul>
                <li><img src="src/custom/img/deals/banner1.jpg" data-time="5000" width="500px"></li>
                <li><img src="src/custom/img/deals/banner2.jpg" data-time="10000"  width="500px"></li>
            </ul>
            <div id="slider-nav"></div>
       </div>
    </div> -->
    
    <div id="column-left">
       <center><h1>Specials</h1></center><br/>
        <table class="table">
            <thead>
                <tr>
                    <th>Service</th><th>Special</th>
                </tr>
            </thead>
            <tbody>
                 <?php
                    $conn = connectdb();
                    $query = "select distinct S.special from special S";
                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

                    while($row = $result->fetch_assoc()){
						echo '<tr>';
						
                        echo '<td><a href="#">'.$row['special'].'</a></td><td>';
								  
						$conn2 = connectdb();
                    	$query2 = "select price, sessions from specialprice where special='".$row['special']."'";								  
						$result2 = mysqli_query($conn2, $query2) or die(mysqli_error($conn2));	 
						?>
						 <table class="table">
                            <thead>
                                <tr>
                                    <th>Price</th>
                                    <th>Sessions</th>
                                </tr>
                             </thead>
                             <tbody>
                             	<?php 
								while($row2 = $result2->fetch_assoc()){
                                echo '<tr><td>'.$row2['price'].'</td><td>'.$row2['sessions'].'</td></tr>';
								}
								?>
                            </tbody>
                        </table> 
                        <?php
						echo '</td></tr>';
                    }
                    mysqli_close($conn);
				?>
            </tbody>
        </table>    
    </div>
   
   <script>
    	var container = $('div.slider').css('overflow', 'hidden').children('ul');
    	var slider = new Slider( container, $('#slider-nav') );
        
        slider.start();
   </script>

</body>
</html>