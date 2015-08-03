<?php

namespace App\Views;

class SuggestEmailView extends EmailView
{

    public function render()
    {
        $this->sendEmail("templates/suggesteremail.inc.php");
    }
}
