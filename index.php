<?php
error_reporting(E_ALL);
set_time_limit(600);
require_once "Common/Database_worker.php";
require_once "Tyres/Tyres.php";
require_once "Wheels/Wheels.php";
$class_list = [
    "Tyres/DiscoverTyres.php",
    "Tyres/DuploTyres.php",
    "Tyres/OknoTyres.php",
    "Tyres/OptKolesaDaromTyres.php",
    "Tyres/Tochki4Tyres.php",
    "Tyres/TreckTyreTyres.php",
    "Tyres/VianorTyres.php",
    "Tyres/TerminalYstTyres.php",

    "Wheels/DiscoverWheels.php",
    "Wheels/DuploWheels.php",
    "Wheels/KolradWheels.php",
    "Wheels/Okno2Wheels.php",
    "Wheels/OptKolesaDaromWheels.php",
    "Wheels/OptWspitality.php",
    "Wheels/Tochki4Wheels.php",
    "Wheels/TrekTyreWheels.php",
    "Wheels/VianorWheels.php",

];

foreach($class_list as $row){
    require_once $row;
}

$type = $_GET['type'];
if(empty($type)){
    echo "Необходимо выбрать параметр";
    die();
}

$db = new Database_worker();
@$db->do_sql("TRUNCATE TABLE parsing_$type");

$res = $db->do_sql("SELECT psl.* 
                    FROM parsing_source_list psl                    
                    WHERE psl.type='$type'");
foreach($res as $row){

    if($row->file_name == 'okno2_wheels.php'){
        echo $row->file_name."<br/>";
        require_once "scripts/{$row->type}/{$row->file_name}";
    }
}