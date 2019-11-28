<?php
  /*
    fonction qui "set" toutes les variables de session quand un utilisateur
    ce login.
  */
  function login($uID, $uEmail, $uName){
    $_SESSION["userID"] = $uID ;
    $_SESSION["userEmail"] = $uEmail;
    $_SESSION["userName"] = $uName;
    //Session timeout dans 15 minutes
    $_SESSION["timeOut"] = time() + (60 * 15);
    //renew_timeout
    $_SESSION["innitTimeStamp"] = time();
  }

  /*
    fonction qui valide si la Session est encore valide
  */
  function validate_session(){
    // l'usager n'est pas valide si cette variable
    // de session n'est pas definis
    if(!isset($_SESSION["userID"])){
        return false;
    }
    // si le timeout est arrivé, la session n'est plus valide
    // on dois donc detruire la session
    if(time() >= $_SESSION["timeOut"]){
        end_session();
        return false;
    }
    // Si la Session est active depuis plus de 30 mins,
    // on change son PHP_sessionID
    // peux aussi etre substituer par session_regenerate_id();
    if(time() - $_SESSION["innitTimeStamp"] > (60 * 30)){
        $uID = $_SESSION["userID"];
        $uEmail = $_SESSION["userEmail"];
        $uName = $_SESSION["userName"];
        end_session();
        session_start();
        login($uID, $uEmail, $uName);
        return true;
    }
    else {
      $_SESSION["timeOut"] = time() + (60 * 15);
      return true;
    }
  }

  /*
    fonction qui detruit la session (logout dans la langue de shakespear)
  */
  function end_session(){
    $_SESSION = array();
    unset($_COOKIE["PHPSESSID"]);
    session_destroy();
  }

?>
