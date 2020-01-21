<?php

require_once 'AppController.php';
require_once __DIR__.'\..\\Models\\User.php';
require_once __DIR__.'\..\\Repository\\UserRepository.php';

class SecurityController extends AppController {

    public function login()
    {   
        $userRepository = new UserRepository();

        if ($this->isPost()) {
            if(isset($_POST['submit']))   {
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
                $_SESSION['user_id'] = $user->getId();
                $_SESSION['id'] = $user->getEmail();
                $_SESSION['username'] = $user->getUsername();
                $_SESSION['role'] = $user->getRole();
                $_SESSION['time'] = date("Y-m-d H:i:s");

                $userRepository->addLog($_SESSION['user_id'], $_SESSION['time']);

                $url = "http://$_SERVER[HTTP_HOST]/";
                header("Location: {$url}/PAI/?page=create-stats");
                return;
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

    public function logout(): void
    {
        session_unset();
        session_destroy();

        $this->render('login', ['messages' => ['You have been successfully logged out!']]);
    }
}