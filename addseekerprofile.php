

<!--<form name = "uploadprofile" action="upload.php" method="post" enctype="multipart/form-data">
    Select  to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>-->

<?php
$error = "";
if (isset($_FILES["file"])) {
	$allowedExts = array("doc", "docx", "pdf", "odt");
	$temp = explode(".", $_FILES["file"]["name"]);
	$extension = end($temp);
 
	if ($_FILES["file"]["error"] > 0) {
		$error .= "Error opening the file<br />";
	}
	if ( $_FILES["file"]["type"] != "application/pdf" &&
			$_FILES["file"]["type"] != "application/vnd.openxmlformats-officedocument.wordprocessingml.document" &&
			$_FILES["file"]["type"] != "application/msword" &&
			$_FILES["file"]["type"] != "application/vnd.oasis.opendocument.text") {	
		$error .= "Mime type not allowed<br />";
	}
	if (!in_array($extension, $allowedExts)) {
		$error .= "Extension not allowed<br />";
	}
	if ($_FILES["file"]["size"] > 102400) {
		$error .= "File size shoud be less than 100 kB<br />";
	}
 
	if ($error == "") {
		echo "uploaded successfully";
	} else {
		echo $error;
	}
}	
?>
 
<form name= "uploadfile" action="addseekerprofile.php" method="post" enctype="multipart/form-data">
	<label for="file">Filename:</label>
	<input type="file" name="file" id="file" /><br />
	<input type="submit" name="submit" value="Submit" />
</form>
 <?php
if ($_FILES['file']['error'] == UPLOAD_ERR_OK               //checks for errors
      && is_uploaded_file($_FILES['file']['tmp_name'])) { //checks that file is uploaded
  echo file_get_contents($_FILES['file']['tmp_name']); 
} ?>
<div align="center">
<h6> Or Fill in the Form If You Do not Choose to Upload Your Resume</h6>
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
     $dbuser='root';
	 $dbpass='root';
	 $dbname='IADFINAL';
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
