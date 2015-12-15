<?php
	//DB connection with all information set on Webtech server
 //require ("conn.php");
//	$con = mysql_connect("localhost", "root", "root" );
	//mysql_select_db("IADFINAL");
	//checking if the form is submitted or not. 
  $dbhost = 'localhost';
  $dbuser  = "root";
  $dbpass  = "root";
  $dbname  = "IADFINAL";

//*** create a connection object
  $conn = mysql_connect($dbhost, $dbuser, $dbpass)
  or die (mysql_error());

  mysql_select_db($dbname)
  or die (mysql_error());

	if(!isset($_POST['submit'])){
		echo "<script> window.open('SeekerReg.php','_self')</script>";
		exit();
	}


	//set all input data from entered by the user
	$role = $_POST['role'];
	$fname = $_POST['fname']; //user name, in this case an email address
	$lname = $_POST['lname']; //password
	$email = $_POST['email'];
	$password = $_POST['password'];
	$confpass = $_POST['confpass'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zip = $_POST['zip'];
	$createddate = $_POST['created'];
	$sid = mysql_insert_id(); ?>

	<h1><?php echo $role ?>
	<h1><?php echo $address ?>	
	<?php
	//if it is empty
	if($email==''){
	   echo "<script> alert('Please enter your email address.')</script>";
	   echo "<script> window.open('SeekerReg.php','_self')</script>";
	   exit(); //*** exit the register page
	}
	$check_user = "select * from seeker where email = '$email'"; //db query
	$run = mysql_query($check_user);
	
	//checking if the email already exist
	if(mysql_num_rows($run)>0){
	   echo "<script> alert('Sorry! This account already exists. Please enter a different email address')</script>";
	   echo "<script> window.open('SeekerReg.php','_self')</script>";
	   exit(); //*** exit the register page
	}

	if($password == $confpass)
	  $query = "INSERT into seeker(role, fName, lName, email, password, phone, address, city, state, created, zip) values ('$role', '$fname','$lname','$email','$password','$phone', '$address','$city','$state','$createddate', '$zip')";
	  
	else {
	   echo "<script> alert('Sorry! Password confirmation is not the same as Password. Try again!')</script>";
	   echo "<script> window.open('SeekerReg.php','_self')</script>";
	}	
	if(mysql_query($query)){
	   $to = $email;
       $subject = "Confirmation from CSJobLand was sent to $to";
       $message = "Dear $fname. Your account has been created!";

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

