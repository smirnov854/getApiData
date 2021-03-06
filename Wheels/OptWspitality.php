<?php

class OptWspitality extends Wheels
{

    public function __construct()
    {
        parent::__construct();
        $this->add_log_row(__CLASS__);
    }

    public function get_data() {
        $tyres = "https://wspitaly.ru/1c_price/stock_list_wspitaly.xls";
        file_put_contents("/home/c/cf08116/public_html/downloader/data/opt_wspitaly/tyres.xls",file_get_contents($tyres));
    }

    public function read_from_xls(){
        require_once "./vendor/autoload.php";

        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($this->file_name);
        $spreadsheet = $spreadsheet->getActiveSheet();
        $data_array =  $spreadsheet->toArray();
        foreach($data_array as $key=>$row){
            if($key==0){
                continue;
            }
            $this->database_fields['source'] = __CLASS__;
            $this->database_fields["brand"] = $row[0];
            $this->database_fields["name"] = $row[3];
            $this->database_fields["model"] = $row[4];

            $this->database_fields["type"] = "легковые";
            $this->database_fields["diameter"] = $row[10];
            $this->database_fields["color"] = $row[11];

            $this->database_fields["pcd"] = $row[8];
            $this->database_fields["et"] = $row[9];
            $this->database_fields["price"] = $row[14];
            $this->database_fields["price_retail"] = $row[12];
            $this->database_fields["photo_url"] = $row[17];
            $this->add_database();
            $this->clear_value();
        }
    }
}