<?php
function keyGenerater($secret, $length){
    $str = "";
$l = "aAbBcCdDeEfFgGhHjJiIkKlLmMnNoOpPqQrRsStTuUvVwWxXzZ1234567890";
$l .= $secret;
$l .= time();
$larr = str_split($l);
$lrand = rand(0,count($larr));
for($i = 0 ; $i < $length ; $i++){
    $str .= $larr[rand(0,count($larr)-1)];
}

echo "scerete id ". $str."\n";
}
keyGenerater("secreteuuoqwweqnx9ookqkod9892923", 100);
?>