<?php

namespace App\Views;

class BannedView extends View
{

    public function __construct()
    {
    }

    public function render()
    {
        $page = "banned";
        $page_title = "You have been banned";
        include "templates/master.inc.php";
    }

    public function content()
    {
        include "templates/banned.inc.php";
    }
}
