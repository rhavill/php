<?php

require_once './SystemClass1.php';
require_once './SystemClass2.php';

class Facade
{
    private $class1;
    private $class2;

    public function __construct()
    {
        $this->class1 = new SystemClass1();
        $this->class2 = new SystemClass2();
    }

    public function doStuff() {
        $this->class1->doStuff();
        $this->class1->doMoreStuff();
    }

    public function doSomething($n = TRUE) {
        if ($n == TRUE) {
            $this->class1->doOtherStuff();
        }
        else {
            $this->class2->doStuff();
        }
    }
}