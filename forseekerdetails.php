<?php 
 session_start();
 ob_start();

if (isset($_SESSION['valid_user'])){
 $user=$_SESSION['valid_user'];
 $conn = mysql_connect("localhost", "user21", "6k1kTPLe");
 mysql_select_db("user21db");
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
 
<?php
/**
 * Created by PhpStorm.
 * User: maggie Zhao
 * Date: 11/18/15
 * Time: 2:48 PM
 */
 include ("header.php"); ?>
<?php include("seekernavigator1.php");?>
<!--<?php //include("Jobsdetails.php");?>-->
<div class="col_12 column">
<div class="jobDetails">
<?php include ("jobsdetailspage.php"); ?>
    <p><a href="browsejobs.php">Back To Jobs</a></p>
</div>

<div class="clearfix"></div>
<?php include("footer.php");?>
</body>
</html>