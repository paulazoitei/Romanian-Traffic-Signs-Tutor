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

    public function deleteUserByUsername($username)
    {
        $stmt = $this->db->prepare("DELETE FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        
        if ($stmt->execute()) {
            return $stmt->affected_rows > 0;
        } else {
            return false;
        }
    }
}
