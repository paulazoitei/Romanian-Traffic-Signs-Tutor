<?php


class Question
{
    private $db;

    public function __construct()
    {
     
        $this->db  = require __DIR__ . "/../database/database.php";
    }

    public function getAllQuestions()
    {
        $result = $this->db->query("SELECT id, text, variant_1, variant_2, variant_3, correct_1, correct_2, correct_3, image_url FROM questions");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function addQuestion($text, $variant_1, $variant_2, $variant_3, $correct_1, $correct_2, $correct_3, $image_url)
    {
        $stmt = $this->db->prepare("INSERT INTO questions (text, variant_1, variant_2, variant_3, correct_1, correct_2, correct_3, image_url) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssiiis", $text, $variant_1, $variant_2, $variant_3, $correct_1, $correct_2, $correct_3, $image_url);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
