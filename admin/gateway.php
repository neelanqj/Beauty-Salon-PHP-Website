<?php session_start(); 
	include('../common/functions.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/common.css" rel="stylesheet" type="text/css" media="all">

<title>Administration Gateway</title>
	<style>
		div#special_text{
			background-color:#CCC;
			}
		
		div#center_form{
			position:relative;
			margin:0 auto;
			width:300px;
			border:thick;
			border-color:#000;
			text-align:left;
			}    
		
		div#container{
			text-align:center;
			}
    </style>
</head>
<body>
    <div id="container">
		<?php
		if (isset($_SESSION['name']) && !empty($_SESSION['password'])) { 
                echo "<meta http-equiv='refresh' content='1; url=../admin/cp.php'>";
		   }
        ?>
            <div id="center_form">
            	<?php
					if (isset($message)) {
						echo "<br/><br/><b>* ".$message."</b><br/>";
						}
				?>
                <div id="header_nav">
                    <h1>Log In</h1>
                </div>
				<hr/>
                <div id="special_text">
                    Enter in your username and password below.
                </div>
				<hr/>                
                <br/>
                <form method="post" action= <?php echo curPageURLRoot()."/admin/login.php?action=login" ?> > 
                  <table>
                    <tr>
                        <td><p class='blackFont'>Login:</p></td>
                        <td><input type="text" name="user"></td>
                    </tr>
                    <tr>
                        <td><p class='blackFont'>Password:</p></td>
                        <td><input type="password" name="pwd"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="submit" value="Login">  
                        <a href="../common/displaymessage.php?message=Then Email Me (The Website Designer) Mila" 
                        style="color:#00F">Forgot Password?</a></td>
                    </tr>
                  </table>
                </form>
                <hr />
				<br/><br/>
            </div>
            <?php include('../common/footer.php'); ?>
		</div>
    </div>
</body>
</html>