
<h4>Job Seeker Listing</h4>
<ul>
<?php

/*
 *  Name: Lixia Zhao
 *	Course: CSC620 Internet Application Development
 *	Final Project
 *	FileName: searchjobseeker.php
 */
    //*** receive query string from ajaxFunction  when type is 1, search by university name and filter the options
    //*** connect to mysql and run the query
     $keyword =$_REQUEST['keyword'];
     $state = $_REQUEST['state'];
        $dbhost = 'localhost';
        $dbuser  = "user21";
        $dbpass  = "6k1kTPLe";
        $dbname  = "user21db";

    //*** create a connection object
    $conn = mysql_connect($dbhost, $dbuser, $dbpass)
        or die (mysql_error());

    mysql_select_db($dbname)
        or die (mysql_error());

   if ($keyword!='' && $state!='') {
           // *** execute the query
     $query = "SELECT * from seeker, profile  where state =='$state' and (city like '%$keyword%' or skill like '%$keyword%'
     or project like '%$keyword%' or hobby like '%$keyword%' or language like '%$keyword%' or education1 like '%$keyword%'
     or education2 like '%$keyword%' or education3 like '%$keyword%' or experience1 like '%$keyword%'";
       //*** execute the query
       $result1 = mysql_query($query);
       $num = mysql_num_rows($result1);
        $query_result = "<div>";
       if ($num == 0) { 

           $query_result =$query_result . "<li><img src=\"images/noresults.jpg\"></li></div>";

       } // no result shows a image
       else {
           while ($seekers = mysql_fetch_assoc($result1)) { 
            
              $query_result = $query_result . "<h3>Search Result Listings </h3></br>";
              $query_result = $query_result . "<div class=\"jobseeker\"><p> Name: &nbsp;&nbsp;&nbsp; $seekers['fName'] &nbsp;$seekers['lName']</p></div>";
              mysql_close($conn);
              print($query_result);
            }
       }
  ?>
 </ul>
