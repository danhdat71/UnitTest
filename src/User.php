<?php

namespace App;

use App\Mailer;
class User
{
    public $firstName = null;
    public $lastName = null;
    public $email = null;
    public $mailer = null;

    public function __construct($firstName = null, $lastName = null)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function getFullNameVn()
    {
        return (isset($this->firstName) && isset($this->lastName))
            ? $this->lastName . " " . $this->firstName
            : null;
    }

    public function setMailer(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function notify($message)
    {
        return $this->mailer->sendMail($this->email, $message);
    }
}