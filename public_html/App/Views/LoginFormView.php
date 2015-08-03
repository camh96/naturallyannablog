<?php

namespace App\Views;

class LoginFormView extends View
{
   public function render()
   {
       extract($this->data);
       $page = "auth.login";
       $page_title = "Login User";
       include "templates/master.inc.php";
   }

   protected function content()
   {
       extract($this->data);
       include "templates/login.inc.php";
   }
}