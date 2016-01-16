<?php

require_once './Product.php';

class ConcreteProduct extends Product
{
    public function operation()
    {
        print 'operation called in ConcreteProduct.' . "\n";
    }
}