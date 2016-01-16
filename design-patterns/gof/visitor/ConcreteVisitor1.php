<?php

require_once './ConcreteElementA.php';
require_once './ConcreteElementB.php';
require_once './Visitor.php';

class ConcreteVisitor1 extends Visitor
{
    public function visitConcreteElementA(ConcreteElementA $a) {
        print "ConcreteVisitor1 visiting ConcreteElementA\n";
        $a->operationA();
    }

    public function visitConcreteElementB(ConcreteElementB $b) {
        print "ConcreteVisitor1 visiting ConcreteElementB\n";
        $b->operationB();
    }
}