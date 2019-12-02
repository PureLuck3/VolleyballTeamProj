<?php
include_once __DIR__ . "/commentaryTDG.php";

class Commentary{

    private $id;
    private $type;
    private $date;
    private $content;
    private $idRef

    public function __construct(){}

    // Getters
    public function get_id(){
        return $this->id;
    }
    public function get_type(){
        return $this->type;
    }
    public function get_date(){
        return $this->date;
    }
    public function get_content(){
        return $this->content;
    }
    public function get_idRef(){
        return $this->idRef;
    }

    // Setters
    public function set_type($type){
        $this->type = $type
    }
    public function set_date($date){
        $this->date = $date;
    }
    public function set_content($content){
        $this->content = $content;
    }
    public function set_idRef($idRef){
        $this->idRef = $idRef;
    }

    // Methodes
    public function comment($type, $content, $idRef){
        if (is_null($content))
            return false;
        
        $TDG = CommentaryTDG::get_instance();
        $TDG->add_commentary($type, $content, $idRef);
        $TDG = null;
        return true;
    }
}
?>