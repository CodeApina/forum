<?php
class post extends sql{
    public $user;
    public $post_id;
    public $title;
    public $text;
    public $creation_time;

    protected $table = "posts";
    function init($conn)
    {
        $this->conn = $conn;
    }

    function get_post($id){
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM $this->table WHERE id=?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
    function get_all_posts(){
        $stmt = $this->conn->prepare("SELECT * FROM $this->table");
        $stmt->execute();
        $results = $stmt->get_result();
        return $results;
    }
}