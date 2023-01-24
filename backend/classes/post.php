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
        $stmt = $conn->prepare("SELECT * FROM $this->table");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
    function get_all_posts(){
        $stmt = $this->conn->prepare("SELECT * FROM $this->table");
        $stmt->execute();
        $results = $stmt->get_result();
        while ($row = $results->fetch_assoc()){
            $this->user = $row['user'];
            $this->post_id = $row['id'];
            $this->text = $row['text'];
            $this->title = $row['content'];
            $this->creation_time = $row['timestamp'];
            $this->user = $row['user'];
        }
        return $results;
    }
}