<?php


/**
 * The default home controller ,called when no controlloer/mehtod has been passed
 * to the application.
 *
 * **/
require_once __DIR__ . '/../core/Controller.php';

class Home extends Controller
{
  public function index()
  {
     $this->view('home' );

  }


}

