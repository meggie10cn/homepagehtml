<h3>Featured Job Seekers </h3>
<h6 style="color:green;"> This page features job seekers in the CSJobLand who are looking for employment. </h6>
<h6 style="color:green;"> They are listed in order by their profiles recently added.</h6>
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

//*** execute the query
$query = "SELECT * FROM seeker, profile where seeker.sid= profile.sid ORDER BY seeker.created desc";
  // $query = "SELECT * FROM job, types GROUP BY jid ORDER BY post_date DESC";
$result = mysql_query($query);
 $num = mysql_num_rows($result);
  if ($num==0) { ?>
   <li><img src="images/noresults.jpg"></li>
  <?php }
    else {
        while ($seekers = mysql_fetch_assoc($result)) { ?>
            <hr/>
            <div class="jobseekers">
                <li class="list_featuredseeker"><h6><i class="fa fa-users"></i><b>&nbsp;&nbsp;Name: </b><a
                        href="seekerdetailsprofile.php?id=<?php echo $seekers['pid']; ?>"><?php echo $seekers['fName']; ?>
                        &nbsp;<?php echo $seekers['lName']; ?></a></h6></li>
            </div>
        <?php
        }

        mysql_free_result($result);
    }?>
</ul>