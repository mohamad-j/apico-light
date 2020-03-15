<?php

namespace Apico\Routes;
use Apico\Core as Apico;

class Route{
    private $path;
    private $method;
    private $params = array();
    private $public = false;
    private $empty_route = false;
    function __construct($cofig_path){
        $route_config = require_once $cofig_path;
            $this->path =  C_PATH.API_PATH.$route_config["path"].'.php';//($route_config["type"] === "controller")? C_PATH.API_PATH.$route_config["path"].'.php' : C_PATH.V_PATH.$route_config["path"].'.php';
            $this->method = $route_config["method"];
            $this->type = $route_config["type"];
            $this->public = $route_config["public"];
            if($_SERVER['REQUEST_METHOD'] !== $this->method){
                Apico::send(array("Message"=>"Wrong request method"));
            }else{
                switch($this->method){
                    case 'POST': Apico::setArgs($_POST);
                break;
                    case 'GET': Apico::setArgs($_GET);
                break;
                    case 'PUT': Apico::setArgs($_PUT);
                break;
                }
            }
            require_once $this->getPath();
        }
    
    function getPath(){
        return $this->path;
    }
    function getMethod(){
        return $this->method;
    }
    function getParams(){
        return $this->params;
    }
    function getAccess(){
        return $this->access;
    }

}
?>