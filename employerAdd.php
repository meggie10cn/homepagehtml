<!--

employer add the joblist here. This file empployerAdd.php is included in the employermain.php
it is action to employerJobList.php
-->

<form name = "employerAdd" id="employerAdd" method="post" >
<table>

	<tr>
		<td>Company Name:</td>
		<td><input type="text" name="company_name" /></td>
	</tr>
	<tr>
		<td>Title:</td>
		<td><input type="text" name="title" /></td>
	</tr>
	<tr>
		<td>Type:</td>
		<td>
			<select id="type_selected" name="type_selected">
			<!---<option value ="">Select Type</option>-->
			<?php
			 $conn = mysql_connect("localhost", "root", "root" );
	         mysql_select_db("IADFINAL");

		//*** execute the query
              $sql = "SELECT * FROM types";
               $result = mysql_query($sql);
              while ($row = mysql_fetch_assoc($result)){ 
              	echo "<option value='".$row['tid']."'>".$row['t_name']."</option>";
              }
				mysql_close(); ?>

			</select>
		</td>
	</tr>
   <tr>
		<td>Category:</td>
		<td><select id="category_selected" name="category_selected">
			<!--<option value ="">Select Category</option>-->
			<?php
			 $conn = mysql_connect("localhost", "root", "root" );
	         mysql_select_db("IADFINAL");

		//*** execute the query
              $sql = "SELECT * FROM categories";
               $result = mysql_query($sql);
              while ($row = mysql_fetch_assoc($result)){ 
              	echo "<option value='".$row['cid']."'>".$row['name']."</option>";
              }
				mysql_close(); ?>

			</select></td></tr>
	<tr>
		<td>Description:</td>
		<td><input type="text" name="description" /></td>
	</tr>
	<tr>
		<td>City:</td>
		<td><input type="text" name="city" /></td>
	</tr>
	<tr>
		<td>State:</td>
		<!--<td><input type="text" name="state" /></td>-->
		<td><select name = "state" id="state">
				<!--<option value="">Select State</option>-->
				<option value="AL">Alabama</option>
				<option value="AK">Alaska</option>
				<option value="AZ">Arizona</option>
				<option value="AR">Arkansas</option>
				<option value="CA">California</option>
				<option value="CO">Colorado</option>
				<option value="CT">Connecticut</option>
				<option value="DE">Delaware</option>
				<option value="FL">Florida</option>
				<option value="GA">Georgia</option>
				<option value="HI">Hawaii</option>
				<option value="ID">Idaho</option>
				<option value="IL">Illinois</option>
				<option value="IN">Indiana</option>
				<option value="IA">Iowa</option>
				<option value="KS">Kansas</option>
				<option value="KY">Kentucky</option>
				<option value="LA">Louisiana</option>
				<option value="ME">Maine</option>
				<option value="MD">Maryland</option>
				<option value="MA">Massachusetts</option>
				<option value="MI">Michigan</option>
				<option value="MN">Minnesota</option>
				<option value="MS">Mississippi</option>
				<option value="MO">Missouri</option>
				<option value="MT">Montana</option>
				<option value="NE">Nebraska</option>
				<option value="NV">Nevada</option>
				<option value="NH">New Hampshire</option>
				<option value="NJ">New Jersey</option>
				<option value="NM">New Mexico</option>
				<option value="NY">New York</option>
				<option value="NC">North Carolina</option>
				<option value="ND">North Dakota</option>
				<option value="OH">Ohio</option>
				<option value="OK">Oklahoma</option>
				<option value="OR">Oregon</option>
				<option value="PA">Pennsylvania</option>
				<option value="RI">Rhode Island</option>
				<option value="SC">South Carolina</option>
				<option value="SD">South Dakota</option>
				<option value="TN">Tennessee</option>
				<option value="TX">Texas</option>
				<option value="UT">Utah</option>
				<option value="VT">Vermont</option>
				<option value="VA">Virginia</option>
				<option value="WA">Washington</option>
				<option value="WV">West Virginia</option>
				<option value="WI">Wisconsin</option>
				<option value="WY">Wyoming</option>
			</select></td>
	</tr>
	<tr>
		<td>Zipcode:</td>
		<td><input type="text" name="zip" /></td>
	</tr>
	<tr>
		<td>Contact Email:</td>
		<td><input type="text" name="contact_email" /></td>
	</tr>
	<tr>
		<td>Post Date:</td>
		<td><input type="date" name="post_date" /></td>
	</tr>
	<tr>
		<td>Expired Date:</td>
		<td><input type="date" name="expired_date" /></td>
	</tr>
	<tr>
		<td>Salary:</td>
		<td><input type="text" name="salary" /></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="submit" value="Add Job" /></td>
	</tr>
</table>
<?php

if (isset($_POST['submit']))
	{	
	$conn = mysql_connect("localhost", "root", "root" );
	mysql_select_db("IADFINAL");   
	
	                $company_name=$_POST['company_name'] ;
			 		$title=$_POST['title'] ;
			 		$type = $_POST['type_selected'];
			 		$category=$_POST['category_selected'];
			 		$type=$_POST['type_selected'];
					$description= $_POST['description'] ;					
					$city=$_POST['city'] ;
					$state=$_POST['state'] ;
					$zip=$_POST['zip'] ;
					$contact_email=$_POST['contact_email'] ;		
					$post_date=$_POST['post_date'] ;
					$expired_date=$_POST['expired_date'] ;	
					$salary=$_POST['salary'] ;

					// get the value of eid
					$user = $_SESSION['valid_user'];
					$sql1 = "SELECT * FROM employers where email='$user'";
                    $result1 = mysql_query($sql1);
                    $employer = mysql_fetch_assoc($result1);
                    $eid=$employer['eid'];	
                    ?>
                    <h1><?php $eid ?> <?php

		$query ="INSERT INTO job(eid,company_name, title,cid,type_id,description, city,
state, zip, contact_email, post_date, expired_date, salary) 
		 VALUES ('$eid','$company_name', '$title','$category', '$type','$description', '$city',
'$state', '$zip', '$contact_email', '$post_date', '$expired_date', '$salary')";																
		 $result = mysql_query($query); 
		 if ($result){
		  header("Location: employerJobList.php"); }
		 else
		 {
		  header("Location: employermain.php");}		
	       }
?>
</form>

