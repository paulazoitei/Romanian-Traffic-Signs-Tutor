<?php
require_once __DIR__ . '/../core/Controller.php';

class About extends Controller

{
    public function index()
    {


        $this->view('about' );


    }
}