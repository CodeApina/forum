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
            $alldata[] = $row;
            //$alldata[] = array(
            //        "title" => $row["title"],
            //        "content" => $row["content"],
            //        "user" => $row["user"],
            //        "likes" => $row["likes"]
            //    );
        }
        return $alldata;
    }
    function post_handler($title, $text){
        global $conn;
        $username = $_SESSION['username'];
        $success = false;
        do {
            $id = uniqid($prefix = "", $more_entropy = true);
            $stmt = $conn->prepare("SELECT * FROM posts WHERE id = ?");
            $stmt->bind_param("s", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows == 0){
                    $success = true;
                }
        } while ($success != true);
        $stmt = $conn->prepare("INSERT INTO posts (id, title, content, user) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss",$id, $title, $text, $username);
        if ($stmt->execute());
            return 1;
        return 0;
    }
}