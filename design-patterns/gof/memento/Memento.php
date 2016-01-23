<?php

class Memento
{
    private $state;

    public function __construct($state)
    {
        $this->state = $state;
    }

    public function getState() {
        return $this->state;
    }

    public function setState($state) {
        $this->state = $state;
    }
}