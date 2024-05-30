<?php
require_once __DIR__ . '/../core/Controller.php';

class Contact extends Controller

{
    public function index()
    {


        $this->view('contact' );


    }
}