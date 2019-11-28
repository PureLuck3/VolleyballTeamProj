<?php

//Database Access Object
class DBAO {

    //données nécessaire a la creation d'une connection
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $charset;

    protected function __construct(){
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "webproj";
        $this->charset = "utf8mb4";
    }

    protected function connect() {

        try{
        $dsn = "mysql:host=".$this->servername.";dbname=".$this->dbname.";charset=".$this->charset;
        $pdo = new PDO($dsn , $this->username, $this->password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
        }

        catch(PDOException $e){
            echo "Connection failed: ", $e->getMessage();
        }
    }
}
