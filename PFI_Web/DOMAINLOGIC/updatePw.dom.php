<?php
  include "../CLASSES/USER/user.php";
  include "../UTILS/formvalidator.php";
  include __DIR__ . "/../UTILS/sessionhandler.php";
  
  session_start();

  if(!validate_session()){
    header("Location: ../HTML/error.php?ErrorMSG=Not%20logged%20in!");
    die();
  }

  if(!isset($_POST["oldPw"]) || !isset($_POST["pwd"])){
    header("Location: ../HTML/error.php?ErrorMSG=password%20not%20entered");
    die();
  }

  $oldpw = $_POST["oldPw"];
  $newpw = $_POST["pwd"];
  $pwval = $_POST["pwValidation"];


  if(!Validator::validate_password($newpw)){
    header("Location: ../HTML/error.php?ErrorMSG=invalid%20password");
    die();
  }

  $user = new User();
  if(!$user->update_user_pw($_SESSION["userEmail"], $oldpw, $newpw, $pwval)){
    header("Location: ../HTML/error.php?ErrorMSG=Bad%20request");
    die();
  }

  header("Location: ../HTML/billboardview.php");
  die();

 ?>
