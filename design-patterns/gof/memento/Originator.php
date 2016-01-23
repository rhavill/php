<?php

require_once './Memento.php';

class Originator
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

    public function createMemento() {
        return new Memento($this->state);
    }

    public function setMemento(Memento $memento) {
        $this->state = $memento->getState();
    }
}