<?php

namespace App;

use App\QueueException;

class Queue
{
    public $items = [];

    public const MAX_ITEMS = 5;

    public function push($item)
    {
        if($this->getCount() == static::MAX_ITEMS){
            throw new QueueException("Queue đầy !");
        }
        $this->items[] = $item;
    }

    public function pop()
    {
        return array_pop($this->items);
    }

    public function shift()
    {
        return array_shift($this->items);
    }

    public function clear()
    {
        $this->items = [];
    }

    public function getCount()
    {
        return count($this->items);
    }
}