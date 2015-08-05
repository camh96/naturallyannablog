<?php

namespace App\Controllers;

use App\Views\ContactView;

class ContactController
{
    public function show()
    {
        $view = new ContactView();
        $view->render();
    }
}
