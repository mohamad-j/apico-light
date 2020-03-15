<?php
class ApicoUser{
    private $userid_name = "userid";
    private $userid_value;
    private $loged_in = false;

    function __construct(){
        if(isset($_COOKIE[$this->userid_name])){
            $this->userid_value = $_COOKIE[$this->userid_name] ;
            $this->loged_in = true;
        }else{
            $this->loged_in = false;
        }
    }

    private function logIn(){

    }

    private function logOut(){

    }

    static function getUser(){

    }

    function userGetStatus(){
        return $this->loged_in;
    }

    function registerFackUser(){
        $this->userid_value = "kjaIwfjvjWJFo4#983%3lskga";
        setcookie($this->userid_name , $this->userid_value , time() + (86400 * 30), "/");
    }
    function getUserValue(){
        return $this->userid_value;
    }

    private function createUserKey(){
        $str = "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890&";
    }

}
?>