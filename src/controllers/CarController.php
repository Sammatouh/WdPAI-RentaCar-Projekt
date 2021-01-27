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

    public function search()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->carRepository->getCarsBySearch($decoded['search']));
        }
    }
}