<?php

require_once './Colleague.php';
require_once './ConcreteColleague1.php';
require_once './ConcreteColleague2.php';

class Mediator
{
    private $colleague1;
    private $colleague2;

    public function __construct()
    {
        $this->colleague1 = new ConcreteColleague1($this);
        $this->colleague2 = new ConcreteColleague2($this);
    }

    public function getColleague1() {
        return $this->colleague1;
    }

    public function getColleague2() {
        return $this->colleague2;
    }

    public function colleagueChanged(Colleague $colleague) {
        if ($colleague instanceof ConcreteColleague1) {
            $this->colleague2->receiveChange($colleague->getState());
        }
    }
}