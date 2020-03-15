<?php
use Apico\Core as APico;
// $a = array("name"=>"name","id"=> 9887078, "additional"=>"joiq oihqowed");
// $r = "products/name,description@tabl1/name,description@table2/p1,p1";
// $s = "SELECT FROM ";
// $arr1 = explode('@', $r);
// print_r($arr1);
// for($i=0; $i<count($arr1); $i++){
    
//     $arr2 = explode('/',$arr1[$i]);
    
//     print_r($arr2);
//     $arr3 = explode(',',$arr2[1]);
//         print_r($arr3);
//         for($b = 0; $b<count($arr3); $b++){
//             $s .= $arr2[0].'.'.$arr3[$b].", ";
//         }
//     }
//     $s = rtrim($s, ", ");
// echo "SEL STMT :: ".$s;
$args = Apico::getArgs();
// $_ARR = array("name"=>"Moha", "age"=>652);
// $method = "ARR";
// $v = "_".$method; 
Apico::send($args);

?>