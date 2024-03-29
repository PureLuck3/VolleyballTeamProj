<?php
include_once __DIR__ . "/../MEDIA/media.php";
include_once __DIR__ . "/albumTDG.php";
include_once __DIR__ . "/../USER/user.php";

class Album{

    private $id;
    private $title;
    private $userID;
    private $description;
    private $date;
    private $views;

    public function __construct($id, $title, $userID, $description, $date, $views)
    {
        $this->id = $id;
        $this->title = $title;
        $this->userID = $userID;
        $this->description = $description;
        $this->date = $date;
        $this->views = $views;
    }

    public function display(){
        $id = $this->id;
        $title = $this->title;
        $userID = $this->userID;
        $user = new User();
        $user->load_user_by_id($userID); 
        $description = $this->description;
        $date = $this->date;

        include __DIR__ . "/../../HTML/albumTemplate.php";
    }

    //getter
    public function get_id(){
        return $this->id;
    }

    public function get_title(){
        return $this->title;
    }

    public function get_userID(){
        return $this->userID;
    }

    public function get_description(){
        return $this->description;
    }

    public function get_date(){
        return $this->date;
    }

    public function get_views(){
        return $this->views;
    }

    //setter

    // public function set_id($id){
    //     return $this->id = $id;
    // }
    
    public function set_title($title){
        return $this->title = $title;
    }
    
    public function set_userID($userID){
        return $this->userID = $userID;
    }
    
    public function set_description($description){
        return $this->description = $description;
    }
    
    public function set_views($views){
        return $this->views = $views;
    }
    // public function set_date($date){
    //     return $this->date = $date;
    // }


    public static function create_album($title, $description, $date){
        $TDG = albumTDG::get_instance();
        $res = $TDG->add_album($title, $description, $date);
        return $res;
    }

    public static function get_all_album(){
        $TDG  = albumTDG:: get_instance();
        $res = $TDG->get_all_album();

        $obj_list = self::arr_to_obj($res);
        return $obj_list;
    }

    public static function get_all_album_by_userID($userID){
        $TDG = albumTDG::get_instance();
        $res= $TDG->get_all_album_by_userID($userID);

        $obj_list = self::arr_to_obj($res);
        return $obj_list;
    }

    public static function arr_to_obj($arr){
        $obj_arr = array();
        foreach($arr as $k){
            $temp_m = new Album($k["id"], $k["title"], $k["userID"], $k["description"], $k["date"], $k["views"]);
            array_push($obj_arr, $temp_m);
        }
        return $obj_arr;
    }

    public static function delete_album($id){
        $TDG = albumTDG::get_instance();
        $res = $TDG->delete_albumTDG($id);
        return $res;
    }

    public static function update_album_title($id, $title){
        $TDG = albumTDG::get_instance();
        $res = $TDG->update_album_titleTDG($id, $title);
        return $res;
    }

    public static function update_album_description($id, $description){
        $TDG = albumTDG::get_instance();
        $res = $TDG->update_album_descriptionTDG($id, $description);
        return $res;
    }
    
    public static function search_album($title){
        $TDG = albumTDG::get_instance();
        $res = $TDG->search_album_title($title);
        $album_list = array();
        
        $album_list = self::arr_to_obj($res);
          
        return $album_list;
    }
}

?>
