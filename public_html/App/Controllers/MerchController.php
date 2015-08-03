<?php

namespace App\Controllers;

use App\Models\Merch;
use App\Views\MerchView;

class MerchController extends Controller
{
    public function show()
    {
        $merchandise = Merch::all();

        $view = new MerchView(['merchandise' => $merchandise]);
        $view->render();
    }
}