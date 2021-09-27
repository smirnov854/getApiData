<?php
require_once "Wheels/Okno2Wheels.php";
require_once "Tyres/OknoTyres.php";

$wheel = new Okno2Wheels();
$wheel->get_data();
$wheel->file_name = "/home/c/cf08116/public_html/downloader/okno2/wheels.xml";
$wheel->read_from_xml();

$tyres = new OknoTyres();
$tyres->get_data();
$tyres->file_name = "/home/c/cf08116/public_html/downloader/okno2/tyres.xml";
$tyres->read_from_xml();