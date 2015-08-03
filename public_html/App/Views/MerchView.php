<?php

namespace App\Views;

class MerchView extends View
{
    public function render() 
    {
        
        $page = "merchandise";
        $page_title = "Merchandise";
        include "templates/master.inc.php";
    }

    protected function content()
    {
        extract($this->data);
        include "templates/merch.inc.php";
    }


}