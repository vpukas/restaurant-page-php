<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/SessionRepository.php';

class SecurityController extends AppController
{
    private $userRepository;
    private $sessionRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
        $this->sessionRepository = new SessionRepository();
    }

    public function login()
    {
        if(isset($_COOKIE['id_user'])) {
            $this->logout();
        }
        if(!$this->isPost()) {
            return $this->render('login');
        }

        $username = $_POST["username"];
        $password = sha1($_POST["password"]);

        $user = $this->userRepository->getUserByUsername($username);

        if(!$user) {
            return $this->render('login', ['messages' => ['User not exist!']]);
        }

        if ($user->getUsername() !== $username) {
            return $this->render('login', ['messages' => ['User with this username not exist!']]);
        }

        if ($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

        $this->setCookies('id_user', $user->getIdRole());
        $this->sessionRepository->startSession($user->getIdRole());

        $this->setCookies('id_role', $user->getIdUser());

        header("Location: {$this->url}/index");
    }

    public function logout()
    {
        setcookie('id_user', $_COOKIE['id_user'], time() - 10, "/");
        setcookie('id_role', $_COOKIE['id_role'], time() - 10, "/");
        $this->sessionRepository->endSession($_COOKIE["id_user"]);

        return $this->render('login');
    }

    public function guest()
    {
        $url = "http://$_SERVER[HTTP_HOST]";
        if(isset($_COOKIE["id_user"])) {
            header("Location: {$url}/index");
            return;
        }

        if(!$this->isPost()) {
            return $this->render('login');
        }

        $username = bin2hex(openssl_random_pseudo_bytes(4));
        $password = sha1(bin2hex(openssl_random_pseudo_bytes(4)));
        $user = new User(null, $password, $username, null, 2);
        $this->userRepository->addNewUser($user);

        $user = $this->userRepository->getUserByUsername($username);

        $this->setCookies('id_user', $user->getIdRole());
        $this->sessionRepository->startSession($user->getIdRole());

        $this->setCookies('id_role', $user->getIdUser());

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/index");
    }

    private function setCookies($name, $value) {
        setcookie($name, $value, time() + (60 * 30), "/");
    }
}