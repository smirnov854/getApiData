<?php

class Okno2Wheels extends Wheels
{
    public function __construct()
    {
        parent::__construct();
        $this->add_log_row(__CLASS__);
    }

    public function get_data() {
        $tyres = "http://okno2.kolobox.ru/storage/catalog/rims.xml";
        file_put_contents("/home/c/cf08116/public_html/downloader/data/okno2/wheels.xml",file_get_contents($tyres));
    }


    public function read_from_xml() {
        $xml = simplexml_load_file($this->file_name);
        foreach ($xml->product as $tire) {


            $this->database_fields['source'] = __CLASS__;
            $this->database_fields["brand"] = htmlentities((string)$wheel->brand);
            $this->database_fields["model"] = htmlentities((string)$wheel->model);
            $this->database_fields["color"] = htmlentities((string)$wheel->attributes()->color);
            $this->database_fields["diameter"] = htmlentities((string)$wheel->attributes()->D) . " / " . htmlentities((string)$wheel->attributes()->W);
            $this->database_fields["et"] = htmlentities((string)$wheel->attributes()->ET);
            $this->database_fields["pn"] = explode("x", htmlentities((string)$wheel->attributes()->PCD))[0];
            $this->database_fields["pcd"] = explode("x", htmlentities((string)$wheel->attributes()->PCD))[1];


            $this->add_database();
            $this->clear_value();
        }
    }


}