<?php

$wheel = new DiscoverWheels();
$wheel->get_data();
$wheel->file_name = "/home/c/cf08116/public_html/downloader/data/discovery/tyres.xml";
$wheel->read_from_xml();

