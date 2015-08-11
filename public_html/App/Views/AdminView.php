<?php

namespace App\Views;

class AdminView extends View
{
    public function render()
    {
        extract($this->data);
        $page = "admin";
        $page_title = "Admin";
        include "templates/master.inc.php";
    }

    protected function content()
    {
        extract($this->data);
        include "templates/admin.inc.php";
    }
}

