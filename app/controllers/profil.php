<?php
require_once __DIR__ . '/../core/Controller.php';

class Profil extends Controller

{
    public function index()
    {


        $this->view('profil' );


    }
}