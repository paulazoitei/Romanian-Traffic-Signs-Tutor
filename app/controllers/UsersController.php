<?php
class UsersController
{
    public function index()
    {
        $userModel = $this->model('User');
        $users = $userModel->getAllUsers();
        echo json_encode($users);
    }

    public function delete()
    {
        $deleteData = json_decode(file_get_contents("php://input"), true);

        if (isset($deleteData['username'])) {
            $username = $deleteData['username'];
            $userModel = $this->model('User');
            $result = $userModel->deleteUserByUsername($username);
            
            if ($result) {
                echo json_encode(['message' => 'User deleted successfully']);
            } else {
                http_response_code(400);
                echo json_encode(['message' => 'User not found']);
            }
        } else {
            http_response_code(400);
            echo json_encode(['message' => 'Username is required']);
        }
    }

    public function getUserById($id)
    {
        $userModel = $this->model('User');
        $user = $userModel->getUserById($id);

        if ($user) {
            echo json_encode($user);
        } else {
            http_response_code(404);
            echo json_encode(['message' => 'User not found']);
        }
    }
   public function update($id)
    {
        // Log request
        error_log("Update request received for user ID: $id");

        $updateData = json_decode(file_get_contents("php://input"), true);
        
        // Log received data
        error_log("Received data: " . print_r($updateData, true));

        if (isset($updateData['points']) && isset($updateData['quiz_successes']) && isset($updateData['quiz_fails'])) {
            $points = floatval($updateData['points']);
            $quizSuccesses = intval($updateData['quiz_successes']);
            $quizFails = intval($updateData['quiz_fails']);
            
            $userModel = $this->model('User');
            $result = $userModel->updateUser($id, $points, $quizSuccesses, $quizFails);
            
            if ($result) {
                error_log("User updated successfully.");
                echo json_encode(['message' => 'User updated successfully']);
            } else {
                error_log("Failed to update user.");
                http_response_code(400);
                echo json_encode(['message' => 'Failed to update user']);
            }
        } else {
            error_log("Invalid input.");
            http_response_code(400);
            echo json_encode(['message' => 'Invalid input']);
        }
    }
    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }
}
