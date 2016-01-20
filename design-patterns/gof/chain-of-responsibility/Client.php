<?php

require_once './ConcreteHandler1.php';
require_once './ConcreteHandler2.php';

class Client
{
    private $chain;

    public function __construct()
    {
        $handler = new ConcreteHandler1(new ConcreteHandler2());
        $this->chain = $handler;
    }

    public function run() {
        $this->chain->handleRequest(1);
        $this->chain->handleRequest(2);
        $this->chain->handleRequest(3);
    }
}

$client = new Client();
$client->run();