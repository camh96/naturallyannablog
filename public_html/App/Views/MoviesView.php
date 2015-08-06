<?php

namespace App\Views;

class MoviesView extends View {
	public function render() {

		$page       = "blog";
		$page_title = "Blog";
		include "templates/master.inc.php";
	}

	protected function content() {
		extract($this->data);
		include "templates/bloghome.inc.php";
	}

}
