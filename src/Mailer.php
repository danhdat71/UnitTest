<?php

namespace App;

class Mailer
{
    public function sendMail($email, $message)
    {
        sleep(2);
        echo "send $message to $email";
        return true;
    }
}