<?php

require_once './Upper.php';
require_once './Lower.php';
require_once './NoSpaces.php';

class Context
{
    private $strategy = NULL;

    public function __construct($strategyName)
    {
        $this->strategy = new $strategyName();
    }

    public function filterText($text) {
        return $this->strategy->filterText($text);
    }
}