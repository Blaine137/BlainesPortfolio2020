<?php
    $image_url = "../images/work.jpg";
    require('../private/initialize.php');
    include('../private/header.php');
?>



<form action="contact.php" method="post">
  <!--  <label for="firstname"> First Name:</label> --> <input type="text" name="firstname" placeholder="Enter First Name"> <br>
  <!--  <label for="lastname"> Last Name:</label> --> <input type="text" name="lastname" placeholder="Enter Last Name"> <br>
  <!-- &nbsp; &nbsp; &nbsp; &nbsp; <label for="email"> Email:</label> --> <input type="text" name="email" placeholder="Enter Email"> <br>
  <!-- <label for="comments">comments:</label> --> &nbsp; <textarea name="comments" id="" cols="25" rows="5" placeholder="Enter Comments"></textarea> <br>
    <button value="Submit" name="submit" class="submitBtn">Submit</button>
</form>

<?php
if(isset($_POST['submit'])){
$fname = $_POST['firstname'];

echo "Hello " . $fname . ", Thank you so much for reaching out to us!\n" .
    "your comment will be reviewed and answered within a few moments." . "\n - FreshCoders";
}
?>



<?php
    include('../private/footer.php');
?>
