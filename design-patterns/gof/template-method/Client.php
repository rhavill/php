<?php

require_once './ConcreteClass.php';

class Client
{
    private $class;
    public function __construct()
    {
        $this->class = new ConcreteClass();
    }
    public function run() {
        $this->class->templateMethod();
    }
}

$client = new Client();
$client->run();