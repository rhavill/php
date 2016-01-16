<?php

require_once './Command.php';

class AbstractCommand extends Command
{
    private $state;

    public function execute()
    {
        $this->receiver->action();
    }

    public function doStuffWithState() {
        // TODO
    }
}