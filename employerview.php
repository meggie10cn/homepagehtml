<?php 
 session_start();
 ob_start();

if (isset($_SESSION['valid_user'])){
 $user=$_SESSION['valid_user'];
 }
 ob_flush();
 ?> 

 
<?php include ("header.php"); ?>
<?php include("employernavigator.php");?>
<div id = "myDiv" class="col_12 column">
<?php
$conn = mysql_connect("localhost", "root", "root" );
	mysql_select_db("IADFINAL");

//$id =$_REQUEST['jid'];
$id = isset($_GET['id'])?(int)$_GET['id']: null;
$query = "SELECT * FROM job WHERE jid  = '$id'";
$result = mysql_query($query);
$test = mysql_fetch_array($result);

if (!$result) 
		{
		die("Error: Data not found..");
		}	
				$company_name=$test['company_name'] ;
				$title= $test['title'];
				//$type_selected = $test['type_id'];
				//$category_selected = $test['cid'];				
				$description=$test['description'] ;
				$city=$test['city'] ;
				$state=$test['state'] ;
				$zip=$test['zip'] ;
				$contact_email=$test['contact_email'] ;
				$post_date=$test['post_date'] ;
				$expired_date=$test['expired_date'] ;
				$salary=$test['salary'] ;

if(isset($_POST['save']))
{	

	$company_name_save=$_POST['company_name'] ;
	$title_save=$_POST['title'] ;
	//$type_save = $_POST['type_selected'];
	//$category_save=$_POST['category_selected'];
	$description_save= $_POST['description'] ;					
	$city_save=$_POST['city'] ;
	$state_save=$_POST['state'] ;
	$zip_save=$_POST['zip'] ;
	$contact_email_save=$_POST['contact_email'] ;		
	$post_date_save=$_POST['post_date'] ;
	$expired_date_save=$_POST['expired_date'] ;	
	$salary_save=$_POST['salary'] ;	
  //, cid='$type_save', type_id='$category_save'
	mysql_query("UPDATE job SET company_name ='$company_name_save', title ='$title_save',
		 description ='$description_save',city ='$city_save',state ='$state_save',zip ='$zip_save',
		 contact_email ='$contact_email_save',post_date ='$post_date_save',expired_date ='$expired_date_save',
		 salary ='$salary_save' WHERE jid = '$id'")
				or die(mysql_error()); 
	echo "Saved!";
	
	header("Location: employerJobList.php");			
}
mysql_close($conn);
?>
<form name = "employer_update" method="post">
<table>
	<tr>
		<td>Company Name:</td>
		<td><input type="text" name="company_name" value="<?php echo $company_name ?>"/></td>
	</tr>
	<tr>
		<td>Title:</td>
		<td><input type="text" name="title" value="<?php echo $title ?>"/></td>
	</tr>
		<!--<tr>
		<td>category</td>
		<td><input type="text" name="category" value="<?php //echo $category_selected ?>"/></td>
	</tr>
	</tr>
		<tr>
		<td>type</td>
		<td><input type="text" name="type" value="<?php //echo $type_selected ?>"/></td>
	</tr>-->
	<tr>
		<td>Description:</td>
		<td><input type="text" name="description" value="<?php echo $description ?>"/></td>
	<tr>
		<td>City:</td>
		<td><input type="text" name="city" value="<?php echo $city ?>"/></td>
	</tr>
	<tr>
		<td>State:</td>
		<td><input type="text" name="state" value="<?php echo $state ?>"/></td>
	</tr>
	<tr>
		<td>Zipcode:</td>
		<td><input type="text" name="zip" value="<?php echo $zip ?>"/></td>
	</tr>
	<tr>
		<td>Contact Email:</td>
		<td><input type="text" name="contact_email" value="<?php echo $contact_email ?>"/></td>
	</tr>
	<tr>
		<td>Post Date:</td>
		<td><input type="date" name="post_date" value="<?php echo $post_date ?>"/></td>
	</tr>
	<tr>
		<td>Expired Date:</td>
		<td><input type="date" name="expired_date" value="<?php echo $expired_date ?>"/></td>
	</tr>
	<tr>
		<td>Salary:</td>
		<td><input type="text" name="salary" value="<?php echo $salary ?>"/></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="save" value="save" /></td>
	</tr>
</table>
</div>
<div class="clearfix"></div>
	<?php include("footer.php");?>
</body>
</html>
