<?php

require_once './FlyweightFactory.php';

class Client
{
    private $factory;
    private $flyweights;

    public function __construct()
    {
        $this->factory = new FlyweightFactory();
        for ($key=0; $key < 5; $key++) {
            $this->flyweights[$key] = $this->factory->getFlyweight($key);
        }
        $this->factory->setAllState(0, 'a state');
        $this->factory->setAllState(1, 'another state');
    }

    public function run() {
        for ($i = 0; $i < count($this->flyweights); $i++) {
            $this->factory->getFlyweight($i)->operation('some state');
        }
    }
}

$client = new Client();
$client->run();