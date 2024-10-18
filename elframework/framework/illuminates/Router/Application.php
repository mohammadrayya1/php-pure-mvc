<?php

namespace Illuminates\Router;

use APP\Http\Controllers\HomeController;

class Application
{

    public function start()
    {
        $router=new Router();

        $router->add('GET',"/about", HomeController::class,'about',[]);
        $router->add('GET',"/show", HomeController::class,'show',[]);


        $router->dispatch($_SERVER['REQUEST_METHOD'],$_SERVER['REQUEST_URI']);

    }
}