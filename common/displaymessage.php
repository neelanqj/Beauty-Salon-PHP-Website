<?php 	
if (isset($_GET['message'])) $message = $_GET['message'];
if (isset($_GET['time'])) $time = $_GET['time'];
if (isset($_GET['return']))	$returnurl = $_GET['return'];
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="text/javascript">
<!--
function delayer(){
    window.location = "<?php echo $returnurl; ?>";
}
//-->
</script>

</head>
	<?php 
	// This adds the changable body tag
	echo "<body ";
	if (isset($_GET['time'])) {
		?> 
        onLoad="setTimeout('delayer()',<?php echo $time ?>)" 
        <?php 
		} 
	echo ">";
	?>

		<?php 
        echo "<br/><br/><br/><br/><br/><br/><center><b>".$message."</b></center><br/><br/><br/><br/><br/><br/>"; 
		echo "";
        ?>
</body>
</html>