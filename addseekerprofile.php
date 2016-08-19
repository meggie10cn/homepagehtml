

<!--<form name = "uploadprofile" action="upload.php" method="post" enctype="multipart/form-data">
    Select  to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>-->

<div align="center">
<h6> Fill in the Form </h6>
</div>
<form name = "profileAdd" id="profileAdd" method="post"  >
<table>
	<tr>
		<td>Skills:</td>
		<td><input type="text" name="skill" required /></td>
	</tr>
	<tr>
		<td>Project:</td>
		<td><input type="text" name="projects" required/></td>
	</tr>
	
	<tr>
		<td>Computer Language:</td>
		<td><input type="text" name="language" /></td>
	</tr>
	<tr>
		<td>Education1:</td>
		<td><input type="text" name="education1" required/></td>
	</tr>
    <tr>
		<td>Education2:</td>
		<td><input type="text" name="education2" /></td>
	</tr>

    <tr>
		<td>Education3:</td>
		<td><input type="text" name="education3" /></td>
	</tr>

	<tr>
		<td>Experience1:</td>
		<td><input type="text" name="experience1" required/></td>
	</tr>

	<tr>
		<td>Experience2:</td>
		<td><input type="text" name="experience2" /></td>
	</tr>

	<tr>
		<td>Experience3:</td>
		<td><input type="text" name="experience3" /></td>
	</tr>
	<tr>
		<td>Honor:</td>
		<td><input type="text" name="Honors" /></td>
	</tr>
	<tr>
		<td>Hobby: </td>
		<td><input type="text" name="hobby" /></td>
	</tr>
	<tr>
		<td>Publication:</td>
		<td><input type="text" name="publication" /></td>
	</tr>
	<tr>
		<td>Desired Salary:</td>
		<td><input type="text" name="desired_salary" /></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="submit" value="Add Profile" /></td>
	</tr>
</table>
<?php

if (isset($_POST['submit']))
{	  
     $dbhost = 'localhost';
     $dbuser='user21';
	 $dbpass='6k1kTPLe';
	 $dbname='user21db';
	 $conn = mysql_connect($dbhost, $dbuser, $dbpass)
				or die (mysql_error());

		mysql_select_db($dbname)
				or die (mysql_error());
		//*** die if no result
	 $seeker = $_SESSION['valid_user'];
	  
        // get the sid from seeker
        $sql1 = "SELECT * FROM seeker where email='$seeker'";
        $result1 = mysql_query($sql1);
        $seekers = mysql_fetch_assoc($result1);
        $sid=$seekers['sid'];
		$salary=$_POST['desired_salary'];
	    $skill=$_POST['skill'];
	    $projects=$_POST['projects'];
		$language = $_POST['language'];
		$publication=$_POST['publication'];
		$education1= $_POST['education1'];
		$education2= $_POST['education2'];
		$education3= $_POST['education3'];	
		$experience1= $_POST['experience1'];
		$experience2= $_POST['experience2'];	
		$experience3= $_POST['experience3'];			
		
		$hobby=$_POST['hobby'];
		$Honors=$_POST['Honors'];



		$query = "INSERT INTO profile (sid,desired_salary,skill,projects,hobby,language, publication,
education1,education2,education3, experience1,experience2, experience3, Honors) 
		 VALUES ('$sid','$salary','$skill','$projects', '$hobby', '$language',
'$publication', '$education1', '$education2', '$education3', '$experience1','$experience2', '$experience3','$Honors')";																
		 $result = mysql_query($query); 
		 if ($result){
		 	echo 'success';
		 
         header("Location: Jobseekerprofile.php");	}
		 else{
		 	echo "error!";
            header("Location: addprofile.php");
		 }
		 		
	}
?>

</form>
