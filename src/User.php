<?php

namespace App;

class User
{
    public $firstName = null;
    public $lastName = null;

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
}