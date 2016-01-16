<?php

abstract class Command
{
    protected $receiver;

    public function __construct($receiver)
    {
        $this->receiver = $receiver;
    }

    abstract public function execute();
}