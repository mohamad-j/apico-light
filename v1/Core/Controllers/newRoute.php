<?php

use Apico\Core as Apico;

$args = Apico::getArgs();
$type = $args['type'];
$method = $args['method'];
$public = $args['public'];
$path = $args['path'];

$content = <<<EOD
<?php
return array(
    "type"=>"{$type}",
    "method"=>"{$method}",
    "public"=>{$public},
    "path"=>"{$path}"
)
?>
EOD;
$f = fopen(C_PATH.R_PATH.RS_PATH.$args['file_name'].'.php','w');
fwrite($f, $content);
fclose($f);

$content = <<<EOD
<?php

?>
EOD;
$f = fopen(C_PATH.API_PATH.$path.'.php','w');
fwrite($f, $content);
fclose($f);
Apico::send(array("content"=>$content,"api path"=>API_PATH));

?>