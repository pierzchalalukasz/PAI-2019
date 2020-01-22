<?php

require_once 'AppController.php';
require_once __DIR__.'\..\\Models\\User.php';
require_once __DIR__.'\..\\Repository\\UserRepository.php';

class AdminController extends AppController {

    public function index()
    {
        $userRepository = new UserRepository();
        if(isset($_SESSION['id']))  {
            $this->render('users', ['user' => $userRepository->getUser($_SESSION['id'])]);
        }   else    {
            die("<h2>You are not logged in!</h2>");
        }
    }

    public function users(): void
    {   
        $userRepository = new UserRepository();
        
        header('Content-type: application/json');
        http_response_code(200);
        
        $users = $userRepository->getUsers();
        echo $users ? json_encode($users) : '';
    }

    public function userDelete(): void
    {
        if (!isset($_POST['id'])) {
            http_response_code(404);
            return;
        }

        $user = new UserRepository();
        $user->delete((int)$_POST['id']);
        
        http_response_code(200);
    }
}