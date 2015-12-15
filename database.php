<?php
/*
 /*
    Name: Lixia Zhao
    Course: CSC620 Internet Application Development
    HW3
    Date: Oct. 21, 2015
    File: database.php
    Description: database class 
 */
 
   class database{
        private $dbhost;
        private $dbuser;
        private $dbpass;
        private $dbname;
       

        public function database($dbhost, $dbuser, $dbpass, $dbname){
            $this->dbhost = $dbhost;
            $this->dbuser = $dbuser;
            $this->dbpass = $dbpass;
            $this->dbname = $dbname;
        }
        
        // create a database connection and check if it connect
        public function connect(){
            $this->conn = mysql_connect($this->dbhost, $this->dbuser, $this->dbpass)
                or die (mysql_error());
            
            mysql_select_db($this->dbname)
                or die (mysql_error());
        }
        
        //execute sql query by using mysql_fetch_row function
        public function executeSQLRowResult($dbquery){
            
            $result = mysql_query($dbquery);
            
            //*** die if no result
            if (!$result)
                die("Failed Query.". mysql_error());
            
            $row = mysql_fetch_row($result);
            
            //*** Free the result
            mysql_free_result($result);
            
            return $row;
        }
        
        //execute sql query by using mysql_fetch_assoc function
        public function executeSQLASSOCResult($dbquery){
            //*** execute the query
            $result = mysql_query($dbquery);
            
            //*** die if no result
            if (!$result)
                die("Failed Query.". mysql_error());
            
            $row = mysql_fetch_assoc($result);
            
            mysql_free_result($result);
            
            return $row;
        }
        
        //update database
        public function executeUpdateSQL ($dbquery) {
            mysql_query($dbquery);
        }
        
        //close a database connection
        public function disconnect(){
            mysql_close($this->conn);
        }
    }
?>