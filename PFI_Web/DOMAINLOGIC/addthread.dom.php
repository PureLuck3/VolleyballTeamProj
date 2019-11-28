<?php
    include "../CLASSES/THREAD/thread.php";
    include __DIR__ . "/../UTILS/sessionhandler.php";

    session_start();

    if(!validate_session()){
      header("Location: ../HTML/error.php?ErrorMSG=Not%20logged%20in!");
      die();
    }

    $title = $_POST["threadcreation"];

    if(empty("$title")){
      header("Location: ../HTML/error.php?ErrorMSG=bad%20request!");
      die();
    }

    $thread = new thread();
    if(!$thread->add_thread($title)){
      header("Location: ../HTML/error.php?ErrorMSG=Bad%20request!");
      die();
    }

    $thread->load_thread_by_title($title);
    $threadID = $thread->get_id();
    header("Location: ../HTML/displaythread.php?threadID=$threadID&threadTitle=$title");
    die();

?>
