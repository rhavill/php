<?php

require_once './Director.php';
require_once './ConcreteBuilder.php';

class Client
{
    private $builder;

    public function __construct()
    {
        $this->builder = new ConcreteBuilder();
        $director = new Director($this->builder);
    }

    public function run() {
        $product = $this->builder->getResult();
        print $product->getName() ."\n";
    }

}

$client = new Client();
$client->run();