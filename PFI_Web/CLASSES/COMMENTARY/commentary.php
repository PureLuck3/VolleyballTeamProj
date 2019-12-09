<?php
include_once __DIR__ . "/commentaryTDG.php";

class Commentary{

    private $id;
    private $type;
    private $date;
    private $content;
    private $refID

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
    public function get_refID(){
        return $this->refID;
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
    public function set_refID($refID){
        $this->refID = $refID;
    }

    // Methodes
    public function add_comment($type, $content, $refID){
        if (is_null($content))
            return false;
        
        $TDG = CommentaryTDG::get_instance();
        $res = $TDG->add_commentary($type, $content, $refID);
        $TDG = null;
        return $res;
    }

    public function modify_comment($id, $content){
        $TDG = CommentaryTDG::get_instance();
        $res = $TDG->modify_commentary($id, $content);
        $TDG = null;
        return $res;
    }

    public function delete_comment($id, $type, $refID){
        $TDG = CommentaryTDG::get_instance();
        $res = $TDG->delete_commentary($id, $type, $refID);
        $TDG = null;
        return $res;
    }

    public function delete_all_comments($type, $refID){
        $TDG = CommentaryTDG::get_instance();
        $res = $TDG->delete_all_commentary($type, $refID);
        $TDG = null;
        return $res;
    }

    public function get_comments($type, $refID){
        $TDG = CommentaryTDG::get_instance();
        $res = $TDG->get_commentary($type, $refID);
        $TDG = null;
        return $res;
    }

    // Appel de méthodes like / dislike de likeTDG;
}
?>