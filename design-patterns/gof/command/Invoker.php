<?php

require_once './Command.php';

class Invoker
{
    private $command;

    public function __construct(Command $command)
    {
        $this->command = $command;
    }

    public function invoke() {
        $this->command->execute();
    }

}