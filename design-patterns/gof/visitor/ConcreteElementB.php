<?php

require_once './Visitor.php';
require_once './Element.php';

class ConcreteElementB extends Element
{
    public function accept(Visitor $visitor) {
        $visitor->visitConcreteElementB($this);
    }

    public function operationB() {
        print "running operationB in ConcreteElementB.\n";
    }
}