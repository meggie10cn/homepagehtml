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
<div id = "myDiv" class="col_12 column">
<?php include ("employerJobView.php"); ?>
</div>
<div class="clearfix"></div>
	<?php include("footer.php");?>
</body>
</html>