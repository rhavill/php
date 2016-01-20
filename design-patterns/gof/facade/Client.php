<?php

require_once './Facade.php';

class Client
{
    private $facade;

    public function __construct()
    {
        $this->facade = new Facade();
    }

    public function run() {
        $this->facade->doStuff();
        $this->facade->doSomething();
        $this->facade->doSomething(FALSE);
    }
}

$client = new Client();
$client->run();