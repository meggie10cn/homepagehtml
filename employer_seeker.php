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
</br>
</br>
<div id="searchseeker_area" align="center">
		<?php include("searchseekerbox.php");?>
</div>

<div id="seekersearchresult" class="col_12 column"> 
<?php include("listofseeker.php");?>
</div>
<div class="clearfix"></div>
	<?php include("footer.php");?>
</body>
</html>
