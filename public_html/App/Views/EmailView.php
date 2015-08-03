<?php

namespace App\Views;

use Mailgun\Mailgun;

abstract class EmailView extends View
{

    public function sendEmail($templateFile)
    {

        extract($this->data);
        $mgClient = new Mailgun(MAILGUN_KEY);
        $domain = MAILGUN_DOMAIN;

        ob_start();
        
        include $templateFile;
        
        $emailBody = ob_get_clean();

        
        
          // # Instantiate the client.
    

       # Make the call to the client.
        # Make the call to the client.
        $result = $mgClient->sendMessage($domain, array(
            'from'    => $emailHeaders['from'],
            'to'      => $emailHeaders['to'],
            'subject' => $emailHeaders['subject'],
            'text'       => $emailBody
        ));

    }
}
