<?php
require_once __DIR__ . '/../core/Controller.php';

class Chestionar extends Controller
{
    public function index()
    {

        if (isset($_SESSION['user_id']) && isset($_SESSION['auth_token']) && isset($_SESSION['username'])) {
         
            $this->view('chestionar');
        } else {
           
            $this->view('auth');
        }
    }
}
?>
