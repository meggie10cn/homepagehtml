<!--lixia Zhao Dec. 1, 2015-->
<div align="center">
<h3>Job Seekers Search Result: </h3></div>
<!--<h6 style="color:green;"> This page features job seekers in the CSJobLand who are looking for employment. </h6>
<h6 style="color:green;"> They are listed in order by their profiles recently added.</h6>-->
</br>
<ul>

<?php
$dbhost = 'localhost';
$dbuser  = "user21";
$dbpass  = "6k1kTPLe";
$dbname  = "user21db";

//*** create a connection object
$conn = mysql_connect($dbhost, $dbuser, $dbpass)
or die (mysql_error());

mysql_select_db($dbname)
or die (mysql_error());

$keyword=$_POST["keywords_seeker"];
$state_select=$_POST["state_select"];
//*** execute the query
if ($keyword !=null && $state_select !=null) {

    $query = "SELECT * FROM seeker, profile where seeker.sid=profile.sid and (skill like '%$keyword%' or projects like '%$keyword%'
     or hobby like '%$keyword%' or language like '%$keyword%' or education1 like '%$keyword%' or education2 like '%$keyword%' 
     or education3 like '%$keyword%' or experience1 like '%$keyword%' or experience2 like '%$keyword%' or 
     experience3 like '%$keyword%' or Honors like '%$keyword%') and state ='$state_select'";

    $result = mysql_query($query);
    $num = mysql_num_rows($result);
    if ($num == 0) { ?>
        <li><img src="images/noresults.jpg"></li>
    <?php } else {
        while ($seekers = mysql_fetch_assoc($result)) { ?>
            <hr/>
            <div class="jobseekers">
                <li class="list_featuredseeker"><h6><i class="fa fa-users"></i><b>&nbsp;&nbsp;Name: </b><a
                            href="seekerdetailsprofile1.php?id=<?php echo $seekers['pid']; ?>"><?php echo $seekers['fName']; ?>
                            &nbsp;<?php echo $seekers['lName']; ?></a></h6></li>
            </div>
        <?php
        }
        mysql_free_result($result);
    }
}?>
<!-- if keyword is empty-->
<?php 
if ($keyword ==null && $state_select !=null) {

    $query = "SELECT * FROM seeker, profile where seeker.sid=profile.sid and state ='$state_select'";

    $result = mysql_query($query);
    $num = mysql_num_rows($result);
    if ($num == 0) { ?>
        <li><img src="images/noresults.jpg"></li>
    <?php } else {
        while ($seekers = mysql_fetch_assoc($result)) { ?>
            <hr/>
            <div class="jobseekers">
                <li class="list_featuredseeker"><h6><i class="fa fa-users"></i><b>&nbsp;&nbsp;Name: </b><a
                            href="seekerdetailsprofile1.php?id=<?php echo $seekers['pid']; ?>"><?php echo $seekers['fName']; ?>
                            &nbsp;<?php echo $seekers['lName']; ?></a></h6></li>
            </div>
        <?php
        }
        mysql_free_result($result);
    }
}?>
<!-- if state  is empty-->
<?php 
if ($keyword =!null && $state_select ==null) {

    $query = "SELECT * FROM seeker, profile where seeker.sid=profile.sid and (skill like '%$keyword%' or projects like '%$keyword%'
     or hobby like '%$keyword%' or language like '%$keyword%' or education1 like '%$keyword%' or education2 like '%$keyword%' 
     or education3 like '%$keyword%' or experience1 like '%$keyword%' or experience2 like '%$keyword%' or 
     experience3 like '%$keyword%' or Honors like '%$keyword%')";

    $result = mysql_query($query);
    $num = mysql_num_rows($result);
    if ($num == 0) { ?>
        <li><img src="images/noresults.jpg"></li>
    <?php } else {
        while ($seekers = mysql_fetch_assoc($result)) { ?>
            <hr/>
            <div class="jobseekers">
                <li class="list_featuredseeker"><h6><i class="fa fa-users"></i><b>&nbsp;&nbsp;Name: </b><a
                            href="seekerdetailsprofile1.php?id=<?php echo $seekers['pid']; ?>"><?php echo $seekers['fName']; ?>
                            &nbsp;<?php echo $seekers['lName']; ?></a></h6></li>
            </div>
        <?php
        }
        mysql_free_result($result);
    }
}?>
</ul>