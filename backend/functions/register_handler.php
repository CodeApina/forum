<?php

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
        $success = false;
        do {
            $uid = uniqid($prefix = "", $more_entropy = true);
            $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
            $stmt->bind_param("s", $uid);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows == 0){
                    $success = true;
                }
        } while ($success != true);
        $hash_password = hash("sha256", $password.$salt, false);
        $stmt = $conn->prepare("INSERT INTO users (username, salt, password, email, id) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssss", $username, $salt, $hash_password, $email, $uid);
        if ($stmt->execute())
            return 1;
        else
            return 0;
    }
    return 2;
}