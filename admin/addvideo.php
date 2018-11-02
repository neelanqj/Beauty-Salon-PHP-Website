<?php session_start();
	include('../common/functions.php');
	
	if($_SESSION['name'] != "" && $_SESSION['password'] != "")
		{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Add Video</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/common.css" rel="stylesheet" type="text/css" media="all">
<style>
    div#center_form{
        position:relative;
        margin-left:auto;
        margin-right:auto;
        width:460px;
		height:440px;
		text-align:left;
		padding:10px;
		background-image:url(../pictures/lined_paper.jpg)
        }	
</style>
</head>
<body>
	<div id="main" style="text-align:center; "><br/><br/><br/><br/><br/><br/><br/><br/>
		<div id="center_form">
            <h1>Add YouTube Video</h1>
            <div style="text-align:left; float:left">
                <form action='addvideo.php?action=addvid' method='post' enctype="multipart/form-data">
                    <b>Subject:</b><br/>
                    <select name="subject">
                        <option value="emma_vids">Emma's Videos</option>
                    </select>
                    <br/>
                    <b>Sub-Subject: </b><br/><input type="text" name="subsubject" size="70"/><br/> 
                    <b>Title: </b><br/><input type="text" name="title" size="70"/><br/>
                    <b>YouTube Link: </b><br/><input type="text" name="link" id='link' size="70" /><br/>
                    <b>Summary: </b><br/><textarea name="summary" cols=53 rows=5 /></textarea><br/>
                    <input type="submit" value="Submit Your Video" width="100px" />
                </form>
            </div>
        </div>
        
            <?php
			$action = $_GET['action'];
			
			if ($action == 'addvid') {
				$subject = $_POST['subject'];
				$subsubject = $_POST['subsubject'];
				$title = $_POST['title'];
				$link = $_POST['link'];
				$summary = $_POST['summary'];
				$date = date("Y-m-d");
				connectdb();
				mysql_query("INSERT INTO mn_videos (subject, subsubject, date, time, poster, reviewer, title, link, summary, approved) VALUES ('$subject', '$subsubject', CURDATE(), NOW(), '".$_SESSION['name']."', '', '$title', '$link', '$summary', '0')" ) or die(mysql_error());
				?>
				<script type="text/javascript">
                <!--
                window.location = "<?php 
				echo curPageURLRoot()."/common/displaymessage.php?message=Submission Successful"; ?>";
                //-->
                </script>                
                
        <?php
			}
            ?>        
    </div>
    <div id="footer">
    	<?php include('../common/footer.php'); ?>
    </div>
</body>
</html>

<?php 
} elseif($_SESSION['name'] != "" &&  $_SESSION['password'] != "") {
	displayMessage("You Do Not Have Sufficient Priviledges To Access This Page", "", "");
} else {
	redirectTo("../admin/gateway.php");
} ?>
    