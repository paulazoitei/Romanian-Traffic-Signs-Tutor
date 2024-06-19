<?php
class App
{
    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();
         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($_SERVER['REQUEST_URI'] === '/php/Romanian-Traffic-Signs-Tutor/Public/api/questions') {
                require_once '../app/controllers/QuestionsController.php';
                $controller = new QuestionsController();
                $controller->create();
                exit();
            }
        }
          if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if ($_SERVER['REQUEST_URI'] === '/php/Romanian-Traffic-Signs-Tutor/Public/api/users') {
                require_once '../app/controllers/UsersController.php';
                $controller = new UsersController();
                $controller->index();
                exit();
            }
            if ($_SERVER['REQUEST_URI'] === '/php/Romanian-Traffic-Signs-Tutor/Public/api/questions') {
                require_once '../app/controllers/QuestionsController.php';
                $controller = new QuestionsController();
                $controller->index();
                exit();
            }
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['REQUEST_URI'] === '/php/Romanian-Traffic-Signs-Tutor/Public/api/register') {
            require_once '../app/controllers/RegisterController.php';
            $controller = new RegisterController();
            $controller->register();
            exit();
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['REQUEST_URI'] === '/php/Romanian-Traffic-Signs-Tutor/Public/api/login') {
            require_once '../app/controllers/LoginController.php';
            $controller = new LoginController();
            $controller->login();
            exit();
        }

        if (file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        $this->params = $url ? array_values($url) : [];
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl()
    {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        } else {
            return ['home'];
        }
    }
}