<?php 
 session_start();
 ob_start();

if (isset($_SESSION['valid_user'])){
 $user=$_SESSION['valid_user'];
 }
 ob_flush(); 
 ?> 

<?php include ("header.php"); ?>
<?php include("employernavigator3.php");?>
<?php include("searchseekerbox.php");?>

<div id="searchseeker_area" class="col_12 column">
	<?php include("latestseeker.php");?>	
		
</div>
<div class="clearfix"></div>
	<?php include("footer.php");?>
</body>
</html>
