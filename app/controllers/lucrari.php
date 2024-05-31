<?php
require_once __DIR__ . '/../core/Controller.php';

class Lucrari extends Controller

{
    public function index()
    {


        $this->view('lucrari' );


    }
}