<?php

namespace App\Views;

class Error401View extends View
{

    public function __construct()
    {
    }

    public function render()
    {
        $page = "movies";
        $page_title = "401 - Unauthorised";
        include "templates/master.inc.php";
    }

    public function content()
    {
        include "templates/401.inc.php";
    }
}
