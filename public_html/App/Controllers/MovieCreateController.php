<?php

namespace App\Controllers;

use App\Views\MovieCreateView;

class MovieCreateController
{
    public function create()
    {
        $view = new MovieCreateView();
        $view->render();
    }
}
