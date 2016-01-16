<?php

require_once './AbstractList.php';

abstract class AbstractIterator
{
    protected $list;

    public function __construct(AbstractList $list)
    {
        $this->list = $list;
    }

    abstract public function first();

    abstract public function next();

    abstract public function isDone();

    abstract public function currentItem();

}