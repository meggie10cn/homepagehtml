
<?php

/* Name: Lixia Zhao
   Course: CSC620 IAD
   Final Project/jobSearchResult.php
  */
   //** receive query string from searchJobResult.js  
   
   $dbhost = 'localhost';
  $dbuser  = "user21";
  $dbpass  = "6k1kTPLe";
  $dbname  = "user21db";
  //*** create a connection object
  $conn = mysql_connect($dbhost, $dbuser, $dbpass)
  or die (mysql_error());

   mysql_select_db($dbname)
   or die (mysql_error());

   $keywords =$_REQUEST['keyword'];
   $state = $_REQUEST['state'];
   $category = $_REQUEST['category'];

/*
   if ($keywords!='' && $state!='' && $category !=''){
    $query = "SELECT job.jid as id, job.title as title, job.description as description, job.company_name as company, job.city as city,
    job.state as state, job.post_date as created,types.t_name as type_name, types.color as color FROM job, types, categories where job.type_id=types.tid
    and (title LIKE '%$keywords%' or description LIKE '%$keywords%') and state =='$state' and categories.cid = '$category'
    ORDER BY created desc";
   }*/
  // $query = "SELECT job.jid, job.title,job.description,job.company_name, job.city, job.state, job.post_date,job.expirateDate, job.contact_email, job.phone,
        //     types.color, types.t_name FROM job, types WHERE description like'%keywords%' or title like '%keywords%' or company_name like '%keywords%' or t_name like '%keywords%'
        //    and job.tid = types.tid and state = '$state' and cid='$category' ORDER BY created DESC";
            
     $query = "SELECT * FROM job where title LIKE '%$keywords%' or description LIKE '%$keywords%' GROUP BY jid";
    // $result = executeSQL($query);

  

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
   $q_result = mysql_query($query);
//$row = $result->fetch_assoc()

//*** die if no result
    if (!$q_result)
        die("Error ");

    //*** print the result
            if($q_result==null ||  $q_result=="")
    
    	          print("no result");
          else {
               print($result);


              //*** return query results in a string

              $query_result = "<br>";
              $query_result = $query_result . "<h3>Search Result Listings </h3>";
              $query_result = $query_result . "<ul id=\"listings\">";


              // fetch assocative array
              while ($jobs = mysql_fetch_assoc($q_result)) {

                  if ($jobs) {
                      //<?php foreach($jobs as $field =>$value) :
                      $query_result = $query_result . "<li><div class=\"type\"><span style=\"background:$jobs[color]\">$jobs[t_name]</span></div>";
                      $query_result = $query_result . "<div class=\"company\">$jobs[company]</div>";
                      $query_result = $query_result . "<div class=\"description\"><a href=\"singlejobdisplay.php\"><h5 id=\"$jobs[id]\">$jobs[title]</a>&nbsp;&nbsp;($jobs[city]&nbsp;&nbsp;jobs[state])</h5>";
                      $query_result = $query_result . "<span id=\"list_date\">$jobs[created]</span><?php echo myTruncate($jobs[description],100);?></div>";
                      //$query_result = $query_result.myTruncate($jobs[2],100);  // job description

                      /*<?php endforeach; ?>	*/
                      //$query_result= $query_result."</ul>";
                  } else
                      $query_result = $query_result . "<li><img src=\"images/noresults.jpg\">";

              } // end while

              mysql_close($conn);
              $query_result = $query_result . "</li></ul>\n";

              //*** Free the resources associated with the result
              mysql_free_result($q_result);

              //*** close this connection


              print($query_result);
          } // end else
?>
