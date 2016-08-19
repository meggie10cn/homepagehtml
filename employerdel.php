
<?php 
 session_start();
 ob_start();

if (isset($_SESSION['valid_user'])){
 $user=$_SESSION['valid_user'];
 }
 ob_flush();
 ?> 
 <?php include ("header.php"); ?>
<?php include("employernavigator.php");?>
<div class="col_12 column">
<form class="deletejobs" method = "post" action="employerJobList.php" >
<?php
$conn = mysql_connect("localhost", "user21", "6k1kTPLe" );
	mysql_select_db("user21db");

$id = isset($_GET['id'])?(int)$_GET['id']: null;
$r = "SELECT * FROM job Where jid='$id'";
$rs = mysql_fetch_assoc($r);
$title = $rs['title'];
echo $title;
$query = "DELETE FROM job WHERE jid  = '$id'";
$result = mysql_query($query);
    if ($result) {
    	echo(" The job was deleted successful!") ?>
    	<h4><a href="employerJobList.php"> Go back to Home </a></h4>
    	<?php
    	header("Location: employerJobList.php");
    }
?>
</form>
</div>