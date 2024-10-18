<?php



require_once __DIR__.'/../vendor/autoload.php';


use APP\Http\Controllers\HomeController;
use Illuminates\Router\Application;
use Illuminates\Router\Router;


$app=new Application();

$app->start();
