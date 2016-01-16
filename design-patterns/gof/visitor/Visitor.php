<?php

require_once './ConcreteElementA.php';
require_once './ConcreteElementB.php';

abstract class Visitor
{
    abstract public function visitConcreteElementA(ConcreteElementA $a);

    abstract public function visitConcreteElementB(ConcreteElementB $b);
}