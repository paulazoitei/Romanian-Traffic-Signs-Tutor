<?php
require_once __DIR__ . '/../core/Controller.php';

class Success extends Controller

{
    public function index()
    {


        $this->view('success' );


    }
}