<?php
include 'session.php';
include 'sql.php';

function log_in_handler($email, $password, $remember_me){
    global $conn;

    $stmt = $conn->prepare("SELECT salt, username FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    $row = $result->fetch_assoc();
    $salt = $row['salt'];
    $username = $row['username'];

    $hash_password = hash("sha256", $password.$salt, false);

    $stmt = $conn->prepare("SELECT * FROM users WHERE password=?");
    $stmt->bind_param("s", $hash_password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1){
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;
        if ($remember_me === "on"){
            $stmt = $conn->prepare("SELECT uid FROM users WHERE password=?");
            $stmt->bind_param("s", $hash_password);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $uid = $row['uid'];
            setcookie("uid", "$uid", time() + (86400 * 30), "/");
        }
        return 1;
    }
    else
        return 0;
}