<?php
require_once __DIR__ . '/../core/Controller.php';

class Fail extends Controller

{
    public function index()
    {


        $this->view('fail' );


    }
}