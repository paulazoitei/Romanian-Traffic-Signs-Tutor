<?php
require_once __DIR__ . '/../core/Controller.php';

class Forgot_Password extends Controller

{
    public function index()
    {

        $this->view('forgot_password' );

    }
}