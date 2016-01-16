<?php


require_once './AbstractIterator.php';

class MyArrayIterator extends AbstractIterator
{
    private $currentItemIndex;

    public function first()
    {
        $this->currentItemIndex = 0;
    }

    public function next()
    {
        if ($this->currentItemIndex < $this->list->count()) {
            $this->currentItemIndex++;
        }
    }

    public function isDone()
    {
        return $this->currentItemIndex >= $this->list->count();
    }

    public function currentItem()
    {
        return $this->list->get($this->currentItemIndex);
    }

}