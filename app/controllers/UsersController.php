<?php
class UsersController
{
    public function index()
    {
        $userModel = $this->model('User');
        $users = $userModel->getAllUsers();
        echo json_encode($users);
    }

    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }
}
