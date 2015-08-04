<?php

namespace App\Controllers;

use App\Models\Recipe;
use App\Views\RecipeView;

class RecipeController extends Controller {
	public function show() {
		$recipe = Recipe::all();

		$view = new RecipeView(['recipes' => $recipe]);
		$view->render();
	}
}