<?php
class Request 
{
    function __construct($params){
        $this->method = $_SERVER['REQUEST_METHOD'];
        if($_SERVER['REQUEST_METHOD'] === "GET"){
            $this->params = $_GET;
        }
        if($_SERVER['REQUEST_METHOD'] === "POST"){
            $this->params = $_POST;
        }

    }
}



?>