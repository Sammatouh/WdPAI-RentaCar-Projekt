<?php

require 'Router.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Router::get('login', 'DefaultController');
Router::get('about', 'DefaultController');
Router::get('carlisting', 'DefaultController');
Router::get('contact', 'DefaultController');
Router::get('register', 'DefaultController');

Router::run($path);
