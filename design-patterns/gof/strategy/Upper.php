<?php

require_once './IStrategy.php';

class Upper implements IStrategy
{
    public function filterText($text)
    {
        return strtoupper($text);
    }
}