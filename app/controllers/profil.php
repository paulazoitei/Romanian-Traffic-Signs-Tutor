<?php
require_once __DIR__ . '/../core/Controller.php';

class Profil extends Controller
{
    public function index()
    {
        // Verificare dacă utilizatorul este autentificat
        if (isset($_SESSION['user_id']) && isset($_SESSION['auth_token']) && isset($_SESSION['username'])) {
            // Utilizatorul este autentificat, deci afișează componenta de vizualizare a profilului
            $this->view('profil');
        } else {
            // Utilizatorul nu este autentificat, deci afișează componenta de autentificare
            $this->view('auth');
        }
    }
}