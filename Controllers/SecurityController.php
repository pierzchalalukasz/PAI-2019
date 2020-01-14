<?php

require_once 'AppController.php';
require_once __DIR__.'\..\\Models\\User.php';

class SecurityController extends AppController {

    public function login()
    {   
        $user = new User('johnny@pk.edu.pl', 'admin', 'Johnny', 'Snow');

        if ($this->isPost()) {
            if(!empty($_POST))   {
                $email = $_POST['email'];
                $password = $_POST['password'];

            if ($user->getEmail() !== $email) {
                $this->render('login', ['messages' => ['User with this email does not exist!']]);
                return;
            }

            if ($user->getPassword() !== $password) {
                $this->render('login', ['messages' => ['Wrong password!']]);
                return;
            }

            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=home");    
            }
        }

        $this->render('login');
    }

    public function register()
    {
        $this->render('register');
    }
}