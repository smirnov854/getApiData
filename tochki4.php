<?php

require_once "Wheels/Tochki4Wheels.php";
require_once "Tyres/Tochki4Tyres.php";

$tyres = new Tochki4Tyres();
$tyres->file_name = "../../incoming_files/M25949.json";
$tyres->read_from_json();

$wheels = new Tochki4Wheels();
$wheels->file_name =  "../../incoming_files/M25949.json";
$wheels->read_from_json();