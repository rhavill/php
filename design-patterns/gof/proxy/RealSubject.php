<?php

require_once './Subject.php';

class RealSubject extends Subject
{
    public function request() {
        print "request called from RealSubject.\n";
    }
}