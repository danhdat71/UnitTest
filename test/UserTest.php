<?php

use App\Mailer;
use PHPUnit\Framework\TestCase;
use App\User;

class UserTest extends TestCase
{
    public function testEqual()
    {
        $this->assertEquals(1, 1);
    }

    public function testReturnFullName()
    {
        $user = new User();
        $user->firstName = "Đạt";
        $user->lastName = "Danh";

        $this->assertEquals("Danh Đạt", $user->getFullNameVn());
        $this->assertNotEquals("Danh Đạt 1", $user->getFullNameVn());
    }

    public function test_empty_string()
    {
        $user = new User();
        $this->assertEmpty($user->getFullNameVn());
    }

    public function testNotifyIsSent()
    {
        $user = new User();
        $mockMailer = $this->createMock(Mailer::class);
        $mockMailer->method('sendMail')->willReturn(true);
        $user->setMailer($mockMailer);
        $user->email = "dat@mail.com";
        $this->assertTrue($user->notify("Xin chào !"));
    }
}