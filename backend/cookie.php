<?php
include "include_master.php";
if (isset($_COOKIE["user_id"]) && $_COOKIE["user_id"] !== "")
{
    $_SESSION['logged_in'] = true;
    $stmt = $conn->prepare("SELECT username FROM users WHERE id=?");
    $stmt->bind_param("s", $_COOKIE['user_id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $username = $row['username'];
    $_SESSION['username'] = $username;
    $_SESSION['uid'] = $_COOKIE['user_id'];
}
else
    setcookie("user_id", "", 86400, "/");

