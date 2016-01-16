<?php

abstract class Creator
{
    abstract public function factoryMethod();

    public function operation() {
        $product = $this->factoryMethod();
        $product->operation();
    }
}
