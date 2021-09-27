<?php

class OknoTyres extends Tyres
{
    public function get_data() {
        $tyres = "https://okno2.kolobox.ru/storage/catalog/tyres.xml";
        file_put_contents("/home/c/cf08116/public_html/downloader/okno2/tyres.xml",file_get_contents($tyres));
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

    public function get_token(){
        $url = "https://okno2.kolobox.ru/api/oauth/token";

        $post_data = [
            ""
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

        $output = curl_exec($ch);
        curl_close($ch);

        var_dump($output);
    }



}