<?php

class Logger extends Database_worker
{
    public static $table = "parsing_logger";

    static public function add_log_row($table,$source,$class_name){
        $insert_array =[
            "date"=>date("d.m.Y H:i:s"),
            "insert_table"=>$table,
            "pseudo_name"=>$source,
            "class"=>$class_name,
        ];
        var_dump($insert_array);
        self::insert(self::$table,$insert_array);
    }
}