<?php

namespace App\Controllers;

use App\Views\BannedView;

class BannedController
{
    public function show()
    {
        $view = new BannedView();
        $view->render();
    }
}
