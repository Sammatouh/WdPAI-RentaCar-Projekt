<?php

require_once 'Controller.php';
require_once __DIR__.'/../repository/CarRepository.php';

class CarController extends Controller
{
    private $carRepository;

    public function __construct()
    {
        parent::__construct();
        $this->carRepository = new CarRepository();
    }

    public function carListing()
    {
        $cars = $this->carRepository->getAllCars();
        $this->render('carlisting', ['cars' => $cars]);
    }
}