<?php

require_once './Handler.php';

class ConcreteHandler2 extends Handler
{
    public function handleRequest($request) {
        if ($request == 2) {
            print "Request handled by ConcreteHandler2.\n";
        }
        else {
            $this->deferRequest($request);
        }
    }
}