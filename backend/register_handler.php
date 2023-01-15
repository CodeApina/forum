<?php
include 'sql.php';

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function register_handler($email, $username, $password){
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? OR username = ?");
    $stmt->bind_param("ss", $email, $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = $result->num_rows;
    if ($rows == 0){
        $salt = generateRandomString();
        $uid = uniqid($prefix = "", $more_entropy = true);
        $hash_password = hash("sha256", $password.$salt, false);
        $stmt = $conn->prepare("INSERT INTO users (username, salt, password, email, id) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssss", $username, $salt, $hash_password, $email, $uid);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result == false){
            return 0;
        }
        return 1;
    }
    return 2;
}