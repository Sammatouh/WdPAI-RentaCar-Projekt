<?php

require 'Router.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::post('login', 'SecurityController');
Router::post('register', 'SecurityController');
Router::get('about', 'DefaultController');
Router::get('carlisting', 'DefaultController');
Router::get('contact', 'DefaultController');

Router::run($path);
