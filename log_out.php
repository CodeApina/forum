<?php
include "backend/session.php";
$_SESSION['logged_in'] = false;
$_SESSION['username'] = null;
setcookie("user", "", time() - 3600);
header("Location:login.php");