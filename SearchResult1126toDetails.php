<h3>Search Result Listings</h3>
<ul>
    <?php
/**
 * Created by PhpStorm.
 * User: meggie zhao
 * Date: 11/17/15
 * Time: 2:28 PM
 */
//*** create a connection object
$dbhost = 'localhost';
$dbuser  = "user21";
$dbpass  = "6k1kTPLe";
$dbname  = "user21db";

$conn = mysql_connect($dbhost, $dbuser, $dbpass)
or die (mysql_error());

mysql_select_db($dbname)
or die (mysql_error());


// validate inputs
$keyword=$_POST["keywords"];
$state_select=$_POST["state_select"];
$category_select=$_POST["category_select"]; 


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
// if all values are not null
if($keyword !=NULL && $state_select!=NULL && $category_select!=NULL){
  $query = "SELECT job.jid as id, types.t_name as name,types.color as color, job.title as title, job.company_name as company,
job.description as description, job.city as city,
job.state as state, job.post_date as created FROM job,types, categories where job.type_id = types.tid and 
(title LIKE '%$keyword%' or description LIKE '%$keyword%')
and state = '$state_select' and job.cid = '$category_select' GROUP BY id ORDER BY created desc"; 


  $result = mysql_query($query);
  $num = mysql_num_rows($query);
    if ($result!=""){
      while ($jobs = mysql_fetch_assoc($result)) { ?>
       <li>
        <div class="type">
            <span style="background:<?php echo $jobs['color']; ?>"><?php echo $jobs['name']; ?></span>
        </div>
        <div class="description">
            <a href="details.php"><h5 id="<?php echo $jobs['id']; ?>"><?php echo $jobs['title']; ?></a>
                    (<?php echo $jobs['city']; ?>, <?php echo $jobs['state']; ?>)</h5>
					<span id="list_date">
						<?php echo date($jobs['created']); ?>
					</span>
                <?php echo myTruncate($jobs['description'], 200, " "); ?>
        </div>
    </li>
    <?php
       } // end while
     } // end if $RESULT
     else { ?>
        <li><img src="images/noresults.jpg"></li>

    <?php  } 
       //mysql_free_result($result);  
  }  ?> 
<?php
    if ($keyword!=NULL && $state_select!=NULL && $category_select==NULL) {
  $query = "SELECT job.jid as id, types.t_name as name,types.color as color, job.title as title, job.company_name as company,
job.description as description, job.city as city,
job.state as state, job.post_date as created FROM job,types, categories where job.type_id = types.tid
  and state = '$state_select' and (title LIKE '%$keyword%' or description LIKE '%$keyword%') GROUP BY id ORDER BY created desc";


  $result = mysql_query($query);
  $num = mysql_num_rows($query);
    if ($result!=""){
      while ($jobs = mysql_fetch_assoc($result)) { ?>
       <li>
        <div class="type">
            <span style="background:<?php echo $jobs['color']; ?>"><?php echo $jobs['name']; ?></span>
        </div>
        <div class="description">
            <a href="details.php"><h5 id="<?php echo $jobs['id']; ?>"><?php echo $jobs['title']; ?></a>
                    (<?php echo $jobs['city']; ?>, <?php echo $jobs['state']; ?>)</h5>
          <span id="list_date">
            <?php echo date($jobs['created']); ?>
          </span>
                <?php echo myTruncate($jobs['description'], 200, " "); ?>
        </div>
    </li>
    <?php
       } // end while
     } // end if $RESULT
     else { ?>
        <li><img src="images/noresults.jpg"></li>

    <?php  } 
       mysql_free_result($result);  
  }  ?> 
  <!-- if state is empty-->
   <?php
    if ($keyword!=NULL && $state_select==NULL && $category_select!=NULL) {
  $query = "SELECT job.jid as id, types.t_name as name,types.color as color, job.title as title, job.company_name as company,
job.description as description, job.city as city,
job.state as state, job.post_date as created FROM job,types, categories where job.type_id = types.tid
  and job.cid = '$category_select' and (title LIKE '%$keyword%' or description LIKE '%$keyword%') GROUP BY id ORDER BY created desc";

  $result = mysql_query($query);
  $num = mysql_num_rows($query);
    if ($result!=""){
      while ($jobs = mysql_fetch_assoc($result)) { ?>
       <li>
        <div class="type">
            <span style="background:<?php echo $jobs['color']; ?>"><?php echo $jobs['name']; ?></span>
        </div>
        <div class="description">
            <a href="details.php"><h5 id="<?php echo $jobs['id']; ?>"><?php echo $jobs['title']; ?></a>
                    (<?php echo $jobs['city']; ?>, <?php echo $jobs['state']; ?>)</h5>
          <span id="list_date">
            <?php echo date($jobs['created']); ?>
          </span>
                <?php echo myTruncate($jobs['description'], 200, " "); ?>
        </div>
    </li>
    <?php
       } // end while
     } // end if $RESULT
     else { ?>
        <li><img src="images/noresults.jpg"></li>

    <?php  } 
       mysql_free_result($result);  
  }  ?> 
   
<!-- if $keyword is empty-->
<?php
    if ($keyword==NULL && $state_select!=NULL && $category_select!=NULL) {
//elseif ($keyword =="" && $state_select!=NULL && $category_select!=NULL) {
 $query = "SELECT job.jid as id, types.t_name as name,types.color as color, job.title as title, job.company_name as company,
job.description as description, job.city as city,
job.state as state, job.post_date as created FROM job,types, categories where job.type_id = types.tid
  and state = '$state_select' and job.cid = '$category_select' GROUP BY id ORDER BY created desc";

  $result = mysql_query($query);
  $num = mysql_num_rows($query);
    if ($result!=""){
      while ($jobs = mysql_fetch_assoc($result)) { ?>
       <li>
        <div class="type">
            <span style="background:<?php echo $jobs['color']; ?>"><?php echo $jobs['name']; ?></span>
        </div>
        <div class="description">
            <a href="details.php"><h5 id="<?php echo $jobs['id']; ?>"><?php echo $jobs['title']; ?></a>
                    (<?php echo $jobs['city']; ?>, <?php echo $jobs['state']; ?>)</h5>
          <span id="list_date">
            <?php echo date($jobs['created']); ?>
          </span>
                <?php echo myTruncate($jobs['description'], 200, " "); ?>
        </div>
    </li>
    <?php
       } // end while
     } // end if $RESULT
     else { ?>
        <li><img src="images/noresults.jpg"></li>

    <?php  } 
       mysql_free_result($result);  
  }  ?> 


 <!-- if $keyword is empty & $state is empty -->
     <?php
     if ($keyword==NULL && $state_select==NULL && $category_select!=NULL) {
//elseif ($keyword =="" && $state_select!=NULL && $category_select!=NULL) {
 $query = "SELECT job.jid as id, types.t_name as name,types.color as color, job.title as title, job.company_name as company,
job.description as description, job.city as city,
job.state as state, job.post_date as created FROM job,types, categories where job.type_id = types.tid
  and job.cid = '$category_select' GROUP BY id ORDER BY created desc";

  $result = mysql_query($query);
  $num = mysql_num_rows($query);
    if ($result!=""){
      while ($jobs = mysql_fetch_assoc($result)) { ?>
       <li>
        <div class="type">
            <span style="background:<?php echo $jobs['color']; ?>"><?php echo $jobs['name']; ?></span>
        </div>
        <div class="description">
            <a href="details.php"><h5 id="<?php echo $jobs['id']; ?>"><?php echo $jobs['title']; ?></a>
                    (<?php echo $jobs['city']; ?>, <?php echo $jobs['state']; ?>)</h5>
          <span id="list_date">
            <?php echo date($jobs['created']); ?>
          </span>
                <?php echo myTruncate($jobs['description'], 200, " "); ?>
        </div>
    </li>
    <?php
       } // end while
     } // end if $RESULT
     else { ?>
        <li><img src="images/noresults.jpg"></li>

    <?php  } 
       mysql_free_result($result);  
  }  ?> 
 <!-- if keyword is empty and category is empty -->
     <?php
     if ($keyword==NULL && $state_select!=NULL && $category_select==NULL) {
//elseif ($keyword =="" && $state_select!=NULL && $category_select!=NULL) {
 $query = "SELECT job.jid as id, types.t_name as name,types.color as color, job.title as title, job.company_name as company,
job.description as description, job.city as city,
job.state as state, job.post_date as created FROM job,types, categories where job.type_id = types.tid
  and state = '$state_select' GROUP BY id ORDER BY created desc";

  $result = mysql_query($query);
  $num = mysql_num_rows($query);
    if ($result!=""){
      while ($jobs = mysql_fetch_assoc($result)) { ?>
       <li>
        <div class="type">
            <span style="background:<?php echo $jobs['color']; ?>"><?php echo $jobs['name']; ?></span>
        </div>
        <div class="description">
            <a href="details.php"><h5 id="<?php echo $jobs['id']; ?>"><?php echo $jobs['title']; ?></a>
                    (<?php echo $jobs['city']; ?>, <?php echo $jobs['state']; ?>)</h5>
          <span id="list_date">
            <?php echo date($jobs['created']); ?>
          </span>
                <?php echo myTruncate($jobs['description'], 200, " "); ?>
        </div>
    </li>
    <?php
       } // end while
     } // end if $RESULT
     else { ?>
        <li><img src="images/noresults.jpg"></li>

    <?php  } 
       mysql_free_result($result);  
  }  ?> 
 
  <!-- if only has keyword inputted -->
    <?php
     if ($keyword!=NULL && $state_select==NULL && $category_select==NULL) {
 $query = "SELECT job.jid as id, types.t_name as name,types.color as color, job.title as title, job.company_name as company,
job.description as description, job.city as city,
job.state as state, job.post_date as created FROM job,types, categories where job.type_id = types.tid
  and (title LIKE '%$keyword%' or description LIKE '%$keyword%')  GROUP BY id ORDER BY created desc";

  $result = mysql_query($query);
  $num = mysql_num_rows($query);
    if ($result!=""){
      while ($jobs = mysql_fetch_assoc($result)) { ?>
       <li>
        <div class="type">
            <span id="color_bar" style="background:<?php echo $jobs['color']; ?>"><?php echo $jobs['name']; ?></span>
        </div>
        <div class="description">
          <form class="toDetails" method="post" action="details.php">
            <a href="details.php"><h5 id="<?php echo $jobs['id']; ?>"></form><?php echo $jobs['title']; ?></a>
                    (<?php echo $jobs['city']; ?>, <?php echo $jobs['state']; ?>)</h5>
          <span id="list_date">
            <?php echo date($jobs['created']); ?>
          </span>
                <?php echo myTruncate($jobs['description'], 200, " "); ?>
        </div>
    </li>
    <?php
       } // end while
     } // end if $RESULT
     else { ?>
        <li><img src="images/noresults.jpg"></li>

    <?php  } 
       mysql_free_result($result);  
  }  ?> 

     </ul> 
  
    