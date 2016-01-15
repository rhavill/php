<?php

require_once './ConcreteImplementorA.php';
require_once './ConcreteImplementorB.php';
require_once './RefinedAbstraction.php';

class Client
{
    private $abstraction;
    public function __construct()
    {
        $implementorClass = 'B';
        $class = 'ConcreteImplementor' . $implementorClass;
        $implementor = new $class();
        $this->abstraction = new RefinedAbstraction($implementor);
    }
    public function output() {
        print $this->abstraction->refinedOperation() . "\n";
    }
}

$client = new Client();
$client->output();