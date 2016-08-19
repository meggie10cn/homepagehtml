<?php 
   $id = isset($_GET['id'])?(int)$_GET['id']: null;

            $dbhost = "localhost";
             $dbuser  = "user21";
             $dbpass  = "6k1kTPLe";
              $dbname  = "user21db";
              

    //*** create a connection object
    $conn = mysql_connect($dbhost, $dbuser, $dbpass)
        or die (mysql_error());

    mysql_select_db($dbname)
        or die (mysql_error()); 


     $query="SELECT * FROM job j join types t on j.type_id = t.tid WHERE jid='$id'";
               $result = mysql_query($query);
      while ($row = mysql_fetch_assoc($result)) { ?>
     <h3><?php echo $row['title']; ?></h3>
     <ul>
     <li><strong>Location:</strong><?php echo $row['city'];?>,<?php echo $row['state']; ?></li>
     <li><strong>Job Type: </strong><?php echo $row['t_name']; ?></li>
     <li><strong>Decription: </strong><?php echo $row['description']; ?></li>
     <li><strong>Contact Email: </strong><a href="mailto:<?php echo $row['contact_email']?>?Subject=Hello, I am interested in the position <?php echo $row['title']; ?>" target="_top"> <?php echo $row['contact_email']; ?></a></li>
     <li><strong>Expired Date: </strong><?php echo $row['expired_date'];?></li>
     </ul>
   <?php } ?>