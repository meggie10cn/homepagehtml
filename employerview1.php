<?php
require("db.php");
$id =$_REQUEST['jid'];

$result = mysql_query("SELECT * FROM job WHERE jid  = '$id'");
$test = mysql_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}	
				$company_name=$test['company_name'] ;
				$title= $test['title'] ;					
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
	$description_save= $_POST['description'] ;					
	$city_save=$_POST['city'] ;
	$state_save=$_POST['state'] ;
	$zip_save=$_POST['zip'] ;
	$contact_email_save=$_POST['contact_email'] ;		
	$post_date_save=$_POST['post_date'] ;
	$expired_date_save=$_POST['expired_date'] ;	
	$salary_save=$_POST['salary'] ;	

	mysql_query("UPDATE job SET company_name ='$company_name_save', title ='$title_save',
		 description ='$description_save',city ='$city_save',state ='$state_save',zip ='$zip_save',
		 contact_email ='$contact_email_save',post_date ='$post_date_save',expired_date ='$expired_date_save',
		 salary ='$salary_save' WHERE jid = '$id'")
				or die(mysql_error()); 
	echo "Saved!";
	
	header("Location: index.php");			
}
mysql_close($conn);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<form method="post">
<table>
	<tr>
		<td>company_name:</td>
		<td><input type="text" name="company_name" value="<?php echo $company_name ?>"/></td>
	</tr>
	<tr>
		<td>title</td>
		<td><input type="text" name="title" value="<?php echo $title ?>"/></td>
	<tr>
		<td>description</td>
		<td><input type="text" name="description" value="<?php echo $description ?>"/></td>
	<tr>
		<td>city</td>
		<td><input type="text" name="city" value="<?php echo $city ?>"/></td>
	</tr>
	<tr>
		<td>state</td>
		<td><input type="text" name="state" value="<?php echo $state ?>"/></td>
	</tr>
	<tr>
		<td>zip</td>
		<td><input type="text" name="zip" value="<?php echo $zip ?>"/></td>
	</tr>
	<tr>
		<td>contact_email</td>
		<td><input type="text" name="contact_email" value="<?php echo $contact_email ?>"/></td>
	</tr>
	<tr>
		<td>post_date</td>
		<td><input type="date" name="post_date" value="<?php echo $post_date ?>"/></td>
	</tr>
	<tr>
		<td>expired_date</td>
		<td><input type="date" name="expired_date" value="<?php echo $expired_date ?>"/></td>
	</tr>
	<tr>
		<td>salary</td>
		<td><input type="text" name="salary" value="<?php echo $salary ?>"/></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="save" value="save" /></td>
	</tr>
</table>

</body>
</html>
