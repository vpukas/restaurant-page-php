<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class RegistrationController extends AppController
{
    private $userRepository;
    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function registration()
    {
        if(!$this->isPost()) {
            return $this->render('registration');
        }

        $username = $_POST['username'];
        $phone = $_POST['phone'];
        $email = $_POST["email"];
        $password = sha1($_POST["password"]);

        $user = $this->userRepository->getUserByUsername($username);

        if($user) {
            return $this->render('registration', ['messages' => ['User already exist!']]);
        }

        $user = new User($email, $password, $username, $phone, 1);
        $this->userRepository->addNewUser($user);

        return $this->render('login');
    }
}