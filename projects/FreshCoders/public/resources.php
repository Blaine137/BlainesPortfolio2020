<?php
    require_once('../private/initialize.php');

    //redirects to the login page if not logged in
    if(!isset($_SESSION['username'])){
      $url = "login.php";
      header("Location: " . $url);
    }


    $image_url = "../images/resources.jpg";
    include('../private/header.php');
?>

<?php echo "<h2>Upload Files</h2>"; ?>

<form action="resources.php" method="post" enctype="multipart/form-data">
    <input type="file" name="file" class="uploadwork">
    <button type="submit" name="submit" class="submitBtn">Upload</button>
    <br>
</form>

<div class="uploads">
    <?php
// if the user submits, upload the file
if(isset($_POST['submit'])){
    $file = $_FILES['file'];

    $fileJustName = $_FILES['file'];
    $fileName = $_FILES['file']['name']; //file name
    $fileTmpName = $_FILES['file']['tmp_name']; //location of the temp file
    $fileSize = $_FILES['file']['size']; //file size
    $fileError = $_FILES['file']['error']; //errors?
    $fileType = $_FILES['file']['type']; //file type
    $fileExt = explode('.', $fileName); //file extention
    $fileActualExt = strtolower(end($fileExt)); //extention in lower case

    $allowed = array('html', 'php', 'css', 'png', 'jpg', 'jpeg');

    //if the file extention is in the allowed array then execute the code
    if(in_array($fileActualExt, $allowed)){
        //if there are no errors check the file size
        if($fileError === 0){
            //if the file size is less that 1m kb continue to upload
            if($fileSize < 5000000){
                $fileNameNew = uniqid('', true) . $fileName; //gives the file name a randomnized number at end of the name
                $fileDestination = '../uploads/' . $fileNameNew; // where to upload the file
                move_uploaded_file($fileTmpName, $fileDestination); // uploads the file to the destination
                echo "you uploaded your file successfully!";
            } else {
                echo "Your file is too big."; //else if file is larger
            }
        } else {
            echo "there was a error uploading your file."; //else if there was a error
        }
    } else {
        echo "You cannot upload files of that type."; //else if type of file is not allowed
    }
} //end of if user hits the submit button

?>
</div>

<div class="downloads">
    <?php
echo "<h2>Download Files</h2>";
$dir = "../uploads/";
$uploadedFiles = scandir($dir);
$viewFiles = array_diff($uploadedFiles, array('.', '..'));

foreach($viewFiles as $viewFile){

    echo $viewFile;
?> <a class="downloads" href="../uploads/<?php $viewFile ?>" download="</php $viewFile ?>">Download</a> <br> <br>

    <?php
}
?>
</div>





<?php
    include('../private/footer.php');
?>
