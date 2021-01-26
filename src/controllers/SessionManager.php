<?php

session_start();

require_once __DIR__.'/../repository/UserRepository.php';

class SessionManager
{
    private UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function sessionSet($email)
    {
        $userId = $this->userRepository->getUser($email)->getId();

        $_SESSION['login'] = true;
        $_SESSION['userId'] = $userId;
        $_SESSION['email'] = $email;
        $_SESSION['admin'] = $this->userRepository->isUserAdmin($userId);
    }

    public function isSessionSet()
    {
        return isset($_SESSION) && ($_SESSION['login'] == true);
    }

    public function reset()
    {
        session_unset();
    }

    public function logout()
    {
        session_unset();
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}");
    }
}