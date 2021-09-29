<?php


class TerminalYstTyres extends Tyres
{
    public function get_data()
    {
        $tyres = "https://terminal.yst.ru/api/xml/tyre/json/d6cd4b8c-5895-41cb-9f9a-66d944c60b7c";
        file_put_contents("/home/c/cf08116/public_html/downloader/data/terminal_yst/tyres.json", file_get_contents($tyres));
    }

    public function read_from_json() {
        $file_handle = fopen($this->file_name, "r");
        $file_content = fread($file_handle, filesize($this->file_name));
        $json = json_decode($file_content);
        foreach ($json->tires as $tire) {
            $this->database_fields['source'] = __CLASS__;
            $this->database_fields['type'] = $tire->tiretype;
            $this->database_fields["brand"] = $tire->brand;
            $this->database_fields["model"] = $tire->model;
            $this->database_fields["diameter"] = $tire->diameter;
            $this->database_fields["season"] = $tire->season == "Зимняя" ? "W" : "S";
            $this->database_fields["width"] = $tire->width;
            $this->database_fields["profile"] = $tire->height;
            $this->database_fields["speed_index"] = $tire->speed_index;
            $this->database_fields["load_index"] = $tire->load_index;
            $this->database_fields["photo_url"] = $tire->img_big_pish;
            $this->database_fields["price"] = $tire->price;
            $this->database_fields["price_retail"] = $tire->price_mkrs;
            $this->database_fields["runflat"] = $tire->runflat == "Да" ? "Y" : "N";
            $this->add_database();
            $this->clear_value();
        }
    }


}
