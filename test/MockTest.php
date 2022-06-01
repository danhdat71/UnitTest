<?php

use PHPUnit\Framework\TestCase;
use App\Mailer;

class MockTest extends TestCase
{
    public function testMock()
    {
        $mock = $this->createMock(Mailer::class);
        $mock->method('sendMail')->willReturn(true);
        $res = $mock->sendMail('danhdat@mail.com', "Đạt học làm tester");
        $this->assertTrue($res);
    }
}