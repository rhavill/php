<?php

require_once './ConcreteObserver.php';
require_once './ConcreteSubject.php';

class Client
{
    private $subject;
    private $observer1;
    private $observer2;
    public function __construct()
    {
        $this->subject = new ConcreteSubject();
        $this->observer1 = new ConcreteObserver($this->subject);
        $this->observer2 = new ConcreteObserver($this->subject);
    }

    public function run() {
        $this->subject->attach($this->observer1);
        $this->subject->attach($this->observer2);
        $this->subject->setState(42);
        $this->subject->notify();
        print "\n";
        $this->subject->detach($this->observer1);
        $this->subject->notify();
    }
}

$client = new Client();
$client->run();