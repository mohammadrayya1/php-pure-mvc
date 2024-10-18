<?php

namespace Illuminates\Router;


class Router{

    protected $routes = [
        'GET'=>[],
        'PUT'=>[],
        "POST"=>[],
        "DELETE"=>[],
        "PATCH"=>[]
    ];

    public function add(string $method, string $route, $controller, $action, $middlewares=[])
    {
        $route_without_slash = ltrim($route, '/');
        $this->routes[$method][$route_without_slash]=compact('controller','action','middlewares');
    }

    public function routes()
    {
        return $this->routes;
    }

    public function dispatch($method,$uri)
    {
        $uri = ltrim($uri, '/');

        if (!isset($this->routes[$method][$uri])) {
            throw new \Exception("Route not found");
        }
        $action=$this->routes[$method][$uri]['action'];

        if (is_callable($action)){
            $action();
        }elseif(is_string($action)){
            $controller = $this->routes[$method][$uri]['controller'];

            if (class_exists($controller)){
                call_user_func_array([new $controller,$action],[]);
            }else{
                throw new \Exception("The Controller is Not found");
            }
        }
    }
}