<?php 

namespace MVCArchitecture\Core;

class Request{
    public function getPath() {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        return explode('?', $path)[0];
    }

    public function method() {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function body(){
        $body = [];
        if ($this->method() === 'get') $body = $_GET;
        if ($this->method() === 'post') $body = $_POST;
        return $body;        
    }

    public function files(){        
        return $_FILES;        
    }
}