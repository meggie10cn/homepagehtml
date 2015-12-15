<?php
	//DB connection with all information set on Webtech server
	$conn = mysql_connect("localhost", "root", "root" );
	mysql_select_db("IADFINAL");
	//*** do this when form is submitted
	if(!isset($_POST['login'])){
		echo "<script> window.open('login.html','_self')</script>";
		exit(); //*** exit the login page
	}
	$user = $_POST['uname'];
    $passwd = $_POST['pass'];
	$utype = $_POST['usertype'];
	//if empty loop to the login page. Validation check 
	if($user==''){
	   //header("location: login.html");
	   echo "<script> alert('Please enter your user name.')</script>";
	   header("location: login.html");
	   exit(); //*** exit the login page
	}
	//db query 
       
    if ($utype == "JobSeeker") {
	    $check_user = "select * from seeker where email = '$user' and password = '$passwd'";
        
        $run = mysql_query($check_user);
	    //if the email is a valid user 
	    if(mysql_num_rows($run)==1){
	       session_start(); //*** start a new session
	       $_SESSION['valid_user'] = $user; //***set a session variable
	       echo "<script> window.open('Jobseekerprofile.php','_self')</script>";
	    
		}else{
	       header("location: login.html");
	       echo "<script> alert('Sorry! The email is not valid. Please enter a valid email address.')</script>";
        } 
	}
	else if ($utype == "Employer") {
             $check_user = "select * from employers where email = '$user' and password = '$passwd' and role = '$utype'"; 
  
	         $run = mysql_query($check_user);
	         //if the email is a valid user 
	         if(mysql_num_rows($run)==1){
	            session_start(); //*** start a new session
	            $_SESSION['valid_user'] = $user; //***set a session variable
	            echo "<script> window.open('employerJobList.php','_self')</script>";
	         }//if the email is not a valid one, redirect to the login.html page
	         else{
	             header("location: login.html");
	             echo "<script> alert('Sorry! The email is not valid. Please enter a valid email address.')</script>";
	         }
    }
mysql_close($conn); //close the db connection
?>
