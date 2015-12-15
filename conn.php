<?php
/*
	/*
    Name: Lixia Zhao
    Course: CSC620 Internet Application Development
    HW3
    Date: Oct. 21, 2015
    File: conn.php
    Description: connect database to webpage
 */
 require_once 'database.php';
	// create database credentials
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = 'root';
    $dbname = 'IADFINAL';
    

	//create database instance
    $con = new database($dbhost, $dbuser, $dbpass, $dbname);