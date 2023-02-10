<?php

require 'src/controllers/DefaultController.php';
require 'src/controllers/SecurityController.php';
require 'src/controllers/RegistrationController.php';
require 'src/controllers/ProductController.php';
require 'src/controllers/CartController.php';
class Routing {
    public static $routes;

    public static function get($url, $view) {
        self::$routes[$url] = $view;
    }

    public static function post($uri, $view) {
        self::$routes[$uri] = $view;
    }

    public static function run($url) {
        $action = explode("/", $url)[0];
        if(!array_key_exists($action, self::$routes)) {
            die("Wrong url");
        }

        $controller = self::$routes[$action];
        $object = new $controller;
        $object->$action();
    }
}