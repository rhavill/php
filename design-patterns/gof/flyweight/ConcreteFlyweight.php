<?php

require_once './Flyweight.php';

class ConcreteFlyweight extends Flyweight
{
    private $intrinsicState;

    public function __construct($intrinsicState)
    {
        $this->intrinsicState = $intrinsicState;
    }

    public function getIntrinsicState() {
        return $this->intrinsicState;
    }

    public function operation($extrinsicState)
    {
        print "operaton called from ConcreteFlyweight. instrinsicState={$this->intrinsicState} extrinsicState=$extrinsicState\n";
    }
}