<?php

require_once './Colleague.php';

class ConcreteColleague1 extends Colleague
{
    private $state;

    public function setState($state) {
        print "ConcreteColleague1 is setting state.\n";
        $this->state = $state;
        $this->changed();
    }

    public function getState() {
        return $this->state;
    }

}