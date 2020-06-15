<?php 
    

    //authentication functions
function error_404() {
  header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
  exit();
}

function error_500() {
  header($_SERVER["SERVER_PROTOCOL"] . " 500 Internal Server Error");
  exit();
}



function require_login() {
    if(!is_logged_in()) {
      redirect_to(url_for('/public/login.php'));
    } else {
      // Do nothing, let the rest of the page proceed
    }
  }



//validation




?>
