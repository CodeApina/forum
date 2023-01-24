<?php
include "backend/classes/sql.php";
class log_in_functions extends sql{

    private $table = "users";

    function init($id, $conn)
    {
        $this->conn = $conn;
    }

    function log_in_handler($email, $password, $remember_me = false){
        $stmt = $this->conn->prepare("SELECT salt, username FROM $this->table WHERE email=?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $rows = $result->fetch_assoc();
        $salt = $rows['salt'];
        $username = $rows['username'];
    
        $hash_password = hash("sha256", $password.$salt, false);
    
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE password=? AND email=?");
        $stmt->bind_param("ss", $hash_password, $email);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows === 1){
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $username;
            if ($remember_me === "on"){
                $stmt = $this->conn->prepare("SELECT id FROM $this->table WHERE password=?");
                $stmt->bind_param("s", $hash_password);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                $uid = $row['id'];
                setcookie("user_id", "$uid", time() + (86400 * 30), "/");
            }
            return 0;
        }
        else{
            return 1;
        }
    }
    function cookie_log_in(){
        if (isset($_COOKIE["user_id"])){
            if ($_COOKIE["user_id"] == "" || $_COOKIE["user_id"] == null){
                return 0;
            }
            else
            {
                $stmt = $this->conn->prepare("SELECT username FROM $this->table WHERE id=?");
                $stmt->bind_param("s", $_COOKIE["user_id"]);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                $username = $row['username'];
                $_SESSION['username'] = $username;
                $_SESSION['logged_in'] = true;
                return 1;
            }
        }
        else {
            return 0;
        }
    }
}