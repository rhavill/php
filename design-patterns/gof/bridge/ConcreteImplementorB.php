<?php

require_once './Implementor.php';

class ConcreteImplementorB extends Implementor
{
    public function operationImplementation()
    {
        return 'operationImplementation from ConcreteImplementorB';
    }
}