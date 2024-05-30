<?php


require_once __DIR__ . '/../core/Controller.php';
class Chestionar extends Controller {
    public function index()
    {
        $this->view('chestionar');
    }

}