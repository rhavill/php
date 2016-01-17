<?php

require_once './AbsctactClass.php';

class ConcreteClass extends AbsctactClass
{
    public function operation1()
    {
        print "operation1 called in ConcreteClass.\n";
    }

    public function operation2()
    {
        print "operation2 called in ConcreteClass.\n";
    }
}