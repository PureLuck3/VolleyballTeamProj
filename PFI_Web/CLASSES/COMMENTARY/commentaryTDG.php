<?php

include_once __DIR__ . "/../../UTILS/connector.php";

class CommentaryTDG extends DBAO{

    private $tableName;

    // Singleton
    private static $instance = null;

    private function __construct(){
        Parent::__construct();
        $this->tableName = "comments";
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

    public function add_commentary($type, $content, $refID){
        try{
            date_default_timezone_set('EST');
            $conn = $this->connect();
            $tablename = $this->tablename;
            $query = "INSERT INTO $tablename(type, date, content, refID) VALUES(:type, " . date("F j, Y, g:i a") . ", :content, :refID)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':type', $type);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':refID', $refID);
            $stmt->execute();
            $resp = true;
        }
        catch(PDOException $e){
            $resp = false;
        }
        $conn = null;
        return $resp;
    }

    public function modify_commentary($id, $content){
        try{
            $conn = $this->connect();
            $tablename = $this->tablename;
            $query = "UPDATE $tablename SET content=:content WHERE id=:id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $resp = true;
        }
        catch(PDOException $e){
            $resp = false;
        }
        $conn = null;
        return $resp;
    }

    public function delete_commentary($id){
        try{
            $conn = $this->connect();
            $tablename = $this->tablename;
            $query = "DELETE FROM $tablename WHERE id=:id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $resp = true;
        }
        catch(PDOException $e){
            $resp = false;
        }
        $conn = null;
        return $resp;
    }

    public function get_commentary($type, $refID){
        try{
            $conn = $this->connect();
            $tablename = $this->tablename;
            $query = "SELECT * FROM $tablename WHERE type=:type AND refID=:refID";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':type', $type);
            $stmt->bindParam(':refID', $refID);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
        }
        catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
        return $result;
    }
}
?>