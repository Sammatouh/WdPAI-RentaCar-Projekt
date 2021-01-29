<?php

session_start();

require_once 'Controller.php';
require_once 'SessionManager.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends Controller
{
    const UPLOAD_DIRECTORY = '/../public/uploads/avatars/';
    private $userRepository;
    private $sessionManager;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
        $this->sessionManager = new SessionManager();
    }

    public function login()
    {
        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $user = $this->userRepository->getUser($email);

        if (!$user)
        {
            return $this->render('login', ['messages' => ['User does not exist!']]);
        }

        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['User with this email does not exist!']]);
        }

        if ($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

        $this->sessionManager->sessionSet($email);

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/carlisting");
    }

    public function register()
    {
        if (!$this->isPost()) {
            return $this->render('register');
        }

        if ($this->userRepository->getUser($_POST['email'])) {
            return $this->render('register', ['messages' => ['This email is already taken']]);
        }

        $name = $_POST['first-name'];
        $surname = $_POST['surname'];
        $phone = $_POST['phone-number'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = new User(
            $email,
            md5($password),
            $name,
            $surname,
            $phone,
            'default_avatar.png',
            date("Y-m-d H:i:s")
        );

        $this->userRepository->addUser($user);
        $this->sessionManager->reset();

        $this->render('login', ['messages' => ['Account created']]);
    }

    public function changeAvatar(int $id)
    {
        if (!$this->sessionManager->isSessionSet()) {
            return;
        }

        if (!($this->isPost() && is_uploaded_file($_FILES['profilePic']['tmp_name']))) {
            return;
        }

        move_uploaded_file(
            $_FILES['profilePic']['tmp_name'],
            dirname(__DIR__) . self::UPLOAD_DIRECTORY . strval($id) . $_FILES['profilePic']['name']
        );

        $oldPic = $this->userRepository->changeUserAvatar($_SESSION['userId'], strval($id) . $_FILES['profilePic']['name']);
        if ($oldPic != 'default_avatar.png') {
            unlink(dirname(__DIR__) . self::UPLOAD_DIRECTORY . $oldPic);
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/profile");
    }

    public function logout()
    {
        $this->sessionManager->logout();
    }
}