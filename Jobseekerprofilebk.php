<?php
    
//session_start();
 //  $_SESSION['username']
		
?>
<!DOCTYPE  html>
<html>
<head>
<meta  content='text/html;  charset=UTF-8'  http-equiv='Content-Type'/>
<link  rel="stylesheet"  type="text/css"  href="style.css"  />
<title>User Profile</title>
</head>
<body>
<h1  align='center'>Welcome  <?php  echo  $loggedin_session;  ?>,</h1>
<p  align='center'>  You  are  now  logged  in.  you  can  logout  by  clicking  on  signout  link  given  below.</p>
<div  id="st"><a  href="logout.php"  id="st-btn" align "right">Sign  Out</a></div>

<?php

//*** execute the query
		 
		
$dbhost = 'localhost';
            $dbuser='root';
	        $dbpass='root';
	        $dbname='IADFINAL';

		//*** create a connection object
		$conn = mysql_connect($dbhost, $dbuser, $dbpass)
				or die (mysql_error());

		mysql_select_db($dbname)
				or die (mysql_error());
		//*** die if no result
		$sql="SELECT * FROM profile p JOIN
		seeker s on p.sid=s.sid";
		$result=mysql_query($sql);
		if (!$result)
			 die("Query Failed.");

?>
<?php 

while($rows=mysql_fetch_assoc($result)){ ?>

<form   id="signin"  id="reg">
<div  id="reg-head"  class="headrg"><strong>Your  Profile</strong></div>
<table  border="0"  align="left"  cellpadding="2"  cellspacing="0">
<tr  class="lg-1">
<td  class="tl-1"><div  align="left"  id="tb-name"><strong>Name</strong></div></td><br/>
<td  class="tl-4"><?php  echo  $rows['fName'];  ?>, <?php  echo  $rows['lName'];  ?></td>
</tr>
<tr  class="lg-1">
<td  class="tl-1"><div  align="left"  id="tb-name"><strong>email</strong></div></td><br/>
<td  class="tl-4"><?php  echo  $rows['email'];  ?>, <?php  echo  $rows['phone'];  ?></td>
</tr>
<tr  class="lg-1">
<td  class="tl-1"><div  align="left"  id="tb-name"><strong>address</strong></div></td><br/>
<td  class="tl-4"><?php  echo  $rows['address'];  ?></td>
</tr>
<tr  class="lg-1">
<td  class="tl-1"><div  align="left"  id="tb-name"><strong>city</strong></div></td><br/>
<td  class="tl-4"><?php  echo  $rows['city'];  ?>,<?php  echo  $rows['state'];  ?></td>
</tr>
<tr  class="lg-1">
<td  class="tl-1"><div  align="left"  id="tb-name"><strong>Skill</strong></div></td><br/>
<td  class="tl-4"><?php  echo  $rows['skill'];  ?></td>
</tr>
<tr  class="lg-1">
<td  class="tl-1"><div  align="left"  id="tb-name"><strong>Desired Salary</strong></div></td><br/>
<td  class="tl-4"><?php  echo  $rows['desired_salary'];  ?></td>
</tr>
<tr  class="lg-1">
<td  class="tl-1"><div  align="left"  id="tb-name"><strong>Job Type</strong></div></td><br/>
<td  class="tl-4"><?php  echo  $rows['type_id'];  ?></td>
</tr>
<tr  class="lg-1">
<td  class="tl-1"><div  align="left"  id="tb-name"><strong>Projects</strong></div></td><br/>
<td  class="tl-4"><?php  echo  $rows['projects'];  ?></td>
</tr>
<tr  class="lg-1">
<td  class="tl-1"><div  align="left"  id="tb-name"><strong>Award</strong></div></td><br/>
<td  class="tl-4"><?php  echo  $rows['Honors'];  ?></td>
</tr>
<tr  class="lg-1">
<td  class="tl-1"><div  align="left"  id="tb-name"><strong>Hobby</strong></div></td><br/>
<td  class="tl-4"><?php  echo  $rows['hobby'];  ?></td>
</tr>
<tr  class="lg-1">
<td  class="tl-1"><div  align="left"  id="tb-name"><strong>Language</strong></div></td><br/>
<td  class="tl-4"><?php  echo  $rows['language'];  ?></td>
</tr>
<tr  class="lg-1">
<td  class="tl-1"><div  align="left"  id="tb-name"><strong>Publication</strong></div></td><br/>
<td  class="tl-4"><?php  echo  $rows['publication'];  ?></td>
</tr>
</table>

      
</form>
 <?php  }

mysql_close();
?>
</br>
<div  id="footer">
</body>
</html>