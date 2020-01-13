<?php
require_once 'Controllers\HomeController.php';

class Routing {
    private $routes = [];

    public function __construct()
    {
        $this->routes = [
               'home'  => [
                   'controller' => 'HomeController',
                   'action' => 'home'
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