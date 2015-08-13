<?php

namespace App\Views;

class UserView extends View
{
    public function render()
    {
        extract($this->data);
        $page = "user.profile";
        $page_title = "Profile for ".$user->firstName." ".$user->lastName;
        include "templates/master.inc.php";
    }

    protected function content()
    {
        extract($this->data);
        include "templates/user.inc.php";
    }
}