<?php

namespace App\Models;

class Recipe extends DatabaseModel {

	protected static $columns = ['id', 'name', 'stock', 'description', 'price', 'image'];

	protected static $tableName = "merchandise";

}