<?php

include_once __DIR__ . "/albumTDG.php";

class Album{

    private $id;
    private $title;
    private $userID;
    private $description;
    private $date;

    public function __construct($id, $title, $userID, $description, $date)
    {
        // $this->id = $id;
        // $this->title = $title;
        // $this->userID = $userID;
        // $this->description = $description;
        // $this->date = $date;
    }

    public function display(){
        $id = $this->id;
        $title = $this->title;
        $userID = $this->userID;
        $description = $this->description;
        $date = $this->date;

        include __DIR__ . "";
    }

    public static function create_album($title, $description, $date){
        $TDG = albumTDG::get_instance();
        $res = $TDG->add_media($title, $description, $date);
        return $res;
    }

    public static function get_all_album(){
        $TDG  = albumTDG:: get_instance();
        $res = $TDG->get_all_album();

        $obj_list = self::arr_to_obj($res);
        return $obj_list;
    }

    public static function arr_to_obj($arr){
        $obj_arr = array();
        foreach($arr as $k){
            $temp_m = new Album($k["id"], $k["title"], $k["userID"], $k["description"], $k["date"]);
            array_push($obj_arr, $temp_m);
        }
        return $obj_arr;
    }

}

?>