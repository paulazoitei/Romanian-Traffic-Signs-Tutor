<?php
require_once __DIR__ . '/../core/Controller.php';

class Statistics extends Controller

{
    public function index()
    {


        $this->view('statistics' );


    }
}