<?php

namespace App\Views;

class Error403View extends View {

	public function __construct() {
	}

	public function render() {
		$page       = "movies";
		$page_title = "403 - Forbidden";
		include "templates/master.inc.php";
	}

	public function content() {
		include "templates/403.inc.php";
	}
}
