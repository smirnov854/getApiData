<?php

require_once "Common/Database_worker.php";
require_once "Common/Logger.php";
require_once "Tyres/Tyres.php";
require_once "Wheels/Wheels.php";

$list = [
    "vianor.php",
    "trecktyre.php",
    "tochki4.php",
    "optwspitality.php",
    "okno2.php",
    "kolrad.php",
    "duplo.php",
    "discover.php",
    "opt_kolesa_darom.php"
];
foreach($list as $file_name){
    require_once $file_name;
}




