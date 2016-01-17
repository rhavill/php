<?php

require_once './Context.php';

class Client
{
    private $context;

    public function __construct()
    {
        $this->context = new Context();
    }

    public function run() {
        $this->context->request();
        $this->context->request();
        $this->context->request();
    }
}

$client = new Client();
$client->run();