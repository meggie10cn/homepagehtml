<?php
	//DB connection with all information set on Webtech server
	        $dbhost = "localhost";
            $dbuser="user21";
	        $dbpass="6k1kTPLe";
	        $dbname="user21db";

		//*** create a connection object
		$conn = mysql_connect($dbhost, $dbuser, $dbpass)
				or die (mysql_error());

		mysql_select_db($dbname)
				or die (mysql_error());
	//*** do this when form is submitted
	
	$user = $_POST['uname'];
    $passwd = $_POST['pass'];
	$utype = $_POST['usertype'];
	//if empty loop to the login page. Validation check 
	//db query 
       
    if ($utype == "JobSeeker") {
	    $check_user = "select * from seeker where email = '$user' and password = '$passwd'";
        
        $run = mysql_query($check_user);
	    //if the email is a valid user 
	    if(mysql_num_rows($run)==1){
	       session_start(); //*** start a new session
	       $_SESSION['valid_user'] = $user; //***set a session variable
	       header("location:Jobseekerprofile.php");
	    
		}else{
			header("location: login.html");
	       echo "<script> alert('Sorry! The email or username is not valid. ')</script>";
        } 
	}
	else if ($utype == "Employer") {
             $check_user = "select * from employers where email = '$user' and password = '$passwd' and role = '$utype'"; 
  
	         $run = mysql_query($check_user);
	         //if the email is a valid user 
	         if(mysql_num_rows($run)==1){
	            session_start(); //*** start a new session
	            $_SESSION['valid_user'] = $user; //***set a session variable
	            header("location:employerJobList.php");
	         }//if the email is not a valid one, redirect to the login.html page
	         else{
	             header("location: login.html");
	             echo "<script> alert('Sorry! The email or username is not valid. ')</script>";
	         }
    }
mysql_close($conn); //close the db connection
?>
