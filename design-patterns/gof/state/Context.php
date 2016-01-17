<?php

require_once './ConcreteStateA.php';
require_once './ConcreteStateB.php';

class Context
{
    private $state;
    private $stateA;
    private $stateB;

    public function __construct()
    {
        $this->stateA = new ConcreteStateA();
        $this->stateB = new ConcreteStateB();
        $this->state = $this->stateA;
    }

    public function setStateA() {
        $this->state = $this->stateA;
    }
    public function setStateB() {
        $this->state = $this->stateB;
    }

    public function request() {
        $this->state->handle($this);
    }
}