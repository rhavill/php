<?php

require_once './Builder.php';
require_once './Product.php';

class ConcreteBuilder extends Builder
{
    private $product;

    public function buildPart()
    {
        $this->product = new Product();
        $this->product->setName('Product Name');
    }

    public function getResult() {
        return $this->product;
    }
}