<?php 
 session_start();
 ob_start();

if (isset($_SESSION['valid_user'])){
 $user=$_SESSION['valid_user'];
 }
 ob_flush();
 ?> 

 <?php include ("header.php"); ?>
<?php include("employernavigator3.php");?>
</br>

<div id="featuredseeker_area" >
<?php 
   $pid = isset($_GET['id'])?(int)$_GET['id']: null;

            $dbhost = 'localhost';
             $dbuser  = "user21";
             $dbpass  = "6k1kTPLe"
              $dbname  = "user21db";

    //*** create a connection object
    $conn = mysql_connect($dbhost, $dbuser, $dbpass)
        or die (mysql_error());

    mysql_select_db($dbname)
        or die (mysql_error()); 


     $query="SELECT * FROM profile p join seeker s on p.sid = s.sid WHERE p.pid='$pid'";
               $result = mysql_query($query);
      while ($rows = mysql_fetch_assoc($result)) { ?>

      <h4 align="center"><strong><?php echo $rows['fName'] ?>&nbsp;<?php echo $rows['lName'] ?> 's Profile</strong></h4>
      <div align="center">
        <img src="images/user.jpg"/>
      </div>
     <table  style="margin-top: -305px; "id="seekerprofile"  name="seekerprofile" border="0"  align="left"  cellpadding="2"  cellspacing="0">
<tr  class="lg-1">
<td  class="tl-1"><div  align="left" ><strong>Name:</strong></div></td><br/>
<td  class="tl-4"><?php  echo  $rows['fName'];  ?>, <?php  echo  $rows['lName'];  ?></td>
</tr>
<tr  class="lg-1">
<td  class="tl-1"><div  align="left" ><strong>Email </strong></div></td><br/>
<td  class="tl-4"><a href="mailto:<?php echo $row['contact_email']?>?Subject=Hello, I am interested in Your Qualification" target="_top"> <?php  echo  $rows['email'];  ?></a></td>
</tr>
<tr  class="lg-1">
<td  class="tl-1"><div  align="left" ><strong>Phone </strong></div></td><br/>
<td  class="tl-4"><?php  echo  $rows['phone'];  ?></td>
</tr>
<tr  class="lg-1">
<td  class="tl-1"><div  align="left" ><strong>address</strong></div></td><br/>
<td  class="tl-4"><?php  echo  $rows['address'];  ?>,<?php  echo  $rows['city'];  ?>,<?php  echo  $rows['state']; ?>
</tr>
<tr  class="lg-1">
<td  class="tl-1"><div  align="left" ><strong>Skill:</strong></div></td><br/>
<td  class="tl-4"><?php  echo  $rows['skill'];  ?></td>
</tr>
<tr  class="lg-1">
<td  class="tl-1"><div  align="left" ><strong>Desired Salary:</strong></div></td><br/>
<td  class="tl-4"><?php  echo  $rows['desired_salary'];  ?></td>
</tr>
<tr  class="lg-1">
<td  class="tl-1"><div  align="left" ><strong>Projects:</strong></div></td><br/>
<td  class="tl-4"><?php  echo  $rows['projects'];  ?></td>
</tr>
<tr  class="lg-1">
<td  class="tl-1"><div  align="left" ><strong>Education1:</strong></div></td><br/>
<td  class="tl-4"><?php  echo  $rows['education1'];  ?></td>
</tr>

<tr  class="lg-1">
<td  class="tl-1"><div  align="left" ><strong>Education2:</strong></div></td><br/>
<td  class="tl-4"><?php  echo  $rows['education2'];  ?></td>
</tr>

<tr  class="lg-1">
<td  class="tl-1"><div  align="left" ><strong>Education3:</strong></div></td><br/>
<td  class="tl-4"><?php  echo  $rows['education3'];  ?></td>
</tr>

<tr  class="lg-1">
<td  class="tl-1"><div  align="left" ><strong>Experience1:</strong></div></td><br/>
<td  class="tl-4"><?php  echo  $rows['experience1'];  ?></td>
</tr>

<tr  class="lg-1">
<td  class="tl-1"><div  align="left" ><strong>Experience2:</strong></div></td><br/>
<td  class="tl-4"><?php  echo  $rows['experience2'];  ?></td>
</tr>

<tr  class="lg-1">
<td  class="tl-1"><div  align="left" ><strong>Experience3:</strong></div></td><br/>
<td  class="tl-4"><?php  echo  $rows['experience3'];  ?></td>
</tr>
<tr  class="lg-1">
<td  class="tl-1"><div  align="left" ><strong>Award:</strong></div></td><br/>
<td  class="tl-4"><?php  echo  $rows['Honors'];  ?></td>
</tr>
<tr  class="lg-1">
<td  class="tl-1"><div  align="left" ><strong>Hobby</strong></div></td><br/>
<td  class="tl-4"><?php  echo  $rows['hobby'];  ?></td>
</tr>
<tr  class="lg-1">
<td  class="tl-1"><div  align="left" ><strong>Language</strong></div></td><br/>
<td  class="tl-4"><?php  echo  $rows['language'];  ?></td>
</tr>
<tr  class="lg-1">
<td  class="tl-1"><div  align="left" ><strong>Publication</strong></div></td><br/>
<td  class="tl-4"><?php  echo  $rows['publication'];  ?></td>
</tr>
<tr>
<td><a href="browserseeker.php">Back to Browse Jobseeker Result</a></td>
</tr>
</table>  
 <?php
}
mysql_close();
?>
</div>
<div class="clearfix"></div>
  <?php include("footer.php");?>
</body>
</html>
