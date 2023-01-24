<?php
class sql{
    protected $conn;
    protected $table;
    protected $id;

    function __construct()
    {
        $this->conn = new mysqli("localhost:3306","root","PerkelePaska69","forum");

        $this->init();
    }
}