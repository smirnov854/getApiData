<?php

require_once "Tyres/TreckTyreTyres.php";

$tyres = new TreckTyreTyres();

$tyres->get_data();
$tyres->file_name = "/home/c/cf08116/public_html/downloader/trektyre/tyres.xml";
$tyres->read_from_xml();