<?php

include_once __DIR__ . "/../utilities/connector.php";

class mediaTDG extends DBAO{

    private $tableName;
    private static $instance = null;

    private function __construct(){
        Parent::__construct();
        $this->tableName = "media";
    }

    public static function get_instance(){
        if(is_null(self::$instance)){
            self::$instance = new mediaTDG();
        }
        return self::$instance;    
    }

    public function add_media($type, $url, $title){
        
        try{
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query = "INSERT INTO $tableName (type, URL, title) VALUES (:type, :URL, :title)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':type', $type);
            $stmt->bindParam(':URL', $url);
            $stmt->bindParam(':title', $title);
            $stmt->execute();
            $resp = true;
        }

        catch(PDOException $e)
        {
            $resp =  false;
        }
        //fermeture de connection PDO
        $conn = null;
        return $resp;
    }

    public function get_all_media(){

        try{
            $conn = $this->connect();
            $query = "SELECT * FROM " . $this->tableName;
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
        }

        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
            return false;
        }
        //fermeture de connection PDO
        $conn = null;
        return $result;
    }

    public function get_by_id($id){

        try{
            $conn = $this->connect();
            $query = "SELECT * FROM ". $this->tableName ." WHERE id=:id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetch();
        }

        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
        //fermeture de connection PDO
        $conn = null;
        return $result;
    }

    public function get_by_url($url){

        try{
            $conn = $this->connect();
            $query = "SELECT * FROM ". $this->tableName ." WHERE URL=:url";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':url', $url);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetch();
        }

        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
        //fermeture de connection PDO
        $conn = null;
        return $result;
    }

}