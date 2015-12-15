<?php 
    //*** kill current session
	session_start();
    session_destroy();
	
	//*** redirect somewhere
    header("location: index.php");
?>