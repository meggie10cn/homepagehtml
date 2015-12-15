
<?php 
 session_start();
 ob_start();

if (isset($_SESSION['valid_user'])){
 $user=$_SESSION['valid_user'];
 }
 ob_flush();
 ?> 
<?php
/**
 * Created by PhpStorm.
 * User: maggie
 * Date: 11/18/15
 * Time: 2:48 PM
 */
 include ("header.php"); ?>
<?php include("employernavigator.php");?>
<!--<?php //include("Jobsdetails.php");?>-->
<div class="col_12 column">
<div class="jobDetails">
<?php include ("jobsdetailspage.php"); ?>
    <p><a href="employerJobList.php">Back To Jobs</a></p>
</div>

<div class="clearfix"></div>
<?php include("footer.php");?>
</body>
</html>