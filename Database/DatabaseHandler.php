<?php

class DatabaseHandler
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
}