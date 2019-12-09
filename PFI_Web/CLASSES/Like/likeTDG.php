<?php 

include_once __DIR__ . "/../../UTILS/connector.php";

class likeTDG extends DBAO{

    private $tableName;
    private static $instance = null;
    private $type;
    private $refID;

    private function __construct(){
        Parent::__construct();
        $this->tableName = "album";
    }

    public static function get_instance(){
        if(is_null(self::$instance)){
            self::$instance = new albumTDG();
        }
    }

    //Création de la table
    public function createTable(){
        try{
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query = "CREATE TABLE IF NOT EXISTS $tableName (
                userID INTEGER(10) NOT NULL,
                type VARCHAR(10) NOT NULL,
                refID INTEGER(10) NOT NULL
            );";
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

    //Drop la Table
    public function dropTable(){
        try{
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query = "DROP TABLE if exists $tableName";
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

    //compte les likes
    public function count_like($refID, $type){
        try{
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query = "SELECT COUNT(*) from " . $tableName . " where refID = :refID and type = :type";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':refID', $refID);
            $stmt->bindParam(':type', $type);
            $stmt->execute();            
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
        }
        catch(PDOException $e){
            echo "Error : " . $e->getMessage();
        }
        $conn = null;
        return $result;
    }

    //remove likes
    public function remove_like($userID, $refID, $type){
        try{
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query = "DELETE from " . $tableName . " where userID = :userID and refID = :refID and type = :type";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':userID', $userID);
            $stmt->bindParam(':refID', $refID);
            $stmt->bindParam(':type', $type);
            $stmt->execute();
        }
        catch(PDOException $e2){
            echo "Error : " . $e2->getMessage();
        }
    }

    //remove all likes
    public function remove_all_likes($refID, $type){
        try{
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query = "DELETE from " . $tableName . " where refID = :refID and type = :type";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':refID', $refID);
            $stmt->bindParam(':type', $type);
            $stmt->execute();
        }
        catch(PDOException $e2){
            echo "Error : " . $e2->getMessage();
        }
    }

    //add likes

    public function add_likes($userID, $refID, $type){
        try{
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query = "INSERT into " . $tableName . "values (:userID, :type, :refID)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':userID', $userID);            
            $stmt->bindParam(':type', $type);
            $stmt->bindParam(':refID', $refID);
            $stmt->execute();
        }
        catch(PDOException $e2){
            echo "Error : " . $e2->getMessage();
        }
    }

}
?>