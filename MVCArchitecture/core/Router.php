<?php

namespace MVCArchitecture\Core;
use MVCArchitecture\Core\Request;
use MVCArchitecture\Core\Database;

class Router {
    private $request;
    private $database;
    private $routes = [
        'get' => [],
        'post' => []
    ];

    public function __construct(Request $request, Database $database){
        $this->request = $request;
        $this->database = $database;
    }

    public function get($path, $callback){
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback){
        $this->routes['post'][$path] = $callback;
    }

    public function resolve() {
        $method = $this->request->method();
        $path = $this->request->getPath();
        $routes = $this->routes[$method];

        foreach ($routes as $route => $callback) {
            $routePattern = preg_replace('#:([\w]+)#', '([\w-]+)', $route);
            $routePattern = "#^" . $routePattern . "$#";

            if (preg_match($routePattern, $path, $matches)) {
                array_shift($matches); 

                if (is_array($callback)) {
                    $controller = new $callback[0]($this->database->connection);
                    return call_user_func_array([$controller, $callback[1]], array_merge([$this->request], $matches));
                }

                return call_user_func_array($callback, $matches);
            }
        }

        http_response_code(404);
        echo "404 Not Found";
        exit;
    }
}