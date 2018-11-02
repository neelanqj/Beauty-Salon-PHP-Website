<?php session_start();
	echo "Logging In... Please Wait... ";
	
	if($_GET['action'] == "login") {
		$name = $_POST['user'];
		$password = $_POST['pwd'];
			
			if($password == "kindness" && $name = "mila_admin") {				
				// Creates the session variable.
				$_SESSION['name'] = $name;
				$_SESSION['password'] = $password;
					
				echo "<meta http-equiv='refresh' content='1; url=../admin/cp.php'>";
				exit;
			} else {
				?>
		<meta http-equiv="refresh" content="1; url=../common/displaymessage.php?message=incorrect information entered">
				<?php
				exit;
			}
		} else {
			?>
		  <meta http-equiv="refresh" content="1; url=../common/displaymessage.php?message=incorrect information entered">
			<?php 
			exit;
		}
?>

