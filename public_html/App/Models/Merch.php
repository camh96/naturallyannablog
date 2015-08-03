<?php

namespace App\Models;

class Merch extends DatabaseModel
{
    
    protected static $columns = ['id','name','stock','description','price','image'];

    protected static $tableName = "merchandise";

}