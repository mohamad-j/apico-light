<?php
echo "heloo registration \n";
$d =  Apico::Require("Data");
$d->tableName("products");
$d->getTableName();
$categories = ["table"=>"categories",
                "referance"=>"products",
            "props"=>[
                "name as c_name",
                "description as c_desc"
            ],
        "on"=>[
            "id",
            "category_id"
        ]];
        $categoriess = [$categories];
//$products = $d->inerrJoin($categoriess);
//print_r($products);
// products array
$products_arr=array();
$products_arr["records"]=array();
// print_r($products->fetch(PDO::FETCH_ASSOC));
echo "-----\n";
$d->setWhereClause(" name = 'Wallet' ");
$products = $d->find();
while ($row = $products->fetch(PDO::FETCH_ASSOC)){
    //print_r($row);
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

echo json_encode($products_arr)."\n";
$products_arr=array();
$products_arr["records"]=array();
// print_r($products->fetch(PDO::FETCH_ASSOC));
echo "-----\n";
$d->setWhereClause(null);
$products = $d->find();
while ($row = $products->fetch(PDO::FETCH_ASSOC)){
    //print_r($row);
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

echo json_encode($products_arr)."\n";

?>