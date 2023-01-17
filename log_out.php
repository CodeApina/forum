<?php
include "backend/include_master.php";
$_SESSION['logged_in'] = false;
$_SESSION['username'] = null;
setcookie("user_id", "", time() - 3600);
header("Location:log_in.php");