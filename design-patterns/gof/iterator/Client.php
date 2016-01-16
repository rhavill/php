<?php

require_once './ArrayList.php';
require_once './LinkedList.php';

class Client
{
    private $arrayList;
    private $arrayListIterator;
    private $linkedList;
    private $linkedListIterator;

    public function __construct()
    {
        $this->arrayList = new ArrayList(array('aardvark','bear','cat','dog','fish'));
        $this->arrayListIterator = $this->arrayList->createIterator();

        $this->linkedList = new LinkedList(array('aardvark','bear','cat','dog','fish'));
        $this->linkedListIterator = $this->linkedList->createIterator();
    }

    public function run() {
        $this->arrayList->append('goat');
        $this->arrayList->remove('bear');
        print "Count " . $this->arrayList->count() . "\n";
        for ($this->arrayListIterator->first(); !$this->arrayListIterator->isDone(); $this->arrayListIterator->next()) {
            print $this->arrayListIterator->currentItem() ."\n";
        }
        $this->linkedList->append('giraffe');
        $this->linkedList->remove('fish');
        print "Count " . $this->linkedList->count() . "\n";
        for ($this->linkedListIterator->first(); !$this->linkedListIterator->isDone(); $this->linkedListIterator->next()) {
            print $this->linkedListIterator->currentItem() ."\n";
        }
    }
}

$client = new Client();

$client->run();
