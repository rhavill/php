<?php


require_once './AbstractIterator.php';

class LinkedListIterator extends AbstractIterator
{
    private $currentItem;

    public function first()
    {
        if ($this->list->count()) {
            $this->currentItem = $this->list->get(0);
        }
        else {
            $this->currentItem = NULL;
        }
    }

    public function next()
    {
        if ($this->currentItem != NULL) {
            $this->currentItem = $this->currentItem->next;
        }
    }

    public function isDone()
    {
        return $this->currentItem == NULL;
    }

    public function currentItem()
    {
        return isset($this->currentItem->name) ? $this->currentItem->name : NULL;
    }

}