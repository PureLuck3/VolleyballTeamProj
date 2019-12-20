<?php

include_once __DIR__ . "/../../UTILS/connector.php";

class MediaTDG extends DBAO{

    private $tableName;
    private static $instance = null;

      //Private Constructor
      private function __construct(){
        Parent::__construct();
        $this->tableName = "medias";
    }

    public static function get_instance(){
        if(is_null(self::$instance)){
            self::$instance = new MediaTDG();
        }
        return self::$instance;    
    }

    public function add_media($type, $url, $title,$description,$albumID){
        
        try{
            date_default_timezone_set('EST');
            $date = date("F j, Y, g:i a");
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query = "INSERT INTO $tableName (type, URL, title, description, date, albumID, views) VALUES(:type, :URL, :title, :description, '$date' , :albumID, 0)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':type', $type);
            $stmt->bindParam(':URL', $url);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':albumID', $albumID);
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

    public function delete_media($id){
        try{

            $conn = $this->connect();
            $query = "DELETE FROM" . $this->tableName . "WHERE id=:id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':id', $mediaID);
            $stmt->execute();
            $resp = true;
        }

        catch(PDOException $e)
        {
            $resp = false;
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

    public function get_by_albumID($albumID){

        try{
            $conn = $this->connect();
            $query = "SELECT * FROM ". $this->tableName ." WHERE albumID=:albumID";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':albumID', $albumID);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
        }

        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
        //fermeture de connection PDO
        $conn = null;
        return $result;
    }

    public function update_views($mediaID, $views){
        try{

            $conn = $this->connect();
            $query = "UPDATE" . $this->tableName . "SET views=" . $views + 1 . "WHERE id=:id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':id', $mediaID);
            $stmt->execute();
            $resp = true;
        }

        catch(PDOException $e)
        {
            $resp = false;
        }
        //fermeture de connection PDO
        $conn = null;
        return $resp;
    }
}
