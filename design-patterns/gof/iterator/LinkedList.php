<?php

require_once './AbstractList.php';
require_once './LinkedListIterator.php';

class LinkedList extends AbstractList
{
    private $count = 0;
    private $last = NULL;

    public function __construct(array $list)
    {
        $this->list = $previousItem = NULL;
        for ($i = 0; $i < count($list); $i++) {
            $item = new stdClass();
            $item->next = NULL;
            $item->name = $list[$i];
            if ($i == 0) {
                $this->list = $item;
            }
            else {
                $previousItem->next = $item;
            }
            $previousItem = $item;
            $this->last = $item;
            $this->count++;
        }
    }

    public function createIterator()
    {
        return new LinkedListIterator($this);
    }

    public function count()
    {
        return $this->count;
    }

    public function append($name)
    {
        $item = new stdClass();
        $item->next = NULL;
        $item->name = $name;
        if ($this->count) {
            $this->last->next = $item;
        }
        else {
            $this->list = $item;
        }
        $this->last = $item;
        $this->count++;
    }

    public function remove($name)
    {
        $item = $this->list;
        $previous = NULL;
        while ($item !== NULL) {
            if ($item->name == $name) {
                if ($item === $this->list) {
                    $this->list = $item->next;
                }
                if ($item->next == NULL) {
                    $this->last = $item;
                }
                if ($previous) {
                    $previous->next = $item->next;
                }
                $this->count--;
            }
            $previous = $item;
            $item = $item->next;
        }

    }

    public function get($i) {
        $item = $this->list;
        $count = 0;
        while ($count <= $i && $item != NULL) {
            if ($count == $i) {
                return $item;
            }
            $item = $item->next;
            $count++;
        }
        return NULL;
    }

}