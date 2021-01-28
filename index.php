<?php

require 'Router.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('about', 'DefaultController');
Router::get('contact', 'DefaultController');
Router::post('rent', 'BookingController');
Router::post('rentCar', 'BookingController');
Router::post('login', 'SecurityController');
Router::post('register', 'SecurityController');
Router::get('carlisting', 'CarController');
Router::post('search', 'CarController');
Router::get('profile', 'BookingController');


Router::run($path);
