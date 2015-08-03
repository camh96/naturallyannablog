<?php

namespace App\Views;

class SuccessSuggestView
{

    public function __construct()
    {
    }

    public function render()
    {
        $page = "SuggestView";
        $page_title = "Submission successful!";
        include "templates/master.inc.php";
    }

    public function content()
    {
        include "templates/success.inc.php";
    }
}
