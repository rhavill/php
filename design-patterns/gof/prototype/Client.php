<?php

require_once './ConcretePrototype1.php';
require_once './ConcretePrototype2.php';

class Client
{
    private $prototype1;
    private $prototype2;

    public function __construct()
    {
        $this->prototype1 = new ConcretePrototype1('first');
        $this->prototype2 = new ConcretePrototype2(1);
    }

    public function run() {
        $clone1 = $this->prototype1->makeClone();
        $clone1->setName('second');
        print $this->prototype1->getName() . "\n";
        print $clone1->getName() . "\n";

        $clone2 = $this->prototype2->makeClone();
        $clone2->setId(2);
        print $this->prototype2->getId() . "\n";
        print $clone2->getId() . "\n";
    }
}

$client = new Client();
$client->run();