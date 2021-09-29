<?php

class Tochki4Wheels extends Wheels
{

    public function __construct()
    {
        parent::__construct();
        $this->add_log_row(__CLASS__);
    }

    public function read_from_json() {
        $file_handle = fopen($this->file_name, "r");
        $file_content = fread($file_handle, filesize($this->file_name));
        $json = json_decode($file_content);
        foreach ($json->rims as $rim) {

            $this->database_fields['source'] = __CLASS__;
            $this->database_fields["brand"] = $rim->brand;
            $this->database_fields["model"] = $rim->model;
            $this->database_fields["type"] = $rim->rim_type;
            $this->database_fields["diameter"] = $rim->diameter;
            $this->database_fields["color"] = $rim->color;

            $this->database_fields["pn"] = $rim->bolts_count;
            $this->database_fields["pcd"] = $rim->dia;
            $this->database_fields["et"] = $rim->et;
            $this->database_fields["price"] = $rim->price_sk4;
            $this->database_fields["price_retail"] = $rim->price_sk4_rozn;
            $this->database_fields["photo_url"] = $rim->img_big_pish;
            $this->add_database();
            $this->clear_value();
        }
    }
}