<?php 

include_once __DIR__ . "/../../UTILS/connector.php";

class albumTDG extends DBAO{

    private $tableName;
    private static $instance = null;

    private function __construct(){
        Parent::__construct();
        $this->tableName = "albums";
    }

    public static function get_instance(){
        if(is_null(self::$instance)){
            self::$instance = new albumTDG();
        }
        return self::$instance;
    }

//Création de la table
    public function createTable(){
        try{
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query = "CREATE table if not exists $tableName(  id INTEGER(10) AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(50) NOT NULL,
            userID INTEGER(10) NOT NULL,
            description varchar(250),
            date DATE NOT NULL
        )";
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

//Ajoute un album a la BD
    public function add_album($title, $userID, $description){
        
        try{
            date_default_timezone_set('EST');
            $date = date("F j, Y, g:i a");
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query = "INSERT INTO $tableName (title, userID, description, date, views) VALUES(:title, :userID, :description,  '$date', 0)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':userID', $userID);
            $stmt->bindParam(':description', $description);
            $stmt->execute();
            $resp = true;
        }
        catch(PDOException $e1)
        {
            $resp =  false;
        }
        //fermeture de connection PDO
        $conn = null;
        return $resp;
    }

    //Sort tout les albums
    public function get_all_album(){

        try{
            $conn = $this->connect();
            $query = "SELECT * FROM " . $this->tableName;
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
        }

        catch(PDOException $e2)
        {
            echo "Error: " . $e2->getMessage();
            return false;
        }
        //fermeture de connection PDO
        $conn = null;
        return $result;
    }

    //Sort tout les albums selon un ID
    public function get_album_by_id($id){

        try{
            $conn = $this->connect();
            $query = "SELECT * FROM ". $this->tableName ." WHERE id=:id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetch();
        }

        catch(PDOException $e3)
        {
            echo "Error: " . $e3->getMessage();
        }
        //fermeture de connection PDO
        $conn = null;
        return $result;
    }

    //Sort un album selon le titre de l'album
    public function get_album_by_title($title){

        try{
            $conn = $this->connect();
            $query = "SELECT * FROM ". $this->tableName ." WHERE title=:title";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':title', $title);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetch();
        }

        catch(PDOException $e4)
        {
            echo "Error: " . $e4->getMessage();
        }
        //fermeture de connection PDO
        $conn = null;
        return $result;
    }

    //Sort un album selon le l'ID d'un usager
    public function get_album_by_userID($userID){
        try{
            $conn = $this->connect();
            $query = "SELECT * FROM " . $this->tableName . " where userID = :userID";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':userID', $userID);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetch();
        }
        catch(PDOException $e5){
            echo "Error : " . $e5->getMessage();
        }

        $conn = null;
        return $result;
    }

    public function get_all_album_by_userID($userID){

        try{
            $conn = $this->connect();
            $query = "SELECT * FROM ". $this->tableName ." WHERE userID=:userID";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':userID', $userID);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
        }

        catch(PDOException $e3)
        {
            echo "Error: " . $e3->getMessage();
        }
        //fermeture de connection PDO
        $conn = null;
        return $result;
    }

    //Supprime un album selon l'ID
    public function delete_albumTDG($id) {
        try{
            $conn = $this->connect();
            $query = "DELETE from " . $this->tableName . " where id = :id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        }
        catch(PDOException $e6){
            echo "Error : " . $e6->getMessage();
        }
    }

    //mets à jour le titre d'un album selon son ID
    public function update_album_titleTDG($id, $title){
        try{
            $conn = $this->connect();
            $query = "UPDATE " . $this->tableName . " SET title = :title where id=:id";
            $stmt = $conn->prepare($query);            
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':title', $title);
            $stmt->execute();
        }
        catch(PDOException $e7){
            echo "Error : " . $e7->getMessage();
        }
    }

    //mets à jour la description d'un album selon son ID
    public function update_album_descriptionTDG($id, $description){
        try{
            $conn = $this->connect();
            $query = "UPDATE " . $this->tableName . " SET description = :description where id=:id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':description', $description);
            $stmt->execute();
        }
        catch(PDOException $e7){
            echo "Error : " . $e7->getMessage();
        }
    }
}
?>
