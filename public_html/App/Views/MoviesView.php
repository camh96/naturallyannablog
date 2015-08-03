<?php

namespace App\Views;

class MoviesView extends View
{
    public function render() 
    {
        
        $page = "movies";
        $page_title = "Movies";
        include "templates/master.inc.php";
    }

    protected function content()
    {
        extract($this->data);
        include "templates/movies.inc.php";
    }


}