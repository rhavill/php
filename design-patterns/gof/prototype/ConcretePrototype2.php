<?php

require_once './Prototype.php';

class ConcretePrototype2 extends Prototype
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId() {
        return $this->id;
    }
    public function makeClone()
    {
        return clone $this;
    }
}