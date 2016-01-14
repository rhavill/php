<?php

require_once './ConcreteComponent.php';
require_once './ConcreteDecorator.php';

class Client
{

    public function output() {
        print "Before decorator...\n";
        $component = new ConcreteComponent();
        print $component->operation() . "\n";
        print "After decorator...\n";
        $wrapper = new ConcreteDecorator($component);
        print $wrapper->operation() . "\n";
    }
}

$client = new Client();
$client->output();