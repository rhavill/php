<?php

require_once './Flyweight.php';

class UnsharedConcreteFlyweight extends Flyweight
{
    private $allState;
    private $intrinsicState;

    public function __construct($intrinsicState)
    {
        $this->intrinsicState = $intrinsicState;
    }

    public function setAllState($allState) {
        $this->allState = $allState;
    }

    public function operation($extrinsicState)
    {
        print "operaton called from UnsharedConcreteFlyweight. instrinsicState={$this->intrinsicState} extrinsicState=$extrinsicState allState={$this->allState}\n";
    }
}