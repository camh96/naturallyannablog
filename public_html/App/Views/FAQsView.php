<?php

namespace App\Views;

class FAQsView extends View {

	public function __construct() {
	}

	public function render() {
		$page       = "faqs";
		$page_title = "Frequently Asked Questions";
		include "templates/master.inc.php";
	}

	public function content() {
		include "templates/faqs.inc.php";
	}
}
