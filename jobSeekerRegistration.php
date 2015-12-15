<?php
	//DB connection with all information set on Webtech server
	$conn = mysql_connect("localhost", "user12", "csZmhcXs" );
	mysql_select_db("user12db");
	//checking if the form is submitted or not. 
	if(!isset($_POST['submit'])){
		echo "<script> window.open('jobSeekerRegistration.html','_self')</script>";
		exit();
	}
	//set all input data from entered by the user
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
	$sid = mysql_insert_id();
	
	//if it is empty
	if($email==''){
	   echo "<script> alert('Please enter your email address.')</script>";
	   echo "<script> window.open('jobSeekerRegistration.html','_self')</script>";
	   exit(); //*** exit the register page
	}
	$check_user = "select * from jobseekerregistration where email = '$email'"; //db query
	$run = mysql_query($check_user);
	
	//checking if the email already exist
	if(mysql_num_rows($run)>0){
	   echo "<script> alert('Sorry! This account already exists. Please enter a different email address')</script>";
	   echo "<script> window.open('jobSeekerRegistration.html','_self')</script>";
	   exit(); //*** exit the register page
	}

	if($password == $confpass)
	  $query = "insert into jobseekerregistration (sid, fname, lname, email, password, phone, address, city, state, zip) values ('null', '$fname','$lname','$email','$password','$phone','$address','$city','$state', '$zip')";
	else {
	   echo "<script> alert('Sorry! Password confirmation is not the same as Password. Try agai!')</script>";
	   echo "<script> window.open('jobSeekerRegistration.html','_self')</script>";
	}	
	if(mysql_query($query)){
	
	    $to = $email;
       $subject = "Confirmation from TutsforWeb to $to";
       $header = "TutsforWeb: Confirmation from TutsforWeb";
       $message = "Please click the link below to verify and activate your account. rn";

       $sentmail = mail($to,$subject,$message,$header);

       if($sentmail)
            {
       echo "Your Confirmation link Has Been Sent To Your Email Address.";
       }
       else
         {
          echo "Cannot send Confirmation link to your e-mail address";
       }
	   
	   //redirect to login page
	   echo "<script> alert('Your Registration was successfull!!.')</script>";    
	 
	   //email("ec591680@sju.edu", "Confirmation Email", "Thank you for your registration on our website");
	   echo "<script> window.open('confirmationEmail.html','_self')</script>";
	}
    mysql_close($conn);	//close the db connection
?>

