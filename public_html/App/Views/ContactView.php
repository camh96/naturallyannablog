<?php

namespace App\Views;

class ContactView extends View
{

    public function __construct()
    {
    }

    public function render()
    {
        $page = "contact";
        $page_title = "Contact Me";
        include "templates/master.inc.php";
    }

    public function content()
    {
        include "templates/contact.inc.php";
    }
}
