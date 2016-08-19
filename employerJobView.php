

  <!-- checkDelete() to make sure user wants to delete -->
  <script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure?');
}
</script> 

    <?php
/**
 * list the jobs created by an employer
 * User: maggie
 * Date: 11/28/15
 * Time: 10:45 PM
 */

$dbhost = "localhost";
$dbuser  = "user21";
$dbpass  = "6k1kTPLe";
$dbname  = "user21db";

//*** create a connection object
$conn = mysql_connect($dbhost, $dbuser, $dbpass)
or die (mysql_error());

mysql_select_db($dbname)
or die (mysql_error());

$user = $_SESSION['valid_user'];


function myTruncate($string, $limit, $break=".", $pad="...")
{
// return with no change if string is shorter than $limit
    if(strlen($string) <= $limit) return $string;

// is $break present between $limit and the end of the string?
    if(false !== ($breakpoint = strpos($string, $break, $limit))) {
        if($breakpoint < strlen($string) - 1) {
            $string = substr($string, 0, $breakpoint) . $pad;
        }
    }

    return $string;
}
$q="SELECT * FROM employers where email ='$user'";
$r = mysql_query($q);
$employer=mysql_fetch_assoc($r);
$eid=$employer['eid']; 

//*** execute the query
$query = "SELECT job.jid as id, types.t_name as name,types.color as color, job.title as title, job.company_name as company,
job.description as description, job.city as city,
job.state as state, job.post_date as created
  FROM job,types where job.type_id = types.tid and eid='$eid' ORDER BY created desc";
  // $query = "SELECT * FROM job, types GROUP BY jid ORDER BY post_date DESC";
$result = mysql_query($query);
if (mysql_num_rows($result)==0){ ?>
 <div class="employerJobList" align="center">
 <h3>You Do Not Have Any Jobs</h3>  
 </div>
<ul>
<form class="add_job_link" align="center">
  <button class="large green" style="backgrond-color: #FE2E64" id="add_job_button">
    <i class="icon-plus"></i><a href="employermain.php">Add Job</a></button>
  </form>
  <?php 
}
    else{  
   ?>
    <div class="employerJobList" align="center">
   <h3>Your Job Listing</h3>  
   </div>

<ul>
  <?php 
  while ($jobs = mysql_fetch_assoc($result)) {?>
     <!-- $id =$jobs['jid'];-->
   <hr/>
    <li>
        <div class="type">
            <span style="background:<?php echo $jobs['color']; ?>"><?php echo $jobs['name']; ?></span>
        </div>
        <div class="description">
            <h5><a href="employerjobdetails.php?id=<?php echo $jobs['id']; ?>"><?php echo $jobs['title']; ?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <span id = "edit_job" style="background:#C0C0C0 ">
              <a href ="employerview.php?id=<?php echo $jobs['id'];?>">&nbsp;&nbsp; Edit &nbsp;&nbsp;</a>
            </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <span id = "delete_job" style="background:#C0C0C0">
              <a href ="employerdel.php?id=<?php echo $jobs['id'];?>" onclick="return checkDelete()">&nbsp;Delete&nbsp;</a></span> 
            </h5>
            <h5>(<?php echo $jobs['city']; ?>, <?php echo $jobs['state']; ?>)</h5>
					<span id="list_date">
						<?php echo date($jobs['created']); ?>
					</span>
               <p> <?php echo myTruncate($jobs['description'], 200, " "); ?> </p>  
        </div>
    </li>
    <?php
}
     }
    
    mysql_free_result($result); ?>

  </ul>