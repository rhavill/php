<?php

require_once './Subject.php';

class ConcreteSubject extends Subject
{
    private $state;

    public function getState() {
        return $this->state;
    }

    public function setState($state) {
        $this->state = $state;
    }
}