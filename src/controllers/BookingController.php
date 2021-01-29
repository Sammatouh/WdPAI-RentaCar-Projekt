<?php

require_once 'Controller.php';
require_once 'SessionManager.php';
require_once __DIR__ . '/../models/Booking.php';
require_once __DIR__.'/../repository/CarRepository.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/BookingRepository.php';


class BookingController extends Controller
{
    private $carRepository;
    private $userRepository;
    private $bookingRepository;
    private $sessionManager;

    public function __construct()
    {
        parent::__construct();
        $this->carRepository = new CarRepository();
        $this->userRepository = new UserRepository();
        $this->bookingRepository = new BookingRepository();
        $this->sessionManager = new SessionManager();
    }

    public function rent(int $id)
    {
        if (!$this->sessionManager->isSessionSet())
        {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
            return;
        }

        $car = $this->carRepository->getCar($id);
        $this->render('rent', ['car' => $car]);
    }

    public function rentCar(int $id)
    {
        if (!$this->isPost()) {
            return;
        }

//        die(var_dump($_POST));

        $days = intval($_POST['nodays']);
        $value = floatval($_POST['booking-value']);

        $booking = new Booking(
            $_SESSION['userId'],
            $id,
            $value,
            date("Y-m-d"),
            $days
        );

        $this->bookingRepository->addBooking($booking);

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/profile");
    }

    public function profile()
    {
        if (!$this->sessionManager->isSessionSet())
        {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
            return;
        }

        $user = $this->userRepository->getUser($_SESSION['email']);
        $userBookings = $this->bookingRepository->getBookingsByUserId($_SESSION['userId']);
        $allBookings = [];
        if ($_SESSION['admin']) {
            $allBookings = $this->bookingRepository->getAllBookings();
        }
        $this->render('profile',
            ['user' => $user,
             'userBookings' => $userBookings,
             'allBookings' => $allBookings]);
    }

    public function deleteBooking(int $id)
    {
        if (!$this->sessionManager->isSessionSet() || !$_SESSION['admin'])
        {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/profile");
            return;
        }

        $this->bookingRepository->deleteBookingById($id);
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/profile");
    }
}