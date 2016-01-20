<?php

abstract class Handler
{
    protected $successor;

    public function __construct(Handler $successor = NULL)
    {
        $this->successor = $successor;
    }

    public function handleRequest($request) {
        $this->deferRequest($request);
    }

    protected function deferRequest($request) {
        if ($this->successor) {
            $this->successor->handleRequest($request);
        }
    }
}