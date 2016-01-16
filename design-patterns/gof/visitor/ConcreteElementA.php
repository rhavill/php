<?php

require_once './Visitor.php';
require_once './Element.php';

class ConcreteElementA extends Element
{
    public function accept(Visitor $visitor) {
        $visitor->visitConcreteElementA($this);
    }

    public function operationA() {
        print "running operationA in ConcreteElementA.\n";
    }
}