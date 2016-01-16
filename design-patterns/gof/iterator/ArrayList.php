<?php

require_once './AbstractList.php';
require_once './MyArrayIterator.php';

class ArrayList extends AbstractList
{

    public function __construct(array $list = array())
    {
        $this->list = $list;
    }

    public function createIterator()
    {
        return new MyArrayIterator($this);
    }

    public function count()
    {
        return count($this->list);
    }

    public function append($item)
    {
        $this->list[] = $item;
    }

    public function remove($item)
    {
        $newList = array();
        for ($i = 0; $i < count($this->list); $i++) {
            if ($item !== $this->list[$i]) {
                $newList[] = $this->list[$i];
            }
        }
        $this->list = $newList;
    }

    public function get($i) {
        if (isset($this->list[$i])) {
            return $this->list[$i];
        }
        return NULL;
    }
}