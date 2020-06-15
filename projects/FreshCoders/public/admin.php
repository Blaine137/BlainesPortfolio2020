<?php
    $image_url = "../images/work.jpg";
    require('../private/initialize.php');
    include('../private/header.php');

    if(!$_SESSION['admin']){
            //if admin is false redirect to the login page
            $url = "login.php";
            header("Location: " . $url); 
    }
?>
<p>Download FreshCoder's desktop application below for a better UI, better editor, faster comments and prettier design. </p>
<a class="download" href="#"><img class="download" src="../images/download.png" alt="download"></a>





<?php 
include('../private/footer.php');
?>