<?php

namespace Controllers;

use MVC\Router;

class MenuController{
    public static function index(Router $router){ 
        $router->render('menu/index');
    }
}