<?php

namespace App\Controllers;

use App\Models\User;
use App\Views\AdminView;
use App\Views\UserView;

class AdminController extends Controller 
{
	public function index() 
	{
		static ::$auth->mustBeAdmin();
		$users   = User::all("created", true);

		$view = new AdminView(compact('users'));
		$view->render();
	}


	public function show() {
		$user       = new User((int) $_GET['id']);

		$view = new UserView(compact('user'));
		$view->render();
	}

}