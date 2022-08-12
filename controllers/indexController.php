<?php

namespace Controllers;

use MVC\Router;

class indexController{
    public static function index(Router $router){
        $router->render('index');
    }
}