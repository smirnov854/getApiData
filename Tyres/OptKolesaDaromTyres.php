<?php

class OptKolesaDaromTyres extends Tyres
{
    public function __construct()
    {
        parent::__construct();
        $this->add_log_row(__CLASS__);
    }
    public function read_from_json()
    {
        $file_handle = fopen($this->file_name, "r");
        $file_content = fread($file_handle, filesize($this->file_name));
        $json = json_decode($file_content);
        foreach ($json as $rim) {
            if ($rim->group != "Автошина") {
                continue;
            }
            $this->database_fields['source'] = __CLASS__;
            $this->database_fields["brand"] = $rim->maker;
            $this->database_fields["name"] = $rim->name;
            $this->database_fields["price"] = $rim->priceOpt;
            $this->database_fields["price_retail"] = $rim->price;

            $this->add_database();
            $this->clear_value();
        }
    }
}