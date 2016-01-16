<?php

require_once './ConcreteElementA.php';
require_once './ConcreteElementB.php';
require_once './ConcreteVisitor1.php';
require_once './ConcreteVisitor2.php';

class Client
{
    private $elementA;
    private $elementB;
    private $visitor1;
    private $visitor2;

    public function __construct()
    {
        $this->elementA = new ConcreteElementA();
        $this->elementB = new ConcreteElementB();
        $this->visitor1 = new ConcreteVisitor1();
        $this->visitor2 = new ConcreteVisitor2();
    }

    public function run() {
        $this->elementA->accept($this->visitor1);
        $this->elementA->accept($this->visitor2);
        $this->elementB->accept($this->visitor1);
        $this->elementB->accept($this->visitor2);
    }
}

$client = new Client();
$client->run();