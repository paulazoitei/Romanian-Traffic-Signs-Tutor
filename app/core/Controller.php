<?php
session_start();
class Controller
{
  public function model($model)
  {
      require_once  '../app/models/' . $model . '.php';
      return new $model();
  }
  public function view($view,$data=[])
  {
          require_once '../Html_Components/' . $view . '.php';

  }
}