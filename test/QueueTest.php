<?php

use PHPUnit\Framework\TestCase;
use App\Queue;
use App\QueueException;

class QueueTest extends TestCase
{
    protected static $queueStatic;
    protected $queueNonStatic;

    public function setUp() : void
    {
        $this->queueNonStatic = new Queue;
        static::$queueStatic->clear();
    }

    public function tearDown() : void
    {
        unset($this->queueNonStatic);
    }

    public static function setUpBeforeClass(): void
    {
        static::$queueStatic = new Queue;
    }

    public static function tearDownAfterClass(): void
    {
        static::$queueStatic = null;
    }

    public function testNewQueueIsEmpty()
    {
        $this->assertEquals(0, static::$queueStatic->getCount());
    }

    public function testAnItemIsAddedToTheQueue()
    {
        $this->queueNonStatic->push("Green");
        $this->assertEquals(1, $this->queueNonStatic->getCount());
    }

    public function testPopIsSuccess()
    {
        $this->queueNonStatic->push("green");
        $this->queueNonStatic->pop();
        $this->assertEmpty($this->queueNonStatic->items);
    }

    public function testCount2Items()
    {
        $this->queueNonStatic->push("green");
        $this->queueNonStatic->push("red");
        $this->assertEquals(2, $this->queueNonStatic->getCount());
    }

    public function testAnItemRemovedFrontTheFrontOfTheQueue()
    {
        $this->queueNonStatic->push('first');
        $this->queueNonStatic->push('second');

        $this->assertEquals('first', $this->queueNonStatic->shift());
    }

    public function testMaxNumberOfItemsCanBeAdded()
    {
        for($i = 0; $i < Queue::MAX_ITEMS; $i++){
            $this->queueNonStatic->push($i);
        }

        $this->assertEquals(Queue::MAX_ITEMS, $this->queueNonStatic->getCount());
    }

    //Test exception được ném ra sau khi queue đầy
    public function testExceptionDuocNemRaSauKhiQueueBiDay()
    {
        for($i = 0; $i < Queue::MAX_ITEMS; $i++){
            $this->queueNonStatic->push($i);
        }
        //Hàm expectException để check messages của hàm push khi queue đầy
        $this->expectException(QueueException::class);
        //Test messages queue đầy
        $this->expectExceptionMessage("Queue đầy !");
        $this->queueNonStatic->push("Phần tử khiến queue bị đầy");
    }
}