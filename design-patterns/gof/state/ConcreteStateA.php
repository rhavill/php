<?php

require_once './State.php';

class ConcreteStateA extends State
{
    public function handle(Context $context)
    {
        print "ConcreteStateA state setting next state to B.\n";
        $context->setStateB();
    }
}