<?php
require_once __DIR__ . '/../core/Controller.php';

class Help extends Controller

{
    public function index()
    {


        $this->view('help' );


    }
}