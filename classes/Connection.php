<?php

class Connection
{
    public static function make($config): mysqli
    {
        try {
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            return new mysqli(
                $config['db_host'],
                $config['db_user'],
                $config['db_pass'],
                $config['db_name']
            );
        } catch (Exception $e){
            die('Error: ' . $e->getMessage());
        }
    }
}