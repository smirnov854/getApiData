<?php


class TerminalYstWheels extends Wheels
{
    public function get_data()
    {
        $wheels = "https://terminal.yst.ru/api/xml/disk/json/d6cd4b8c-5895-41cb-9f9a-66d944c60b7c";
        file_put_contents("/home/c/cf08116/public_html/downloader/data/terminal_yst/wheels.json", file_get_contents($wheels));
    }


}