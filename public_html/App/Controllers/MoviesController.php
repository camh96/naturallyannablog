<?php

namespace App\Controllers;

use App\Models\Movie;
use App\Models\Comment;
use App\Views\MoviesView;
use App\Views\SingleMovieView;
use App\Views\MovieFormView;



class MoviesController extends Controller
{
  public function index()
    {
        $p = isset($_GET['p']) ? (int)$_GET['p'] : 1;
        $pageSize = 10;
        $movies = Movie::all("title", true, $pageSize, $p);

        $recordCount = Movie::count();

        $view = new MoviesView(compact('movies', 'pageSize', 'p', 'recordCount'));
        $view->render();
    }

  public function show()
    {
        $movie = new Movie((int)$_GET['id']);
        $newcomment = $this->getCommentFormData();

        $comments = $movie->comments();
        $tags     = $movie->getTags();

        $view = new SingleMovieView(
            compact('movie', 'comments', 'newcomment', 'tags')
        );
        $view->render();
    }

    public function create()
    {
        static::$auth->mustBeAdmin();

        $movie = $this->getMovieFormData();

        $view = new MovieFormView(compact('movie'));
        $view->render();
    }

    public function store()
    {
        static::$auth->mustBeAdmin();

        $movie = new Movie($_POST);
        if (is_array($movie->tags)) {
            $movie->tags = implode($movie->tags, ",");
        }

        if (! $movie->isValid()) {
            $_SESSION['movie.form'] = $movie;

            header("Location: ./?page=movie.create");
            exit();
        }

        $movie->save();
        $movie->saveTags();

        header("Location: ./?page=movie&id=" . $movie->id);
    }

    public function edit()
    {
        static::$auth->mustBeAdmin();
        $movie = $this->getMovieFormData($_GET['id']);
        $movie->loadTags();

        $view = new MovieFormView(compact('movie', 'tags'));
        $view->render();
    }

 public function update()
    {

        static::$auth->mustBeAdmin();

        $movie = new Movie($_POST['id']);
        $movie->processArray($_POST);

        if (is_array($movie->tags)) {
            $movie->tags = implode($movie->tags, ",");
        }

        if (! $movie->isValid()) {
            $_SESSION['movie.form'] = $movie;

            header("Location: ./?page=movie.edit&id=" . $_POST['id']);
            exit();
        }

        $movie->save();
        $movie->saveTags();

        header("Location: ./?page=movie&id=" . $movie->id);

    }

    public function destroy()
    {
        static::$auth->mustBeAdmin();

        Movie::destroy($_POST['id']);

        header("Location: ./?page=movies");
    }

    private function getMovieFormData($id = null)
    {
        if (isset($_SESSION['movie.form'])) {
            $movie = $_SESSION['movie.form'];
            unset($_SESSION['movie.form']);
        } else {
            $movie = new Movie($id);
        }
        return $movie;
    }

    private function getCommentFormData($id = null)
    {
        if (isset($_SESSION['comment.form'])) {
            $comment = $_SESSION['comment.form'];
            unset($_SESSION['comment.form']);
        } else {
            $comment = new Comment($id);
        }
        return $comment;
    }
}