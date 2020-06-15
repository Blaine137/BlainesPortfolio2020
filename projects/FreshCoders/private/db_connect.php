<?php 
    
    function db_connect(){
       // $connection = mysqli_connect('localhost', 'root', 'root', 'phpusers'); localhost connection
        //$connection = mysqli_connect('localhost', 'id9433057_2352blaineyoung', 'test123', 'id9433057_phpusers'); //server  dbuser  password  dbname 000webhost
        $connection = mysqli_connect('localhost', 'u742222354_blaine', 'skater3553', 'u742222354_dbtest'); //hostinger db
        confirm_db_connect();
        return $connection;
    }

    function db_disconnect($connection) {
    if(isset($connection)) {
      mysqli_close($connection);
    }
  }

    function db_escape($connection, $string) {
        
        return mysqli_real_escape_string($connection, $string);
    }

    function confirm_db_connect() {
        if(mysqli_connect_errno()) {
            $msg = "Database connection failed: ";
            $msg .= mysqli_connect_error();
            $msg .= " (" . mysqli_connect_errno() . ")";
            exit($msg);
        }
    }

    function confirm_result_set($result_set) {
        if (!$result_set) {
    	       exit("Database query failed.");
            }
    }


?>