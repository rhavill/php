<?php

require_once './Singleton.php';

class Client
{
    private $s1;
    private $s2;

    public function __construct()
    {
        $this->s1 = Singleton::getInstance();
        $this->s2 = Singleton::getInstance();
        $this->s1->setState('state1');
        $this->s2->setState('state2');
    }

    public function run() {
        print "s1 state ". $this->s1->getState() ."\n";
        print "s2 state ". $this->s2->getState() ."\n";
    }
}

$client = new Client();
$client->run();