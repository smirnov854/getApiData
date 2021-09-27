<?php
require_once "Wheels/OptWspitality.php";

$wheel = new OptWspitality();
$wheel->get_data();
$wheel->file_name = "/home/c/cf08116/public_html/downloader/opt_wspitaly/tyres.xls";
$wheel->read_from_xls();