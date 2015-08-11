<?php

namespace App\Controllers;

use App\Models\User;
use App\Views\AdminView;

class AdminController extends Controller 
{
	public function show() 
	{
		static ::$auth->mustBeAdmin();
		$pageSize = 5;
		$users   = User::all("created", true);

		$view = new AdminView(compact('users'));
		$view->render();
	}
}