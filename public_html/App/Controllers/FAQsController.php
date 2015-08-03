<?php

namespace App\Controllers;
use App\Views\FAQsView;

class FAQsController extends Controller {

	public function show() {
		$view = new FAQsView();
		$view->render();
	}

}