<?php

use PHPUnit\Framework\TestCase;
use App\User;

class Test extends TestCase
{
    public function testReturnFullName()
    {
        $user = new User();
        $user->firstName = "Đạt";
        $user->lastName = "Danh";

        $this->assertEquals("Danh Đạt", $user->getFullNameVn());
        $this->assertNotEquals("Danh Đạt 1", $user->getFullNameVn());
    }

    public function testEmptyByDefault()
    {
        $user = new User();
        $this->assertEmpty($user->getFullNameVn());
    }
}