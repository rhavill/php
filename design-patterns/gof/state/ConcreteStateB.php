<?php

require_once './State.php';

class ConcreteStateB extends State
{
    public function handle(Context $context)
    {
        print "ConcreteStateB state setting next state to A.\n";
        $context->setStateA();
    }
}