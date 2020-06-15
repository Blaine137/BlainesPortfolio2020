<?php
    $image_url = "../images/logintest.jpg";
    require('../private/initialize.php');
    include('../private/header.php');
?>

<h2>Login To See The Resources Page!</h2> <br>

<h4>*Enter Username And Password To Login*</h4>

<div class="loginform">
    <form action="login.php" method="post">
      <!--  <label for="username">username:</label> --> <input type="text" placeholder="enter username" name="username">
        <br>
      <!--  <label for="password">password:</label> --><input type="text" placeholder="enter password" name="password">
        <br>
      <!--   &nbsp; &nbsp; &nbsp; <label for="email">email:</label> --><input type="text" placeholder="enter email to register" name="email" class="email">
        <br>
        <input type="submit" name="login" value="Login" class="loginbtn"> <input type="submit" name="register" value="Register" class="registerbtn">
    </form>
</div>
<div class="login">
   <?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST['username'] ?? "";
        $password = $_POST['password'] ?? "";
        $email = $_POST['email'] ?? "";
        if(isset($_POST['register'])){
            if(empty($username)){
                echo "please enter a username";
            } else if(empty($password)){
                echo "please enter a password";
            } else if(empty($email)){
                echo "please enter a email";
            } else if(strlen($username) > 20){
                echo "username must be no more than 20 characters";
            } else if(strlen($password) > 150){
                echo "password must be no more than 50 characters";
            } else if(strlen($email) > 75){
                echo "email must be no more than 75 characters";
            } else {
                $hashed_password = password_hash($_POST['password'], PASSWORD_BCRYPT); //encrypts password
                create_user($username, $hashed_password, $email);
            }
        } else if(isset($_POST['login'])){

            log_in($username, $password);

        }


    }


?>
</div>
<div class="logout">

    <?php
        if(isset($_SESSION['username'])){
    ?>
    <form action="login.php" method="post">
        <input class="logoutbutton" type="submit" name="logout" value="logout">
    </form>
    <?php
            if(isset($_POST['logout'])){
                unset($_SESSION['username']); //destroys  username session
                unset($_SESSION['admin']); //destroys admin session
                echo "logged out";
            }
        }
    ?>

</div>


<?php
    // log_in($username, $password);
    include('../private/footer.php');
?>










<?php

    /*check login: check_password(username, password) { $LoggedIn = true; };
    if($LoggedIn){ display the page }

    superGlobals:
    $_GLOBALS[''] global scope
    $_SERVER['']
    $_GET['']
    $_POST['']
    $_FILES['']
    $_PUT['']
    $_COOKIE['']
    $_SESSION['']

    errors:
    display_errors
    log_errors = path to / error message

    validating input:
    function allow_get_params($allowed_params = []){

        $allowed_array = [];
            foreach($allowed_params as $params){
                if(isset($_GET[$param])){
                    $allowed_array[$param] = $_[$param];
                } else {

                    $allowed_array[$param] = null;

                }
            }

    return $allowed_array;
    }

    $get_params = allowed_get_params(['$username', '$password']);
    var_dump($get_params);

    */
?>
