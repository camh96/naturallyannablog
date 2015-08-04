<?php

namespace App\Models;

class Recipe extends DatabaseModel {

	protected static $columns = ['id', 'title', 'ingredients', 'process', 'img'];

	protected static $tableName = "recipes";

}