<?php
	//DB connection with all information set on Webtech server
    // Nov. 25/16 change the php file name and Cofirmationemail.php
  $dbhost = 'localhost';
  $dbuser  = "root";
  $dbpass  = "root";
  $dbname  = "IADFINAL";

//*** create a connection object
  $conn = mysql_connect($dbhost, $dbuser, $dbpass)
  or die (mysql_error());

  mysql_select_db($dbname)
  or die (mysql_error());

	//checking if the form is submitted or not. 
	if(!isset($_POST['submit'])){
		echo "<script> window.open('employerRegistr.php','_self')</script>";// 11/26/2015 Lixia Changed the employerRegistr.php
		exit();
	}
	//set all input data from entered by the user
	$role = $_POST['role'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$confpass = $_POST['confpass'];
	$contact_name = $_POST['contact_name']; //user name, in this case an email address
	$company_name = $_POST['company_name']; //password
	$phone = $_POST['phone'];
	$website_url = $_POST['website_url'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zip = $_POST['zip'];
	//$eid = mysql_insert_id();
	
	//if it is empty
	if($email==''){
	   echo "<script> alert('Please enter your email address.')</script>";
	   echo "<script> window.open('employerRegistr.php','_self')</script>";
	   exit(); //*** exit the register page
	}
	$check_user = "select * from employers where email = '$email'"; //db query
	$run = mysql_query($check_user);
	
	//checking if the email already exist
	if(mysql_num_rows($run)>0){
	   echo "<script> alert('Sorry! This account already exists. Please enter a different email address')</script>";
	   echo "<script> window.open('employerRegistr.php','_self')</script>";
	   exit(); //*** exit the register page
	}

	if($password == $confpass)
	  $query = "INSERT into employers (role, email, password, contact_name, company_name, phone, website_url, address, city, state,zip) values ('$role', '$email','$password', '$contact_name','$company_name', '$phone', '$website_url', '$address', '$city', '$state', '$zip')";
	else {
	   echo "<script> alert('Sorry! Password confirmation is not the same as Password. Try again!')</script>";
	   echo "<script> window.open('employerRegistr.php','_self')</script>";
	}	
	if(mysql_query($query)){
	   $to = $email;
       $subject = "Confirmation from Job website to $to";
       $message = "Dear  ".$lname." ". $fname." Your account has been created! Thank you for visiting CSJobland";//add. to each variable -lixia 12/1/2015

       $sentmail = mail($to,$subject,$message);

       if($sentmail) {
	      echo "<script> window.open('confirmationEmail.php','_self')</script>";
          //echo "Your Confirmation Has Been Sent To Your Email Address.";
       }else {
          echo "<script> alert('Cannot send Confirmation to your e-mail address')</script>";
		  //echo "Cannot send Confirmation to your e-mail address";
       }
	   //redirect to login page
	   //echo "<script> alert('Your Registration was successfull!!.')</script>";    
	}
    mysql_close($conn);	//close the db connection
?>

