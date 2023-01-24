<?php
include_once 'session.php';
spl_autoload_register(function($class){
    include "backend/classes/". $class . ".php";
});
include 'bootstrap.php';
include 'error.php';
include 'cookie.php';