<?php 
 session_start();
 ob_start();

if (isset($_SESSION['valid_user'])){
 $user=$_SESSION['valid_user'];
 $conn = mysql_connect("localhost", "root", "root" );
 mysql_select_db("IADFINAL");
 $q="SELECT * FROM seeker where email ='$user'";
 $r = mysql_query($q);
$seeker=mysql_fetch_assoc($r);
$seekername=$seeker['fName']." ".$seeker['lName']; 
$seekerid=$seeker['sid'];
$_SESSION['seeker_Name'] = $seekername;
$_SESSION['seeker_id'] = $seekerid;
$sid= $_SESSION['seeker_id']; 
  }
 ob_flush();
 ?> 

 <?php include ("header.php"); ?>
<?php include("seekernavigator1.php");?>

<div id = "myDiv" class="col_12 column">
		<?php include("seekerprofile.php");?>
</div>
<div class="clearfix"></div>
	<?php include("footer.php");?>
</body>
</html>