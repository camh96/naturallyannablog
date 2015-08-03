<?php

namespace App\Views;

class AdminEmailView extends EmailView
{

    public function render()
    {
        $this->sendEmail("templates/adminemail.inc.php");
    }
}
