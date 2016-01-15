<?php

require_once './Implementor.php';

abstract class Abstraction
{
    private $implementor;

    public function __construct(Implementor $implementor)
    {
        $this->implementor = $implementor;
    }

    public function operation() {
        return $this->implementor->operationImplementation();
    }
}