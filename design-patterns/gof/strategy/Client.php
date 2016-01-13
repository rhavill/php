<?php

require_once './Context.php';

class Client
{
    private $context;


    public function setContext($strategyName)
    {
        $this->context = new Context($strategyName);
    }

    public function output($text) {
        print $this->context->filterText($text) . "\n";
    }
}

$text = 'Hello Universe';
$client = new Client();
$client->setContext('Upper');
$client->output($text);
$client->setContext('Lower');
$client->output($text);
$client->setContext('NoSpaces');
$client->output($text);