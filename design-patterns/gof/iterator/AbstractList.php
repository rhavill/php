<?php

abstract class AbstractList
{
    protected $list;

    abstract public function createIterator();

    abstract public function count();

    abstract public function append($item);

    abstract public function remove($item);

    abstract public function get($i);

}