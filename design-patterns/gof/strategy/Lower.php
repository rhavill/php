<?php

require_once './IStrategy.php';

class Lower implements IStrategy
{
    public function filterText($text)
    {
        return strtolower($text);
    }
}