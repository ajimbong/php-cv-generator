<?php
include('conf/conn.php');
$photo = $name = $contact = $email = $address = $github = $linkedin = $objective = $skills = '';
$email = mysqli_real_escape_string($conn, $_SESSION['email']);

if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $contact = $_POST['contact'];
  $re_email = $_POST['email'];
  $address = $_POST['address'];
  $github = $_POST['github'];
  $linkedin = $_POST['linkedin'];
  $objective = $_POST['objective'];
  $skills = $_POST['skills'];

  if(isset($_FILES['photo'])){
    $photo = $_FILES['photo'];
    $initPhotoName = $_FILES['photo']['name'];
    $photoTmpName = $_FILES['photo']['tmp_name'];
    $photoType = $_FILES['photo']['type'];
    $photoError = $_FILES['photo']['error'];
    $photoExt = explode('.', $initPhotoName);
    $photoActualExt = strtolower(end($photoExt));

    $allowed = array('jpg', 'jpeg', 'png');
    if(in_array($photoActualExt, $allowed)){
      if($photoError === 0){
        $photoName = $_SESSION['email'];
        $photoDestination = "uploads/$photoName.$photoActualExt";
        move_uploaded_file($photoTmpName, $photoDestination);
        echo 'The upload was successful';

        // Check if the user already has
        if(!$userExists) {
          $sql = "INSERT INTO cv_details(user_email,photo,name,contact,email,address,github,linkedin,objective,skills) VALUES ('$email','$photoDestination', '$name', '$contact', '$re_email', '$address', '$github', '$linkedin', '$objective', '$skills');";

          mysqli_query($conn, $sql);
        } else{
          $sql = "UPDATE cv_details SET photo = '$photoDestination', name = '$name', contact = '$contact', email = '$re_email', address = '$address', github = '$github', linkedin = '$linkedin', objective = '$objective', skills = '$skills' WHERE user_email = '$email';";

          mysqli_query($conn, $sql);
        }
        //write some sql to update mysql if the user had already created a cv
        //navigate the user to the CV page when they submit
        mysqli_free_result($result);
		    mysqli_close($conn);
        header('Location: cv.php');

      } else {
        echo "There was an error uploading this file";
      }
    } else {
      echo "This file extension is not supported";
    }
  } else{
    echo "You need to provide an image";
  }
}