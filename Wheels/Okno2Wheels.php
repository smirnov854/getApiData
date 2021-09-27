<?php

class Okno2Wheels extends Wheels
{
    public function get_data() {
        $tyres = "https://okno2.kolobox.ru/storage/catalog/rims.xml";
        file_put_contents("/home/c/cf08116/public_html/downloader/okno2/wheels.xml",file_get_contents($tyres));
    }
}