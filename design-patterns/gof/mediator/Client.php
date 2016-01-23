<?php

require_once './Mediator.php';

class Client
{
    private $mediator;

    public function __construct()
    {
        $this->mediator = new Mediator();
    }

    public function run() {
        $this->mediator->getColleague1()->setState(23);
    }
}

$client = new Client();
$client->run();