<?php

require_once './Subject.php';
require_once './RealSubject.php';

class Proxy extends Subject
{
    private $realSubject = NULL;

    public function request() {
        print "request called from Proxy.\n";
        if (!$this->realSubject) {
            $this->realSubject = new RealSubject();
        }
        $this->realSubject->request();
    }
}