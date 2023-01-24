<?php
if (isset($_SESSION["cookies_allowed"]) && $_SESSION["cookies_allowed"] == true){
    if (isset($_COOKIE["user_id"]) && $_COOKIE["user_id"] !== "" && $_COOKIE["user_id"] !== null)
    {
        // TODO: https://stackoverflow.com/questions/1354999/keep-me-logged-in-the-best-approach
        $_SESSION['logged_in'] = true;
        $stmt = $conn->prepare("SELECT username FROM users WHERE id=?");
        $stmt->bind_param("s", $_COOKIE['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $username = $row['username'];
        $_SESSION['username'] = $username;
        $_SESSION['uid'] = $_COOKIE['user_id'];
        $id = $_COOKIE['user_id'];
        setcookie("user_id", "$id", 86400, "/");
    }
    else
        setcookie("user_id", "", 86400, "/");
}
include "backend/classes/log_in_functions.php";
$log_in = new log_in_functions;
$log_in->cookie_log_in();

