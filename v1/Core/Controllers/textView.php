<?php
use Apico\Core as Apico;
// $filename = C_PATH.V_PATH."text.html";
// $handle = fopen($filename, "r");
// $contents = fread($handle, filesize($filename));
// fclose($handle);
$f = file_get_contents(C_PATH.V_PATH."text.html");
Apico::send(array("type"=>"view","view"=>$f ));

?>