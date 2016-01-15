<?php

require_once './Implementor.php';

class ConcreteImplementorA extends Implementor
{
    public function operationImplementation()
    {
        return 'operationImplementation from ConcreteImplementorA';
    }
}