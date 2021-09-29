<?php

$tyres = new VianorTyres();
$tyres->get_data();
$tyres->file_name = "/home/c/cf08116/public_html/downloader/data/vianor/tyres.xml";
$tyres->read_from_xml();