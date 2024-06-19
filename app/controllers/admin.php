<?php
require_once __DIR__ . '/../core/Controller.php';

class Admin extends Controller

{
    public function index()
    {

        
        $this->view('admin' );


    }
}