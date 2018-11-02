<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Contact</title>
    <link rel="icon" type="image/ico" href="src/custom/img/favicon.ico"/> 
	<link rel="shortcut icon" href="src/custom/img/favicon.ico"/>
    <link href="http://fonts.googleapis.com/css?family=Lobster+Two" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="src/library/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="src/custom/css/contact.css"/>
    <link rel="stylesheet" type="text/css" href="src/custom/css/page.css"/>
    
    <script type="text/javascript" src="src/custom/js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="src/custom/js/page.js"></script>
    <script type="text/javascript" src="src/library/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
    <?php include('src/custom/inc/logo-container.inc.php'); ?>
    
    <div id="contact" class="text-center purple-transparent">
    	<center>Contact us</center><br/>
        <form method="post" action="contactsubmit.php">
          <div class="form-group">
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
          </div>
          <div class="form-group">
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
          </div>
          <div class="form-group">
            <textarea name="comments" style="width:100%; color:black" placeholder="Enter message"></textarea>
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
        
    <div id="map">
    	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2875.83021801464!2d-79.43932429999992!3d43.88006919999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882b2a4fa058993b%3A0xd7a9886e755c4f34!2s10376+Yonge+St%2C+Richmond+Hill%2C+ON+L4C+3B8%2C+Canada!5e0!3m2!1sen!2sus!4v1420248546445" width="100%" height="100%" frameborder="0" style="border:0"></iframe>
    </div>
    
    <div id="location" class="text-center purple-transparent">
    	<br/><br/>
    	We are located at<br/><br/>
        
        <strong>10376 Yonge St, Unit 207<br/>
		Richmond Hill, L4C 3B8<br/>
        ON, Canada</strong>
        <br/><br/>
        
        At the intersection of Yonge & Crosby, <br/>
        on the second floor, of the building<br/>
        across the street from the Beer Store.
        
    </div>
</body>
</html>