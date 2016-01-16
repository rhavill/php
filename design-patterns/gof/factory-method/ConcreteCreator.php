<?php

require_once './Creator.php';
require_once './ConcreteProduct.php';

class ConcreteCreator extends Creator
{
    public function factoryMethod() {
        return new ConcreteProduct();
    }
}