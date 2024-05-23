<?php
require_once __DIR__ . '/../core/Controller.php';

class Auth extends Controller

{
    public function index()
    {
        $this->view('auth' );
    }

    public function register()
    {
        if(empty($_POST["username"]))
        {
            die("Name is required!");
        }
        if( ! filter_var($_POST["email"],FILTER_VALIDATE_EMAIL))
        {
            die("Valid email is required");
        }

        $isPasswordComplex = function($password) {

            $pattern = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';
            return preg_match($pattern, $password);
        };

        if (!$isPasswordComplex($_POST['password'])) {
          die("Your password is not complex enough, it must contain at least 8 characters, at least one uppercase letter, one lowercase letter, one number and one special character.");
        }

        if($_POST["password"] !== $_POST["password_confirmation"])
        {
         die("Passwords must match");
        }
        $password_hash=password_hash($_POST["password"],PASSWORD_DEFAULT);

        $isValidPhoneNumber = function($phone) {

            $pattern = '/^\+?\d{10,15}$/';
            return preg_match($pattern, $phone);
        };

        if (!$isValidPhoneNumber($_POST['phone']))
            {
                die("Invalide phone number");
            }



        print_r($_POST);

        var_dump($password_hash);
    }
}