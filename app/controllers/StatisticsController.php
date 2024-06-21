<?php

class StatisticsController
{
    private $mysqli;

    public function __construct()
    {
        $this->mysqli = require __DIR__ . '/../database/database.php';
    }

    public function getStatistics()
    {
        header('Content-Type: application/json');

        $totalUsers = $this->getTotalUsers();
        $totalAdmins = $this->getTotalAdmins();
        $totalPoints = $this->getTotalPoints();
        $quizSuccessRate = $this->getQuizSuccessRate();
        $numberOfQuestions=$this->getNumberOfQuestions();
        $numberMaxRank=$this->getNumberOfMaxRank();

        echo json_encode([
            "totalUsers" => $totalUsers,
            "totalAdmins" => $totalAdmins,
            "totalPoints" => $totalPoints,
            "quizSuccessRate" => $quizSuccessRate,
            "numberOfQuestions" => $numberOfQuestions,
            "numberMaxRank" => $numberMaxRank
        ]);
    }

    private function getTotalUsers()
    {
        $sql = "SELECT COUNT(*) as count FROM users";
        $result = $this->mysqli->query($sql);
        $row = $result->fetch_assoc();
        return $row['count'];
    }

    private function getTotalAdmins()
    {
        $sql = "SELECT COUNT(*) as count FROM users WHERE admin = 1";
        $result = $this->mysqli->query($sql);
        $row = $result->fetch_assoc();
        return $row['count'];
    }

    private function getTotalPoints()
    {
        $sql = "SELECT AVG(points) as total FROM users";
        $result = $this->mysqli->query($sql);
        $row = $result->fetch_assoc();
        return round($row['total'], 2);
    }
    private function getQuizSuccessRate()
    {
        $sql = "SELECT SUM(quiz_successes) as successes, SUM(quiz_fails) as fails FROM users";
        $result = $this->mysqli->query($sql);
        $row = $result->fetch_assoc();
        $successes = $row['successes'];
        $fails = $row['fails'];

        if ($successes + $fails === 0) {
            return 0;
        }

        return round(($successes / ($successes + $fails)) * 100, 2);
    }
    private function getNumberOfQuestions()
    {
        $sql="SELECT COUNT(*) as count from questions";
        $result = $this->mysqli->query($sql);
        $row = $result->fetch_assoc();
        return $row['count'];

    }
    private function getNumberOfMaxRank()
    {

       $sql="SELECT COUNT(*) as count from users where points>=3000 ";
       $result = $this->mysqli->query($sql);
       $row = $result->fetch_assoc();
       return $row['count'];

        }



}