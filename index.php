<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('login', 'DefaultController');
Routing::get('index', 'DefaultController');
Routing::post('login', 'SecurityController');
Routing::get('registration', 'DefaultController');
Routing::post('registration', 'RegistrationController');
Routing::post('guest', 'SecurityController');
Routing::get('logout', 'SecurityController');
Routing::get('menu', 'ProductController');

Routing::run($path);