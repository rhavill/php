<?php

require_once './Subject.php';

abstract class Observer
{
    protected $subject;

    abstract public function update();

    public function __construct(Subject $subject)
    {
        $this->subject = $subject;
    }
}