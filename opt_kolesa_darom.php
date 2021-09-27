<?php
require_once "Wheels/OptKolesaDaromWheels.php";
require_once "Tyres/OptKolesaDaromTyres.php";

$tyres = new OptKolesaDaromTyres();
$tyres->file_name = "../../opt_kolesa_daromjson.json";
$tyres->read_from_json();

$wheels = new OptKolesaDaromWheels();
$wheels->file_name =  "../../opt_kolesa_daromjson.json";
$wheels->read_from_json();