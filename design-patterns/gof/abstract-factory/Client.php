<?php

require_once './MacFactory.php';
require_once './LinuxFactory.php';

class Client
{
    private $window;
    private $scrollBar;

    public function __construct()
    {
        $chosenFactory = 'Linux';
        $class = $chosenFactory . 'Factory';
        $factory = new $class();
        $this->window = $factory->createWindow();
        $this->scrollBar = $factory->createScrollBar();
    }

    public function output() {
        print $this->window->windowOperation() . "\n";
        print $this->scrollBar->scrollBarOperation() . "\n";
    }
}

$client = new Client();
$client->output();