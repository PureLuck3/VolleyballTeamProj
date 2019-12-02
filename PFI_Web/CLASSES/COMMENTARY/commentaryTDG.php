<?php

include_once __DIR__ . "/../../UTILS/connector.php";

class CommentaryTDG extends DBAO{

    private $tableName;

    // Singleton
    private static $instance = null;

    private function __construct(){
        Parent::__construct();
        $this->tableName = "commentary";
    }
    public static function get_instance(){
        if (is_null(self::$instance)){
            self::$instance = new CommentaryTDG();
        }
        return self::$instance;
    }

    // Create Table
    public function createTable(){
        try{
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query = "CREATE TABLE IF NOT EXISTS $tableName (id INTEGER(10) AUTO INCREMENT PRIMARY KEY,
            type VARCHAR(10) NOT NULL,
            date DATE NOT NULL,
            content VARCHAR(250) NOT NULL,
            idRef INTEGER(10) NOT NULL)";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $resp = true;
        }
        catch(PDOException $e){
            $resp = false;
        }
        $conn = null;
        return $resp;
    }

    // Drop Table
    public function dropTable(){
        try{
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query = "DROP TABLE $tableName";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $resp = true;
        }
        catch(PDOException $e){
            $resp = false;
        }
        $conn = null;
        return $resp;
    }
}
?>


<!-- Get time in correct time zone -->
<!-- 
    date_default_timezone_set('EST');
    echo date("F j, Y, g:i a");
-->