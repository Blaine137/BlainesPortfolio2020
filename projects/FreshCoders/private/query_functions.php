<?php 

function create_user($username, $password, $email){
    global $connection;
    $sql = "INSERT INTO account ";
    $sql .= "(username, password, email) ";
    $sql .= "VALUES (";
    $sql .= "'" . mysqli_real_escape_string($connection, $username) . "',";
    $sql .= "'" . mysqli_real_escape_string($connection, $password) . "',";
    $sql .= "'" . mysqli_real_escape_string($connection, $email) . "'";
    $sql .= ")";
    $result = mysqli_query($connection, $sql);
    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($connection);
      db_disconnect($connection);
      exit;
    }
    
    
}


function log_in($username, $password){       
   global $connection;
   $sql="SELECT * FROM account WHERE username ='" . $username."'" ;              
   $result = mysqli_query($connection, $sql); //calls the sql query
   $users = mysqli_fetch_assoc($result); //turns the result into a array

    //if username exsistsx
    if($users['username']){

        //if the password matches
        if(password_verify($password, $users['password'])){
            $_SESSION['username'] = $username;
            $_SESSION['admin'] = $users['admin'];
            header("Location: resources.php");
        } else {
            //if password is incorrect
            echo "username or password is incorrect.";
        }
    } else{
        //if usename is not found
        echo "username or password is incorrect.";
    }
}








?>