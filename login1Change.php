<?php
	//DB connection with all information set on Webtech server
		//checking if the form is submitted or not. 
  $dbhost = 'localhost';
  $dbuser  = "root";
  $dbpass  = "root";
  $dbname  = "IADFINAL";

//*** create a connection object
  $conn = mysql_connect($dbhost, $dbuser, $dbpass)
  or die (mysql_error());

  mysql_select_db($dbname)
  or die (mysql_error())
	//*** do this when form is submitted
	if(!isset($_POST['login'])){
		echo "<script> window.open('login.php','_self')</script>";
		exit(); //*** exit the login page
	}
	$user = $_POST['uname'];
    $passwd = $_POST['pass'];
	$utype = $_POST['usertype'];

	?>
	<h1><?php echo $user ?></h1>
	<h1><?php echo $utype ?></h1> <?php 
	//if empty loop to the login page. Validation check 
	if($user==''){
	   //header("location: login.html");
	   echo "<script> alert('Please enter your user name.')</script>";
	   header("location: login.php");
	   exit(); //*** exit the login page
	}
	//db query 
       
    if ($utype == "JobSeeker") {
	    $check_user = "SELECT * from seeker where email = '$user' and password = '$passwd'";
        
        $run = mysql_query($check_user);
	    //if the email is a valid user 
	    if(mysql_num_rows($run)==1){
	       session_start(); //*** start a new session
	       $_SESSION['valid_user'] = $user; //***set a session variable
	       echo "<script> window.open('latestjobs.php','_self')</script>";
	    
		}else{
	       header("location: login.php");
	       echo "<script> alert('Sorry! The email is not valid. Please enter a valid email address.')</script>";
        } 
	}
	if ($utype == "Employer") {
             $check_user = "SELECT * from employers where email = '$user' and password = '$passwd'"; 
  
	         $run = mysql_query($check_user);
	         //if the email is a valid user 
	         if(mysql_num_rows($run)==1){
	            session_start(); //*** start a new session
	            $_SESSION['valid_user'] = $user; //***set a session variable
	            echo "<script> window.open('employerIndex.php','_self')</script>";
	         }//if the email is not a valid one, redirect to the login.html page
	         else{
	             header("location: login.php");
	             echo "<script> alert('Sorry! The email is not valid. Please enter a valid email address.')</script>";
	         }
    }
mysql_close($conn); //close the db connection
?>
