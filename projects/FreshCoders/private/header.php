<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FreshCoders</title>
    <link rel="stylesheet" href="https://blaineyoung.tech/projects/FreshCoders/public/style.css">
  <!--  <link rel="stylesheet" href="../public/style.css"> -->
    <style>
        .headerImage{
            background-image: linear-gradient( var(--rgba1), var(--rgba1)), url(<?php echo $image_url; ?>);
            /*height: 85vh;*/
        }
    </style>
</head>

<body>
    <nav>
      <ul>
        <li>
          <a href="https://blaineyoung.tech/projects/FreshCoders/public/index.php">Home</a>
        </li>
      <!--  <li>
          <a href="http://2352blaineyoung.000webhostapp.com/public/about.php">About</a>
        </li> -->
        <li>
          <a href="https://blaineyoung.tech/projects/FreshCoders/public/resources.php">Resources</a>
        </li>
        <li>
          <a href="https://blaineyoung.tech/projects/FreshCoders/public/contact.php">Contact</a>
        </li>
        <li>
          <a href="https://blaineyoung.tech/projects/FreshCoders/public/login.php">Login</a>
        </li>
        <li>
          <a href="http://blaineyoung.tech/">Portfolio</a>
      </ul>
	     <!-- <a href="../public/index.php">Home</a>
        <a href="../public/about.php">About</a>
        <a href="../public/resources.php">Resources</a>
        <a href="../public/contact.php">Contact</a>
        <a href="../public/login.php">Login</a> links for localhost -->
      <!--  <?php  if(isset($_SESSION['admin'])){ ?>
          <li>
            <a href="http://2352blaineyoung.000webhostapp.com/public/admin.php">Download</a>
          </li>
        <?php }  ?> -->
    </nav>
    <div class="headerImage">
    <!-- empty div for the image -->
      <div class="headerText">
        <h1>FreshCoders</h1>
      </div>
    </div>
    <main>
