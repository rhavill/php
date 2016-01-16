<?php

require_once './Creator.php';
require_once './ConcreteCreator.php';

class Client
{
    private $creator;

    public function __construct(Creator $creator)
    {
        $this->creator = $creator;
    }

    public function run() {
        $this->creator->operation();
    }
}

$creator = new ConcreteCreator();
$client = new Client($creator);
$client->run();