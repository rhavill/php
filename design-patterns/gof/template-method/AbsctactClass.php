<?php

abstract class AbsctactClass
{
    public function templateMethod() {
        $this->operation1();
        print "running templateMethod in AbstractClass\n";
        $this->operation2();
    }

    abstract public function operation1();

    abstract public function operation2();
}