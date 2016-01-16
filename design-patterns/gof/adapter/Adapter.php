<?php

require_once './Target.php';
require_once './Adaptee.php';

class Adapter extends Target
{
    private $adaptee;

    public function __construct(Adaptee $adaptee)
    {
        $this->adaptee = $adaptee;
    }

    public function request()
    {
        return $this->adaptee->specificRequest();
    }

}