<?php

namespace App\Views;


class SingleMovieView extends View
{
    public function render() 
    {
        extract($this->data);
        $page = "singlemovie";
        $page_title = $movie->title;
        include "templates/master.inc.php";
    }

    protected function content()
    {
        extract($this->data);
        include "templates/singlemovie.inc.php";
    }


}