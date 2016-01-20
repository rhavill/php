<?php

require_once './Handler.php';

class ConcreteHandler1 extends Handler
{
    public function handleRequest($request) {
        if ($request == 1) {
            print "Request handled by ConcreteHandler1.\n";
        }
        else {
            $this->deferRequest($request);
        }
    }
}