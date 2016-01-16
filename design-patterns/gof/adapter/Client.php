<?php

require_once './Adapter.php';
require_once './Adaptee.php';

class Client
{
    private $adapter;

    public function __construct()
    {
        $adaptee = new Adaptee();
        $this->adapter = new Adapter($adaptee);
    }

    public function output() {
        print $this->adapter->request() . "\n";
    }
}

$client = new Client();
$client->output();