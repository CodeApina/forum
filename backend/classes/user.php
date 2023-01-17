<?php
include "backend/sql.php";
class user extends sql{
    public $username;
    public $user_id;

    function get_profile($id){
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM users WHERE id=?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
    function change_username($new_username, $old_username){
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
        $stmt->bind_param("s", $new_username);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result !== 0)
            return 2;
        $stmt = $conn->prepare("UPDATE users SET username=? WHERE username=?)");
        $stmt->bind_param("ss",$new_username, $old_username);
        if($stmt->execute())
            return 0;
        return 1;
    }
}