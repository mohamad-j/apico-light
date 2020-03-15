<?php
echo "I am user handler \n";
$u = Apico::Require("User");
if($u->userGetStatus()){
    echo "User is loged in  , user value = {$u->getUserValue()}";
}
if(!$u->userGetStatus()){
    echo " User is not loged in ...";
    $u->registerFackUser();
}

?>