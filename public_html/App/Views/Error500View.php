<?php

namespace App\Views;

class Error500View extends View
{
    public function render()
    {
        $page = "error500";
        $page_title = "500 - Internal Server Error";
        include "templates/master.inc.php";
    }

    protected function content()
    {
        extract($this->data);
        include "templates/500.inc.php";
    }
}