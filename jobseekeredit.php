<?php 
 session_start();
 ob_start();

if (isset($_SESSION['valid_user'])){
 $user=$_SESSION['valid_user'];
 }
 ob_flush();
 ?> 
 <?php include ("header.php"); ?>
<?php include("seekernav2.php");?>
<div id = "myDiv" class="col_12 column">
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

        $sql="SELECT * FROM profile p JOIN
		seeker s on p.sid=s.sid where p.sid='$sid'";
		$result=mysql_query($sql);
		if (!$result)
			 die("Your Profile is Empty.");
        
        $seekerRow=mysql_fetch_array($result); 

if(isset($_POST['save']))
{	

	$skill_save=$_POST['skill'] ;
	$project_save=$_POST['project'] ;
	$language_save= $_POST['language'] ;					
	$education1_save=$_POST['education1'] ;
	$education2_save=$_POST['education2'] ;
	$education3_save=$_POST['education3'] ;
	$experience1_save=$_POST['experience1'] ;		
	$experience2_save=$_POST['experience2'] ;
	$experience3_save=$_POST['experience3'] ;	
	$honor_save=$_POST['honor'];
	$hobby_save = $_POST['hobby'];
	$desiredsalary_save=$_POST['desiredsalary'];
  //, cid='$type_save', type_id='$category_save'
	mysql_query("UPDATE profile SET skill ='$skill_save', projects ='$project_save',
		 language ='$language_save', education1 ='$education1_save', education2 ='$education2_save', education3 ='$education3_save',
		 experience1 ='$experience1_save', experience2 = '$experience2_save', experience3 = '$experience3_save', Honors ='$honor_save',
		 hobby ='$hobby_save', desired_salary ='$desiredsalary_save' WHERE sid = '$sid'")
				or die(mysql_error()); 
	echo "Your Profile Has Been Updated!";
	
	header("Location: Jobseekerprofile.php");			
}
mysql_close($conn);
?>


		   <!--text and input fields-->
<form name = "seeker_update" method="post">
<table>
	<tr>
		<td>Skill:</td>
		<td><input type="text" name="skill" value="<?php echo $seekerRow['skill'] ?>" required /></td>
	</tr>
	<tr>
		<td>Project:</td>
		<td><input type="text" name="project" value="<?php echo $seekerRow['projects'] ?>" required /></td>
	</tr>
	
	<tr>
		<td>Computer Language:</td>
		<td><input type="text" name="language" value="<?php echo $seekerRow['language'] ?>" required /></td>
	<tr>
		<td>Education1:</td>
		<td><input type="text" name="education1" value="<?php echo $seekerRow['education1'] ?>" required /></td>
	</tr>
	<tr>
		<td>Education2:</td>
		<td><input type="text" name="education2" value="<?php echo $seekerRow['education2'] ?>"/></td>
	</tr>
	<tr>
		<td>Education3:</td>
		<td><input type="text" name="education3" value="<?php echo $seekerRow['education3'] ?>"/></td>
	</tr>

	<tr>
		<td>Experience1:</td>
		<td><input type="text" name="experience1" value="<?php echo $seekerRow['experience1'] ?>" required /></td>
	</tr>

	<tr>
		<td>Experience2:</td>
		<td><input type="text" name="experience2" value="<?php echo $seekerRow['experience2'] ?>"/></td>
	</tr>

	<tr>
		<td>Experience3:</td>
		<td><input type="text" name="experience3" value="<?php echo $seekerRow['experience3'] ?>"/></td>
	</tr>
	<tr>
		<td>Honor:</td>
		<td><input type="text" name="honor" value="<?php echo $seekerRow['Honors'] ?>"/></td>
	</tr>
	<tr>
		<td>Hobby:</td>
		<td><input type="text" name="hobby" value="<?php echo $seekerRow['hobby'] ?>"/></td>
	</tr>
    <tr>
		<td>Desired Salary:</td>
		<td><input type="text" name="desiredsalary" value="<?php echo $seekerRow['desired_salary'] ?>"/></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="save" value="Update" /></td>
	</tr>
</table>
</form>
</div>
<div class="clearfix"></div>
	<?php include("footer.php");?>
</body>
</html>
