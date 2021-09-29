<?php

$tyres = new DiscoverTyres();
$tyres->get_data();
$tyres->file_name = "/home/c/cf08116/public_html/downloader/data/discovery/tyres.xml";
$tyres->read_from_xml();