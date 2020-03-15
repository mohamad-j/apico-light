<?php
header('content-type:text/plain');

require_once "Core/config.php";
require_once C_PATH."core.php";
require_once C_PATH.R_PATH."/index.php";

use Apico\Core as Apico;
Apico::start();


?>