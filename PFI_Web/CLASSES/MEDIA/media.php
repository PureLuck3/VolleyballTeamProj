<?php

include_once __DIR__ . "/mediaTDG.php";

class Media{

    private $id;
    private $type;
    private $URL;
    private $title;
    private $description;
    private $date;
    private $albumID;
    private $views;

    public function __construct($id, $type, $URL, $title, $description, $date, $albumID, $views)
    {
        $this->id=$id;
        $this->type=$type;
        $this->URL=$URL;
        $this->title=$title;
        $this->description=$description;
        $this->date=$date;
        $this->albumID=$albumID;
        $this->views=$views;
    }

    //getters
    public function get_id(){
        return $this->id;
    }

    public function get_type(){
        return $this->type;
    }

    public function get_URL(){
        return $this->URL;
    }

    public function get_title(){
        return $this->title;
    }

    public function get_description(){
        return $this->description;
    }

    public function get_date(){
        return $this->date;
    }

    public function get_albumID(){
        return $this->albumID;
    }

    public function get_views(){
        return $this->views;
    }

    //setters
    public function set_type($type){
        $this->type = $type;
    }

    public function set_URL($URL){
        $this->URL = $URL;
    }

    public function set_title($title){
        $this->title = $title;
    }

    public function set_description($description){
        $this->description = $description;
    }


    public function display(){
        $id = $this->id;
        $type = $this->type;
        $url = $this->URL;
        $title = $this->title;
        $description = $this->description;
        $date = $this->date;
        $albumID = $this->albumID;
        include __DIR__ . "/../../HTML/mediaTemplate.php";
    }

    public function create_entry($type, $url, $title, $description, $albumID){
        $TDG = MediaTDG::get_instance();
        $res = $TDG->add_media($type, $url, $title,$description, $albumID);
        return $res;
    }

    public function remove_media($id){
        $TDG = MediaTDG::get_instance();
        $res = $TDG-> delete_media($id);
        return $res;
    }

    public static function get_medias(){
        $TDG = MediaTDG::get_instance();
        $res = $TDG->get_all_media();

        $obj_list = self::arr_to_obj($res);

        return $obj_list;
    }

    public static function get_medias_by_albumID($albumID){
        $TDG = MediaTDG::get_instance();
        $res = $TDG-> get_by_albumID($albumID);
        $obj_list = self::arr_to_obj($res);
        return $obj_list;
    }

    public static function arr_to_obj($arr){
        $obj_arr = array();
        foreach($arr as $k){
            $temp_m = new Media($k["id"], $k["type"], $k["URL"], $k["title"], $k["description"], $k["date"], $k["albumID"], $k["views"]);
            array_push($obj_arr, $temp_m);
        }
        return $obj_arr;
    }

    public function add_view(){
        $TDG = MediaTDG::get_instance();
        $res = $TDG->update_views($this->get_id(), $this->get_views());
        return $res;
    }


}
