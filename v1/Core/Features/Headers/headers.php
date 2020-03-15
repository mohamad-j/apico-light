<?php
class Headers
{
    private $json = 'application/json';
    private $pdf = 'application/pdf';
    private $html = 'text/html';
    private $plain = 'text/plain';
    private $javascript = 'text/javascript';
    private $css = 'text/css';
    private $headers;

    function __construct(){
        $this.$headers = apache_request_headers();
    }


    
}

?>

<!-- // required headers
header("Access-Control-Allow-Origin: http://localhost/rest-api-authentication-example/");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With"); -->