<?php

class VianorTyres extends Tyres
{
    public function __construct()
    {
        parent::__construct();
        $this->add_log_row(__CLASS__);
    }
    public function get_data() {
        $tyres = "https://b2b.vianor-tyres.ru/online/catalog/products.xml?token=fe4e503cabac580d6af478952639c4e9&tire=true&wheel=false&truck-tire=false&truck-wheel=false";        
        file_put_contents("/home/c/cf08116/public_html/downloader/data/vianor/tyres.xml",file_get_contents($tyres));
    }

    public function read_from_xml() {
        $xml = simplexml_load_file($this->file_name);
        foreach ($xml->products->tire as $tire) {

            $this->database_fields['source'] = __CLASS__;
            $this->database_fields["brand"] = htmlentities((string)$tire->brand);
            $this->database_fields["model"] = htmlentities((string)$tire->model);
            $this->database_fields["diameter"] = "R" . htmlentities((string)$tire->attributes()->D);
            $this->database_fields["season"] = htmlentities((string)$tire->attributes()->season);
            $this->database_fields["width"] = htmlentities((string)$tire->attributes()->W);
            $this->database_fields["profile"] = htmlentities((string)$tire->attributes()->H);
            $this->database_fields["speed_index"] = htmlentities((string)$tire->attributes()->SI);
            $this->database_fields["load_index"] = htmlentities((string)$tire->attributes()->LI);
            $this->database_fields["pins"] = htmlentities((string)$tire->attributes()->stud);
            $this->database_fields["runflat"] = htmlentities((string)$tire->attributes()->run_flat) == "true" ? "Y" : "N";
            $this->add_database();
            $this->clear_value();
        }
    }
}