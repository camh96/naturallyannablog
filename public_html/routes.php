<?php

use App\Controllers\AboutController;
use App\Controllers\AuthenticationController;
use App\Controllers\CommentsController;
use App\Controllers\ErrorController;
use App\Controllers\FAQsController;
use App\Controllers\HomeController;
use App\Controllers\MoviesController;
use App\Controllers\MovieSuggestController;
use App\Controllers\RecipeController;
use App\Models\Exceptions\ModelNotFoundException;
use App\Services\Exceptions\InsufficientPrivilegesException;

$page = isset($_GET['page'])?$_GET['page']:'home';

try {

	switch ($page) {
		case "home":

			$controller = new HomeController();
			$controller->show();

			break;

		case "login":

			$controller = new AuthenticationController();
			$controller->login();

			break;

		case "faqs":

			$controller = new FAQsController();
			$controller->show();

			break;

		case "auth.attempt":

			$controller = new AuthenticationController();
			$controller->attempt();

			break;

		case "register":

			$controller = new AuthenticationController();
			$controller->register();

			break;

		case "auth.store":

			$controller = new AuthenticationController();
			$controller->store();

			break;

		case "logout":

			$controller = new AuthenticationController();
			$controller->logout();

			break;

		case "about":

			$controller = new AboutController();
			$controller->show();

			break;

		case "contact":

			$controller = new ContactController();
			$controller->show();

			break;

		case "recipes":

			$controller = new RecipeController();
			$controller->show();

			break;

		case "blog":

			$controller = new MoviesController();
			$controller->index();

			break;

		case "movie":

			$controller = new MoviesController();
			$controller->show();

			break;

		case "movie.create":

			$controller = new MoviesController();
			$controller->create();

			break;

		case "movie.store":

			$controller = new MoviesController();
			$controller->store();

			break;

		case "movie.edit":

			$controller = new MoviesController();
			$controller->edit();

			break;

		case "movie.update":

			$controller = new MoviesController();
			$controller->update();

			break;

		case "movie.destroy":

			$controller = new MoviesController();
			$controller->destroy();

			break;

		case "comment.create":

			$controller = new CommentsController();
			$controller->create();

			break;

		case "moviesuggest":

			$controller = new MovieSuggestController();
			$controller->show();

			break;

			// case "users":

			// 	$controller = new UsersController();
			// 	$controller->index();

			// 	break;

			// case "user":

			// 	$controller = new UsersController();
			// 	$controller->show();

			// 	break;

		default:

			throw new ModelNotFoundException();

			break;
	}

} catch (ModelNotFoundException $e) {

	$controller = new ErrorController();
	$controller->error404();

} catch (InsufficientPrivilegesException $e) {

	$controller = new ErrorController();
	$controller->error401();

} catch (Exception $e) {

	$controller = new ErrorController();
	$controller->error500($e);

}