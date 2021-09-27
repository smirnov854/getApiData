<?php

require_once "Wheels/VianorWheels.php";
require_once "Tyres/VianorTyres.php";

$wheel = new VianorWheels();
$wheel->get_data();
$wheel->file_name = "/home/c/cf08116/public_html/downloader/vianor/wheels.xml";
$wheel->read_from_xml();

$tyres = new VianorTyres();
$tyres->get_data();
$tyres->file_name = "/home/c/cf08116/public_html/downloader/vianor/tyres.xml";
$tyres->read_from_xml();