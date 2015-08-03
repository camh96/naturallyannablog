<?php

namespace App\Controllers;

use App\Views\AboutView;

class AboutController
{
    public function show()
    {
        $view = new AboutView();
        $view->render();
    }
}
