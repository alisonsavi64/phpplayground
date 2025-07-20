<?php 

namespace Src\Infra\Router;

class Request{
    private $uri;
    private $method;
    private $body;
    private $query;

    public function __construct($uri, $method, $body, $query){
        $this->uri = $uri;
        $this->method = $method;
        $this->body = $body;
        $this->query = $query;
    }

}