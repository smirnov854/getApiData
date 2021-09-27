<?php
error_reporting(E_ALL);
require_once "Wheels/DuploWheels.php";
require_once "Tyres/DuploTyres.php";

$duplo_wheel = new DuploWheels();
$duplo_wheel->get_data();
$duplo_wheel->file_name = "/home/c/cf08116/public_html/downloader/duplo/duplo_wheels.csv";
$duplo_wheel->read_from_csv();

$duplo_tyres = new DuploTyres();
$duplo_tyres->get_data();
$duplo_tyres->file_name = "/home/c/cf08116/public_html/downloader/duplo/duplo_tyres.csv";
$duplo_tyres->read_from_csv();

