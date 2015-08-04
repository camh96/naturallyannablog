<?php

namespace App\Views;

class RecipeView extends View {
	public function render() {

		$page       = "recipes";
		$page_title = "Recipes";
		include "templates/master.inc.php";
	}

	protected function content() {
		extract($this->data);
		include "templates/recipe.inc.php";
	}

}