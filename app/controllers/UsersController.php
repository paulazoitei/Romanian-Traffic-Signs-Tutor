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
    // Get the DELETE data (usually passed in the body of the request)
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


    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }
}
