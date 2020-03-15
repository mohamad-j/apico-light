<?php
class Data{
    private $table_name;
    private $host;
    private $db_name;
    private $db_user;
    private $db_password;
    private $conn;
    private $joinProps = "";
    private $tableProps = "*";
    private $inner_join;
    private $where_clause;

function __construct(){
    $conf = require_once __DIR__.'\\'.F_PATHS['Data']["config"];
    $this->host = $conf["host"];
    $this->db_name = $conf["data_base_name"];
    $this->db_user = $conf["user"];
    $this->db_password = $conf["password"];
    $this->connect();
}

private function connect(){
    $this->conn = null;
    try{
        $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->db_user, $this->db_password);
        $this->conn->exec("set names utf8");
    }catch(PDOException $exception){
        echo "Connection error: " . $exception->getMessage();
    }
    return $this->conn;
}

public function insert($tableName, $props){
    try {
        $values = "";
        $ind = 0;
        foreach($props as $key=>$value){
            $ind++;
            $values .= "'".$value."'";
            if($ind < count($props)){
                $values .=", ";
            }
        }
        $keyes =implode(',',array_keys($props));
    $sql = "INSERT INTO {$tableName} ( {$keyes} ) VALUES ( {$values} )";
        $this->conn->exec($sql);
        // return $sql;

        }
    catch(PDOException $e)
        {
        Apico::send(array("message"=> $e->getMessage(),"Insert"=>"Error"));
        }
}

function tableName($tn){
    $this->table_name = $tn;
   // $this->table_allias = $al;
}

function getTableName(){
    return $this->table_name;
}

function inerrJoin($table){
    // print_r($table1[0]["props"]);
     $this->joinProps = "";
     $this->joinProps = "";
    // $s2=$this->table_name .".* FROM " . $this->table_name;
     $this->inner_join = "";
    for($a = 0 ; $a < count($table); $a++){
        for($i = 0; $i < count($table[$a]["props"]); $i++){
            //echo "st1  :".$table[$a]["props"][$i]."\n";
            $this->joinProps .= $table[$a]["table"].".".$table[$a]["props"][$i].",";
        }
        $this->inner_join .=" INNER JOIN ".$table[$a]["table"]." ON ".$table[$a]["table"].".".$table[$a]["on"][0]." = ".$table[$a]["referance"].".".$table[$a]["on"][1];
    }
}

function setWhereClause($where){
    $this->where_clause = "";
    $this->where_clause = $where;
}

function tableProps($tableProps){
    $this->tableProps = "";
    foreach($tableProps as $props){
        $this->tableProps .= $this->getTableName().".".$props.",";
    }
    $this->tableProps = rtrim($this->tableProps,",");
}

function find(){
    $sql = "SELECT {$this->tableProps} FROM {$this->table_name}";
    if($this->where_clause != null) $sql .= " WHERE {$this->where_clause} ";
    // prepare query statement
    $stmt = $this->conn->prepare($sql);
    // execute query
    $stmt->execute();
    $res=array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

    array_push($res, $row);
};
return $res;
}

function findJoin(){
    $sql = "SELECT {$this->jooinProps} {$this->tableProps} FROM {$this->table_name}";
    if($this->where_clause != null) $sql .= "WHERE {$this->where_clause}";
    // prepare query statement
    $stmt = $this->conn->prepare($sql);
    // execute query
    $stmt->execute();
    return $stmt;
}

function save($saveProps){
    $props = [];
    $values = [];
    $c = 1;
    foreach($saveProps as $k=>$v){
        array_push($props, $k);
        //$values .= "'".$v."'".",";
    }
   // $props = rtrim($props,",");
    for($i = 0 ; $i < count($saveProps) ; $i++){
        array_push($values, "?");
    }
    $sql = "INSERT INTO {$this->table_name} (".implode(",",$props).") VALUES (".implode(",",$values).") ";
    echo "sql == {$sql} "."\n";
    $stmt = $this->conn->prepare($sql);
    foreach($saveProps as $k=>$v){
        echo "{$c} , {$v}"."\n";
        $stmt->bindValue($c , $v);
        $c++;
    }
    $stmt->execute();
}

function update($updateProps){
    $props = [];
    $c = 1;
    foreach($updateProps as $k=>$v){
        array_push($props, $k." = ?");
        //$values .= "'".$v."'".",";
    }
   // $props = rtrim($props,",");
    echo "\n props \n".implode(",",$props);

    $sql = "UPDATE {$this->table_name} SET ".implode($props,",");
    if($this->where_clause != null) $sql .= " WHERE {$this->where_clause} ";

    echo "sql == {$sql} "."\n";
    $stmt = $this->conn->prepare($sql);
    foreach($updateProps as $k=>$v){
        echo "{$c} , {$v}"."\n";
        $stmt->bindValue($c , $v);
        $c++;
    }
    $stmt->execute(); 
}

function delete(){
    $sql = "DELETE FROM {$this->table_name}";
    if($this->where_clause != null) $sql .= " WHERE {$this->where_clause} ";

    echo "sql == {$sql} "."\n";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(); 
}
}
?>