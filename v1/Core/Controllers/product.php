<?php
use Apico\Core as Apico;
$props = Apico::getArgs();
$d =  Apico::use("Data");
$sql = $d->insert('products', $props);

Apico::send(array("message"=>"Product was inserted!"));
// $s = 'me, me, meee,';
// rtrim($s,',');
// Apico::send(array("messae"=>$s));

?>