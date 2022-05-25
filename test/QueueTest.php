<?php

use PHPUnit\Framework\TestCase;
use App\Queue;

class QueueTest extends TestCase
{
    protected $queueClass;

    public function setUp() : void
    {
        $this->queueClass = new Queue;
    }

    public function tearDown() : void
    {
        unset($this->queueClass);
    }

    public function testNewQueueIsEmpty()
    {
        $this->assertEquals(0, $this->queueClass->getCount());
    }

    public function testAnItemIsAddedToTheQueue()
    {
        $this->queueClass->push("Green");
        $this->assertEquals(1, $this->queueClass->getCount());
    }

    public function testPopIsSuccess()
    {
        $this->queueClass->push("green");
        $this->queueClass->pop();
        $this->assertEmpty($this->queueClass->items);
    }

    public function testCount2Items()
    {
        $this->queueClass->push("green");
        $this->queueClass->push("red");
        $this->assertEquals(2, $this->queueClass->getCount());

        #return $this->queueClass->getCount();
    }
}