<?php
	/* Define how long the maximum amount of time the session can be inactive. */
	define("MAX_IDLE_TIME", 3);
	
	/* 
	 * URL related operations.
	 */
	// This function returns the current site AND directory of the webpage.
	function curPageURL() {
		 $pageURL = 'http';
		 
		 if(isset($_SERVER['HTTPS'])){
			 if ($_SERVER["HTTPS"] == "on") {
					$pageURL .= "s";
				}
			}
		$pageURL .= "://";
		 
		if ($_SERVER["SERVER_PORT"] != "80") {
				  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
				} else {
				  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
				}
		 return $pageURL;
		}

	// This function returns the root address of the website
	function curPageURLRoot() {
		 $pageURL = 'http';
		 if(isset($_SERVER['HTTPS'])){
		 	if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
		 }
		 
	     $pageURL .= "://";
		 
		 if ($_SERVER["SERVER_PORT"] != "80") {
			  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"];
			 } else {
			  $pageURL .= $_SERVER["SERVER_NAME"];
			 }
		 return $pageURL;
		}

	/* 
	 * Text related operations.
	 */
	// This function prevents injection attacks
	function sterilize (&$sterilize) {
        if ($sterilize==NULL) {return NULL;}
		
        $check = array (1 => "'", 2 => '"', 3 => '<', 4 => '>');
        foreach ($check as $value) {
            $sterilize=str_replace($value, '', $sterilize);
        	}
		
		$sterilize = $sterilize;
        $sterilize=strip_tags ($sterilize);
        $sterilize=stripcslashes ($sterilize);
        $sterilize=stripslashes ($sterilize);
        $sterilize=addslashes ($sterilize);
        return $sterilize;
   		}
	
	// This function strips text of its tags
	function coretext (&$sterilize) {
        if ($sterilize==NULL) {
			return NULL;
			}
		$sterilize=strip_tags($sterilize);
		
		
		$sterilize=str_replace('<span style="font-family: Arial, Helvetica, sans-serif; font-size: 14px;">', '', $sterilize);
		$sterilize=str_replace('<span style="text-decoration: underline;">', '', $sterilize);
		$sterilize=str_replace("<span>", '', $sterilize);
		$sterilize=str_replace("</span>", '', $sterilize);
		$sterilize=str_replace("</ span>", '', $sterilize);
		$sterilize=str_replace("<p>", '', $sterilize);
		$sterilize=str_replace("</p>", '', $sterilize);
		$sterilize=str_replace("</ p>", '', $sterilize);		
		$sterilize=str_replace("<strong>", '', $sterilize);
		$sterilize=str_replace("</strong>", '', $sterilize);
		$sterilize=str_replace("</ strong>", '', $sterilize);
		$sterilize=str_replace("<pre class='spanimage'>", '', $sterilize);
		$sterilize=str_replace("<pre class='spanarticle'>", '', $sterilize);
		$sterilize=str_replace("<b>", '', $sterilize);
		$sterilize=str_replace("</b>", '', $sterilize);
		$sterilize=str_replace("<br />", ' ', $sterilize);
		$sterilize=str_replace("<br/>", ' ', $sterilize);
		$sterilize=str_replace("<pre>", '', $sterilize);
		$sterilize=str_replace("</pre>", '', $sterilize);
		$sterilize=str_replace("</center>", '', $sterilize);
		$sterilize=str_replace("<center>", '', $sterilize); 
		
        $check = array (1 => "'", 2 => '"', 3 => '<', 4 => '>');
		
        foreach ($check as $value) {
            $sterilize=str_replace($value, '', $sterilize);
        	}
		

        $sterilize=stripcslashes ($sterilize);
        $sterilize=stripslashes ($sterilize);
		
        return $sterilize;
   		}
	
	/* 
	 * Database related operations.
	 */
	// This function connects the the database.
	function connectdb() {
		include("db_params.php");
		
		
        //mysqli_select_db($strDbName);
		
		return mysqli_connect($strHostName,$strUserName,$strPassword,$strDbName);
		}
		
	function displayMessage($message, $time, $redirect) { ?>
			<script type="text/javascript">
            <!--
            window.location = "<?php
            echo curPageURLRoot()."/common/displaymessage.php?message=".$message."&return=".$redirect."&time=".$time; ?>";
            //-->
            </script>
        <?php
		}
		
	function redirectTo($page) {
		?>
		<script type="text/javascript">
		<!--
		window.location = "<?php echo $page; ?>";
		//-->
		</script>
        <?php
		}		
		
?>

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script> 
<script type="text/javascript">
	function limitText(limitField, limitCount, limitNum) {
			if (limitField.value.length > limitNum) {
				limitField.value = limitField.value.substring(0, limitNum);
			} else {
				limitCount.value = limitNum - limitField.value.length;
			}
		}
</script>