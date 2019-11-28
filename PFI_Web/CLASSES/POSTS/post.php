<?php
    include "postTDG.php";
    include __DIR__ . "/../USER/User.php";

    class Post{

        private $id;
        private $authorID;
        private $author;
        private $threadID;
        private $content;

        /*
        public function __construct($id, $authorID, $threadID, $content){
            $this->id = $id;
            $this->authorID = $authorID;
            $this->threadID = $threadID;
            $this->content = $content;
        }
        */

        //getters
        public function get_id(){
            return $this->id;
        }

        public function get_author(){
            return $this->author;
        }

        public function get_authorID(){
            return $this->authorID;
        }

        public function get_content(){
            return $this->content;
        }

        //setters
        public function set_id($id){
            $this->id = $id;
        }

        public function set_author($author){
            $this->author = $author;
        }

        public function set_authorID($authorID){
            $this->authorID = $authorID;
        }

        public function set_threadID($threadID){
            $this->threadID = $threadID;
        }

        public function set_content($content){
            $this->content = $content;
        }

        //QOL
        public function add_post($authorID, $threadID, $content){
            $TDG = new PostTDG();
            $res = $TDG->add_post($authorID, $author, $threadID, $content);
            $TDG = null;
            return $res;
        }

        public function update(){
            $TDG = new PostTDG();
            $res = $TDG->edit_post($this->content, $this->id);
            $TDG = null;
            return $res;

        }

        public function delete(){
            $TDG = new PostTDG();
            $res = $TDG->delete_post($this->id);
            $TDG = null;
            return $res;
        }

        public function display(){
            $id = $this->id;
            $authorID = $this->authorID;
            $author = $this->author;
            $threadID = $this->threadID;
            $content = $this->content;
            include "HTML/posttemplate.php";
        }

        public function load_post($id){
            $TDG = new PostTDG();
            $res = $TDG->get_by_ID($id);

            $res2 = User::get_username_by_ID($res["authorID"]);

            $TDG = null;
            $this->set_id($res["id"]);
            $this->set_authorID($res["authorID"]);
            $this->set_author($res2);
            $this->set_threadID($res["threadID"]);
            $this->set_content($res["content"]);

            return $res;
        }


        /*
          static function used to create a list of posts
        */
        public static function fetch_posts_by_threadID($threadID){
            $TDG = new PostTDG();
            $res = $TDG->get_posts_by_threadID($threadID);
            $TDG = null;
            return $res;
        }

        public static function create_post_list($threadID){

            $info_array=Post::fetch_posts_by_threadID($threadID);
            $post_list = array();

            foreach($info_array as $ia){

                $res = User::get_username_by_ID($ia["authorID"]);
                $temp_post = new Post();
                $temp_post->set_id($ia["id"]);
                $temp_post->set_authorID($ia["authorID"]);
                $temp_post->set_author($res);
                $temp_post->set_threadID($ia["threadID"]);
                $temp_post->set_content($ia["content"]);
                array_push($post_list, $temp_post);
            }

            return $post_list;
        }

    }

?>
