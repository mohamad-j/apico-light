<?php
namespace Apico;
class Core{
     private $event;
     static private $args = array();
     static public $route;
    static private $result;
    static public $dir = __DIR__;
    
    
    static public function start(){
    
    $r = substr($_SERVER['REQUEST_URI'], strlen(B_PATH), strlen($_SERVER['REQUEST_URI']) - strlen(B_PATH));
    $route_config_path = C_PATH.R_PATH.RS_PATH.$r.".php";
        
        if(!file_exists($route_config_path)){
            self::send(array("message"=>"No such route", "path"=>$route_config_path));
        }else{
            self::$route = new Routes\Route($route_config_path);
            
        }
}

static public function use($feature){
    require_once F_PATH.F_PATHS[$feature]["path"].F_PATHS[$feature]["intery"];
    $class = F_PATHS[$feature]["class"];
    return new $class;
}
static public function setArgs($args){
    self::$args = $args;
}
static public function getArgs(){
    return self::$args;
}
static public function send($res){
    header("Content-type: application/json");
    echo json_encode($res);
}


}

?>