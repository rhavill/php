<?php

require_once './Observer.php';

class ConcreteObserver extends Observer
{
    private $state;

    public function update()
    {
        $this->state = $this->subject->getState();
        print "updated called from ConcreteObserver having state {$this->state}\n";
    }
}