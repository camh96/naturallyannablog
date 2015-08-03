<?php

namespace App\Models;

class Movie
{

    private static $db;

    private static getDatabaseConnection()
    {
        if (! static::db) {
            $dsn = 'mysql:host=localhost;dbname=schlocktoberfest;charset=utf8';

            static::db = new PDO($dsn, 'root', '');

            static::db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            static::db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        }

        return static::db;
    }


    public static function all()
    {



        return $records;
    }

}