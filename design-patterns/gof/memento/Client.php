<?php

require_once './Caretaker.php';

class Client
{
    private $caretaker;

    public function __construct()
    {
        $this->caretaker = new Caretaker();
    }

    public function run() {
        $this->caretaker->run();
    }
}

$client = new Client();
$client->run();