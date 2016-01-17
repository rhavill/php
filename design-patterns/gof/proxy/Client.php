<?php

require_once './Proxy.php';

class Client
{
    private $subject;

    public function __construct(Subject $subject)
    {
        $this->subject = $subject;
    }

    public function run() {
        $this->subject->request();
    }

}

$client = new Client(new Proxy());
$client->run();