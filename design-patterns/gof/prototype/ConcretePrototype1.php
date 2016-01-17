<?php

require_once './Prototype.php';

class ConcretePrototype1 extends Prototype
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
    public function getName() {
        return $this->name;
    }
    public function makeClone()
    {
        return clone $this;
    }
}