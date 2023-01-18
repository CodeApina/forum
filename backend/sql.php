<?php
$db_host = "localhost:3306";
$db_user = "root";
$db_password = "PerkelePaska69";
$db_db = "forum";
$db_port = 3306;
$conn = new mysqli($db_host, $db_user, $db_password, $db_db);
if ($conn->connect_error){
    echo 'Errno: '.$mysqli->connect_errno;
    echo '<br>';
    echo 'Error: '.$mysqli->connect_error;
    exit();
}
