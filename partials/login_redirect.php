<?php 
  session_start();
  $email = '';
  if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
  } else{
    header('Location: login.php');
  }
?>