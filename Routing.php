<?php
require_once 'Controllers\HomeController.php';
require_once 'Controllers\SecurityController.php';
require_once 'Controllers\StatsController.php';
require_once 'Controllers\AdminController.php';
require_once 'Controllers\ContactController.php';
require_once 'Controllers\ProfileController.php';

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
               ],
               'logout' => [
                   'controller' => 'SecurityController',
                   'action' => 'logout'
               ],
               'stats' => [
                   'controller' => 'StatsController',
                   'action' => 'stats'
               ],
               'create-stats' => [
                   'controller' => 'StatsController',
                   'action' => 'createStats'
               ],
               'admin' => [
                   'controller' => 'AdminController',
                   'action' => 'index'
               ],
               'users' => [
                   'controller' => 'AdminController',
                   'action' => 'users'
               ],
               'admin_delete_user' => [
                   'controller' => 'AdminController',
                   'action' => 'userDelete'
               ],
               'contact' => [
                   'controller' => 'ContactController',
                   'action' => 'contact'
               ],
               'profile' => [
                   'controller' => 'ProfileController',
                   'action' => 'profile'
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