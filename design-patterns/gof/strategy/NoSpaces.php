<?php

require_once './IStrategy.php';

class NoSpaces implements IStrategy
{
    public function filterText($text)
    {
        return str_replace(' ', '', $text);
    }
}