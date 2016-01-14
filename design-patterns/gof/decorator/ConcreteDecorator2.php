<?php

require_once './Decorator.php';

class ConcreteDecorator2 extends Decorator
{
    public function operation() {
        return parent::operation() . "\noperation from ConcreteDecorator2";
    }

}