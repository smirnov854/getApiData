<?php

require_once "Wheels/DiscoverWheels.php";
require_once "Tyres/DiscoverTyres.php";

$tyres = new DiscoverTyres();
$tyres->get_data();
$tyres->file_name = "/home/c/cf08116/public_html/downloader/discovery/tyres.xml";
$tyres->read_from_xml();

$wheel = new DiscoverWheels();
$wheel->file_name = "/home/c/cf08116/public_html/downloader/discovery/tyres.xml";
$wheel->read_from_xml();

