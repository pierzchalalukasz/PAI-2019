<?php
require_once 'Controllers\HomeController.php';
require_once 'Controllers\SecurityController.php';

class Routing {
    private $routes = [];

    public function __construct()
    {
        $this->routes = [
               'home'  => [
                   'controller' => 'HomeController',
                   'action' => 'home'
                ],
               'login' => [
                'controller' => 'SecurityController',
                'action' => 'login'
               ],
               'register' => [
                   'controller' => 'SecurityController',
                   'action' => 'register'
               ]
        ];
    }

    public function run()
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 'home';

        if (isset($this->routes[$page])) {
            $controller = $this->routes[$page]['controller'];
            $action = $this->routes[$page]['action'];

            $object = new $controller;
            $object->$action();
        }
    }
}