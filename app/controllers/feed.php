<?php
require_once __DIR__ . '/../core/Controller.php';

class Feed extends Controller

{
    public function index()
    {


        $this->view('feed' );


    }
}