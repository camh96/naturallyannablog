<?php

namespace App\Views;

class Error404View extends View
{

    public function __construct()
    {
    }

    public function render()
    {
        $page = "movies";
        $page_title = "404 - Not Found";
        include "templates/master.inc.php";
    }

    public function content()
    {
        include "templates/404.inc.php";
    }
}
