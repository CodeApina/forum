<?php

function log_in_handler($email, $password, $remember_me = false){
    global $conn;

    $stmt = $conn->prepare("SELECT salt, username FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = $result->fetch_assoc();
    $salt = $rows['salt'];
    $username = $rows['username'];

    $hash_password = hash("sha256", $password.$salt, false);

    $stmt = $conn->prepare("SELECT * FROM users WHERE password=? AND email=?");
    $stmt->bind_param("ss", $hash_password, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1){
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;
        if ($remember_me === "on"){
            $stmt = $conn->prepare("SELECT id FROM users WHERE password=?");
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