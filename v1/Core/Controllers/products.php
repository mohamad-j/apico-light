<?php
// echo "heloo products \n";
use Apico\Core as Apico;

$d =  Apico::use("Data");

$d->tableName("products");
$d->tableProps(array("name","description","price"));
$products = $d->find();

Apico::send($products);


?>