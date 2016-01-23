<?php

require_once './Colleague.php';

class ConcreteColleague2 extends Colleague
{
    public function receiveChange() {
        print "ConcreteColleague2 is receiving a change.\n";
    }
}