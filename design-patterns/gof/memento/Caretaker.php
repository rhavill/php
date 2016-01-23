<?php
require_once './Originator.php';

class Caretaker
{
    private $originator;

    public function __construct()
    {
        $this->originator = new Originator('first state');
    }

    public function run() {
        print $this->originator->getState() . "\n";
        $memento = $this->originator->createMemento();
        $this->originator->setState('second state');
        print $this->originator->getState() . "\n";
        $this->originator->setMemento($memento);
        print $this->originator->getState() . "\n";
    }
}