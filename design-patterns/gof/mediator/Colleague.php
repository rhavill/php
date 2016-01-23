<?php

require_once './Mediator.php';

abstract class Colleague
{
    protected $mediator;

    public function __construct(Mediator $mediator)
    {
        $this->mediator = $mediator;
    }

    public function changed() {
        $this->mediator->colleagueChanged($this);
    }
}