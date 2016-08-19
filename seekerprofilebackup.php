

<h4 align="center"><strong><?php echo $_SESSION['seeker_Name'] ?>'s Profile</strong></h4>
  			
<?php
//*** execute the query
				
            $dbhost = 'localhost';
            $dbuser='user21';
	        $dbpass="6k1kTPLe";
	        $dbname='user21db';

		//*** create a connection object
		$conn = mysql_connect($dbhost, $dbuser, $dbpass)
				or die (mysql_error());

		mysql_select_db($dbname)
				or die (mysql_error());
		//*** die if no result
	    $sid= $_SESSION['seeker_id']; 
	    $seeker = $_SESSION['valid_user'];
        // get the sid from seeker
        $sql1 = "SELECT * FROM seeker where email='$seeker'";
        $result1 = mysql_query($sql1);
        $seekers = mysql_fetch_assoc($result1);
        $sid=$seekers['sid']; 

		//$sql="SELECT * FROM profile p JOIN
		//seeker s on p.sid=s.sid where p.sid={$_SESSION['seeker_id']}";
		$sql="SELECT * FROM profile p JOIN
		seeker s on p.sid=s.sid where p.sid='$sid'";
		$result=mysql_query($sql);
		if (!$result)
			 die("Your Profile is Empty.");
if (mysql_num_rows($result)==0){ ?>
<form id="add_job_link" align="center">
	<button class="large green" style="backgrond-color: #FE2E64" id="add_job_button">
		<i class="icon-plus"></i><a href="addprofile.php">Add Profile</a></button>
  </form>
  <?php 
}   
else {      
while($rows=mysql_fetch_assoc($result)){ ?>

<form id="seekerprofile"  name="seekerprofile">
<table  border="0"  align="left"  cellpadding="2"  cellspacing="0">
<tr  class="lg-1">
<td  class="tl-1"><div  align="left" ><strong>Name:</strong></div></td><br/>
<td  class="tl-4"><?php  echo  $rows['fName'];  ?>, <?php  echo  $rows['lName'];  ?></td>
</tr>
<tr  class="lg-1">
<td  class="tl-1"><div  align="left" ><strong>Email </strong></div></td><br/>
<td  class="tl-4"><?php  echo  $rows['email'];  ?></td>
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
</table>  
</form>
 <?php  }
}
mysql_close();
?>
</br>
