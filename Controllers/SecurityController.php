<?php

require_once 'AppController.php';
require_once __DIR__.'\..\\Models\\User.php';
require_once __DIR__.'\..\\Repository\\UserRepository.php';

class SecurityController extends AppController {

    public function login()
    {   
        $userRepository = new UserRepository();

        if ($this->isPost()) {
            if(!empty($_POST))   {
                $email = $_POST['email'];
                $password = $_POST['password'];

                $user = $userRepository->getUser($email);

                if (!$user) {
                    $this->render('login', ['messages' => ['User with this email does not exist!']]);
                    return;
                }

                if (!password_verify($password, $user->getPassword())) {
                    $this->render('login', ['messages' => ['Wrong password!']]);
                    return;
                }

                $url = "http://$_SERVER[HTTP_HOST]/";
                header("Location: {$url}/PAI/?page=stats");    
            }
        }

        $this->render('login');
    }

    public function register()
    {

        $userRepository = new UserRepository();

        if ($this->isPost()) {
            if(!empty($_POST))   {
                $name = $_POST['name'];
                $surname = $_POST['surname'];
                $username = $_POST['username'];
                $email = $_POST['email'];
                $pass = $_POST['pass'];
                $repass = $_POST['repass'];

                $user = $userRepository->getUser($email);

                if ($user) {
                    $this->render('register', ['messages' => ['An account assigned to this email already exists!']]);
                    return;
                }
                else if($pass != $repass)    {
                    $this->render('register', ['messages' => ['Passwords don\'t match.']]);
                    return;
                }   else    {
                    $hash = password_hash($pass, PASSWORD_BCRYPT);
                    $userRepository->addUser($name, $surname, $username, $email, $hash);
                    $this->render('login', ['messages' => ['You \'ve been correctly registered. Now you can log in!']]);
                }
            }
        }

        $this->render('register');
    }
}