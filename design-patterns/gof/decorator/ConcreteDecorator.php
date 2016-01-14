<?php

require_once './Decorator.php';

class ConcreteDecorator extends Decorator
{
    public function operation() {
        return parent::operation() . "\noperation from ConcreteDecorator";
    }

}