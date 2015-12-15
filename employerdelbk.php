
<?php 
 session_start();
 ob_start();

if (isset($_SESSION['valid_user'])){
 $user=$_SESSION['valid_user'];
 }
 ob_flush();
 ?> 

<form class="deletejobs" method = "post">
<?php
$conn = mysql_connect("localhost", "root", "root" );
	mysql_select_db("IADFINAL");

$id = isset($_GET['id'])?(int)$_GET['id']: null;
$query = "DELETE FROM job WHERE jid  = '$id'";
$result = mysql_query($query);
if ($result)
{
	header("Location: employerJobList.php");
}
else
   header("Location: employerdel.php");
?>
</form>