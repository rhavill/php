<?php

require_once './Receiver.php';
require_once './AbstractCommand.php';
require_once './Invoker.php';

class Client
{
    private $invoker;

    public function __construct()
    {
        $receiver = new Receiver();
        $command = new AbstractCommand($receiver);
        $this->invoker = new Invoker($command);
    }

    public function run() {
        $this->invoker->invoke();
    }
}

$client = new Client();
$client->run();