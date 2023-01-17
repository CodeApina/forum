<?php
include "include_master.php";
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