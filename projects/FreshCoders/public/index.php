<?php 
    $image_url = "../images/phpcode.jpg";
    require_once('../private/initialize.php');
    include('../private/header.php');
?>
<div class="introductions">
    <p>create an account to view the resources!</p>
</div>

<div class="IP">
    <?php 
            echo "<h2>User's IP Address</h2>";
            $IP = $_SERVER['REMOTE_ADDR'];
            echo $IP;
        ?>
</div>


<div class="UserBrowser">
   <?php 
    echo "<h2>User's Browser</h2>";
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    if(strpos($user_agent, 'MSIE')){
        $browser = 'Internet explorer';}
    elseif(strpos($user_agent, 'Trident')){
        $browser = 'Internet explorer';}
    elseif(strpos($user_agent, 'Firefox')){
        $browser = 'Mozilla Firefox';}
    elseif(strpos($user_agent, 'Chrome')){
        $browser = 'Google Chrome';}
    elseif(strpos($user_agent, 'Opera Mini')){
        $browser = "Opera Mini";}
    elseif(strpos($user_agent, 'Opera')){
        $browser = "Opera";}
    elseif(strpos($user_agent, 'Safari')){
        $browser = "Safari";}
    else{
        $browser = 'unknown';
    }
    
    echo $browser;
  ?>
</div>

<div class="blackFriday">
  <?php
    echo "<h2>Time Till Black Friday</h2>";
    $currentDay = new DateTime('now', new DateTimeZone('America/New_York')); //gets the date of today
    $bfDate = new DateTime('2019-11-29', new DateTimeZone('America/New_York')); //gets the date of black friday
    $daysTill = $currentDay->diff($bfDate); // shows how many days are left till black friday
    echo $daysTill->format('%m months and %d days'); //foramts the date
  ?>
</div>







<?php
    include('../private/footer.php');
?>
