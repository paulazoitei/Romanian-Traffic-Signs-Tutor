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
    $result = $this->db->query("SELECT id, username, email, phone, points, quiz_successes, quiz_fails, admin 
                                FROM users 
                                ORDER BY points DESC");
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
    public function getUserById($id)
    {
        $stmt = $this->db->prepare("SELECT id, username, email, phone, points, quiz_successes, quiz_fails, admin FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }
   public function updateUser($id, $points, $quizSuccesses, $quizFails)
{
    // Log update attempt
    error_log("Attempting to update user ID: $id with points: $points, quiz_successes: $quizSuccesses, quiz_fails: $quizFails");

    $stmt = $this->db->prepare("UPDATE users SET points = ?, quiz_successes = ?, quiz_fails = ? WHERE id = ?");
    $stmt->bind_param("diii", $points, $quizSuccesses, $quizFails, $id);  // "d" for double (float), "i" for integer

    if ($stmt->execute()) {
        // Log success or failure
        if ($stmt->affected_rows > 0) {
            error_log("Update successful.");
            return true;
        } else {
            error_log("No rows affected.");
            return false;
        }
    } else {
        error_log("Statement execution failed: " . $stmt->error);
        return false;
    }
}


}
