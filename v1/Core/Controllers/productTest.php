<?php
// echo "heloo products \n";

$d =  Apico::use("Data");
$props = array("products"=>array(
    "namne","description"));
    $r = "products/name,description@tabl1/name,description/@table2/p1,p1";
$d->tableName("products");
$d->getTableName();
$products = $d->find();
// products array
$products_arr=array();
$products_arr["records"]=array();
while ($row = $products->fetch(PDO::FETCH_ASSOC)){
    // extract row
    // this will make $row['name'] to
    // just $name only
    extract($row);

    $product_item=array(
        "id" => $id,
        "name" => $name,
        "description" => html_entity_decode($description),
        "price" => $price,
        "category_id" => $category_id
    );

    array_push($products_arr["records"], $product_item);
}

//echo "From read.ph";

Apico::send($products_arr)


?>