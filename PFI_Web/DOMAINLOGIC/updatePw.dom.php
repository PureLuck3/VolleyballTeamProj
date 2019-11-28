<?php
  include "../CLASSES/USER/user.php";
  include "../UTILS/formvalidator.php";
  include __DIR__ . "/../UTILS/sessionhandler.php";
  
  session_start();

  if(!validate_session()){
    header("Location: ../HTML/error.php?ErrorMSG=Not%20logged%20in!");
    die();
  }

  if(!isset($_POST["oldpw"]) || !isset($_POST["newpw"])){
    header("Location: ../HTML/error.php?ErrorMSG=invalid%20password");
    die();
  }

  $oldpw = $_POST["oldpw"];
  $newpw = $_POST["newpw"];
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
