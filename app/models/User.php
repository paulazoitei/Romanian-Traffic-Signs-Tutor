<?php


class User
{
    private $db;

    public function __construct()
    {
     
        $this->db = require __DIR__ . "/../database/database.php";
    }

    public function getAllUsers()
    {
        $result = $this->db->query("SELECT id, username, email, phone, points, quiz_successes, quiz_fails, admin FROM users");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
