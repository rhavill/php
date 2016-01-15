<?php

require_once './Abstraction.php';

class RefinedAbstraction extends Abstraction
{
    public function refinedOperation() {
        return 'refined Operation from RefinedAbstraction ' . "\n" .
            $this->operation();
    }
}