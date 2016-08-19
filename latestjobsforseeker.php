<h3>Latest Job Listings</h3>
<ul>
    <?php
/**
 * Created by PhpStorm.
 * User: maggie
 * Date: 11/17/15
 * Time: 2:28 PM
 */

$dbhost = 'localhost';
$dbuser  = "user21";
$dbpass  = "6k1kTPLe";
$dbname  = "user21db";

//*** create a connection object
$conn = mysql_connect($dbhost, $dbuser, $dbpass)
or die (mysql_error());

mysql_select_db($dbname)
or die (mysql_error());

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
//*** execute the query
$query = "SELECT job.jid as id, types.t_name as name,types.color as color, job.title as title, job.company_name as company,
job.description as description, job.city as city,
job.state as state, job.post_date as created
  FROM job,types where job.type_id = types.tid ORDER BY created desc";
  // $query = "SELECT * FROM job, types GROUP BY jid ORDER BY post_date DESC";
$result = mysql_query($query);
    if ($result){
  while ($jobs = mysql_fetch_assoc($result)) {?>
    <hr/>
    <li>
        <div class="type">
            <span style="background:<?php echo $jobs['color']; ?>"><?php echo $jobs['name']; ?></span>
        </div>
        <div class="description">
            <h5><a href="forseekerdetails.php?id=<?php echo $jobs['id']; ?>"><?php echo $jobs['title']; ?></a>
                    (<?php echo $jobs['city']; ?>, <?php echo $jobs['state']; ?>)</h5>
					<span id="list_date">
						<?php echo date($jobs['created']); ?>
					</span>
                <p><?php echo myTruncate($jobs['description'], 200, " "); ?></p>
        </div>
    </li>
    <?php
}
     }
     elseif(!$result) {?>
        <li><img src="images/noresults.jpg"></li>

    <?php }
    mysql_free_result($result); ?>

  </ul>